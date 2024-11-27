<?php
include("funcoes_php/funcoes_inicio.php");
date_default_timezone_set('America/Sao_Paulo');

// Alterando a consulta SQL para buscar apenas questões do concurso "ENEM"
$sql = "SELECT id, enunciado, resolucao, ano, materia, concurso FROM questoes WHERE concurso = 'ENEM'"; // Filtro para concurso ENEM
$result = $conn->query($sql);
$feedback = '';
$mensagem_feedback = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['resposta'])) {
  $id_usuario = $_SESSION['usuario_id'];
  $id_questao = $_POST['id_questao'];
  $id_resposta = $_POST['resposta']; 
  $data_tentativa = date('Y-m-d H:i:s'); 

  $stmt = $conn->prepare("SELECT id, texto, correta FROM alternativas_concurso WHERE id_questao = ? AND correta = 1 LIMIT 1");
  $stmt->bind_param("i", $id_questao);
  $stmt->execute();
  $stmt->store_result();

  if ($stmt->num_rows > 0) {
      $stmt->bind_result($id_correta, $texto_correto, $correta);
      $stmt->fetch();
      $stmt_alt = $conn->prepare("SELECT texto FROM alternativas_concurso WHERE id = ?");
      $stmt_alt->bind_param("i", $id_resposta);
      $stmt_alt->execute();
      $stmt_alt->store_result();
      
      if ($stmt_alt->num_rows > 0) {
          $stmt_alt->bind_result($texto_resposta);
          $stmt_alt->fetch();
          $correta_usuario = ($texto_resposta == $texto_correto) ? 1 : 0;
          $stmt_insert = $conn->prepare("INSERT INTO tentativas_concursos (id_usuario, id_questao, resposta, data_tentativa, correta) VALUES (?, ?, ?, ?, ?)");
          $stmt_insert->bind_param("iisss", $id_usuario, $id_questao, $texto_resposta, $data_tentativa, $correta_usuario);
          if ($stmt_insert->execute()) {
              $response = [
                  "status" => $correta_usuario == 1 ? "success" : "error",
                  "message" => $correta_usuario == 1 ? "Parabéns! Você acertou!" : "Que pena, você errou. Tente novamente!",
              ];
              echo json_encode($response);
              exit;
          } else {
              echo json_encode(["status" => "error", "message" => "Houve um erro ao salvar sua tentativa. Tente novamente."]);
              exit;
          }
      } else {
          echo json_encode(["status" => "error", "message" => "Alternativa selecionada não encontrada. Tente novamente."]);
          exit;
      }
  } else {
      echo json_encode(["status" => "error", "message" => "Alternativa correta não encontrada. Tente novamente."]);
      exit;
  }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ENEM - Questões</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <link rel="stylesheet" href="css/enem.css">
</head>
<body>
  <div class="page-container">
    <header class="d-flex justify-content-between align-items-center">
      <a href="inicio.php">
        <img src="img/logo.png" width="200px" alt="Logo">
      </a>
      <div class="perfil-header d-flex align-items-center">
        <img id="avatar-imagem" src="<?php echo htmlspecialchars($imagemPerfil); ?>" alt="Avatar" width="50px" height="50px" class="ml-3">
        <p class="m-0 ml-2"><span id="usuario-nome"><?php echo htmlspecialchars($nomeUsuario); ?></span></p>
      </div>
    </header>
    <main class="container mt-4">
      <div class="row">
        <!-- Coluna das questões -->
        <div class="col-md-8">
        <?php
          if ($result->num_rows > 0) {
              $alternativas = ['A', 'B', 'C', 'D', 'E']; 
              while ($row = $result->fetch_assoc()) {
                  $id_questao = $row['id'];
                  $ano_questao = $row['ano']; // Pegando o ano da questão
                  $materia_questao = $row['materia']; // Pegando a matéria da questão
                  $concurso_questao = $row['concurso']; // Pegando o concurso da questão

                  echo "<div class='questao' data-ano='$ano_questao' data-enunciado='" . strtolower($row['enunciado']) . "'>"; // Adicionando o atributo data-enunciado

                  // Exibir o concurso, a matéria e o ano da questão no topo, como botões
                  echo "<div class='concurso-materia-ano'>";
                  echo "<span class='concurso btn btn-info mr-2'>" . htmlspecialchars($concurso_questao) . "</span>  "; 
                  echo "<span class='materia btn btn-secondary mr-2'>" . htmlspecialchars($materia_questao) . "</span>  "; 
                  echo "<span class='ano btn btn-secondary'>" . htmlspecialchars($ano_questao) . "</span>"; 
                  echo "</div>";
                  
                  // Enunciado da questão
                  echo "<h4 class='enunciado mb-3'>" . htmlspecialchars($row['enunciado']) . "</h4>";

                  // Alternativas
                  $alt_sql = "SELECT id, texto, correta FROM alternativas_concurso WHERE id_questao = ?";
                  $stmt = $conn->prepare($alt_sql);
                  $stmt->bind_param("i", $id_questao);
                  $stmt->execute();
                  $alt_result = $stmt->get_result();
                  
                  // Formulário de resposta
                  echo "<form method='POST' action=''>"; 
                  echo "<input type='hidden' name='id_questao' value='" . $id_questao . "'>";
                  
                  echo "<div class='alternativas'>";
                  $letra_index = 0;
                  while ($alt_row = $alt_result->fetch_assoc()) {
                      $letra = $alternativas[$letra_index];
                      echo "<div class='alternativa d-flex align-items-center'>";
                      echo "<input type='radio' id='alternativa" . $letra . "' name='resposta' value='" . $alt_row['id'] . "' class='mr-2'>";
                      echo "<strong>" . $letra . ". " . htmlspecialchars($alt_row['texto']) . "</strong>";
                      echo "</div>";
                      $letra_index++;
                  }
                  echo "</div>";

                  // Botões de envio, resolução e vídeo
                  echo "<button type='submit' class='btn btn-primary mt-3 btn-sm'>Responder</button>";
                  echo "<button type='button' class='btn btn-info mt-3 ml-2 btn-sm' onclick='mostrarResolucao(" . $id_questao . ")'>Ver Resolução</button>";
                  echo "<button type='button' class='btn btn-danger mt-3 ml-2 btn-sm' onclick='verVideo(" . $id_questao . ")'>Vídeo</button>";
                  echo "</form>";

                  // Bloco de resolução que ficará oculto até o clique
                  echo "<div id='resolucao-" . $id_questao . "' class='resolucao mt-3' style='display:none;'>";
                  echo "<h5>Resolução:</h5>";
                  echo "<p>" . htmlspecialchars($row['resolucao']) . "</p>";
                  echo "</div>";

                  // Adicionando o bloco de vídeo
                  echo "<div id='video-" . $id_questao . "' class='video mt-3' style='display:none;'>";
                  echo "<h5>Vídeo:</h5>";

                  // Aqui você coloca o link correto do vídeo, seja ele no YouTube, Vimeo, ou qualquer outra plataforma.
                  $video_url = "https://www.youtube.com/watch?v=example"; // Substitua esse link pelo link real do vídeo
                  echo "<a href='$video_url' target='_blank' class='btn btn-primary'>Clique aqui para assistir ao vídeo</a>";
                  echo "</div>";

                  echo "</div>"; // Fim da questão
              }

          } else {
              echo "<p>Não há questões disponíveis no momento.</p>";
          }
          ?>
        </div>

        <div class="col-md-4 filtros">
        <h5>Pesquisar Enunciado</h5>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text" id="search-icon">
              <i class="fas fa-search"></i>
            </span>
          </div>
          <input type="text" id="searchEnunciado" class="form-control" placeholder="Pesquisar aqui" onkeyup="filterByText()">
        </div>

        <h5 class="mt-2">Anos Disponíveis</h5>
        <div class="btn-group-vertical">
          <?php
          for ($ano = 2015; $ano <= 2024; $ano++) {
            echo "<button type='button' class='btn btn-ano' onclick='filterByYear($ano)'>$ano</button>";
          }
          ?>
        </div>

        </div>
      </div>
    </main>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
    const forms = document.querySelectorAll("form");
    forms.forEach((form) => {
      form.addEventListener("submit", function (event) {
        event.preventDefault(); 
        const formData = new FormData(form);
        fetch(form.action, {
          method: "POST",
          body: formData,
        })
          .then((response) => response.json())
          .then((data) => {
            if (data.status === "success") {
              Swal.fire({
                icon: "success",
                title: data.message,
                showConfirmButton: false,
                timer: 3000,
              });
            } else {
              Swal.fire({
                icon: "error",
                title: data.message,
                showConfirmButton: false,
                timer: 3000,
              });
            }
          })
          .catch((error) => {
            Swal.fire({
              icon: "error",
              title: "Erro ao enviar a resposta",
              text: error.message,
            });
          });
      });
    });
    filterByText();
    document.querySelector("#searchEnunciado").focus();
  });
  function mostrarResolucao(id) {
    var resolucao = document.getElementById('resolucao-' + id);
    resolucao.style.display = resolucao.style.display === 'none' ? 'block' : 'none';
  }
  function verVideo(id) {
    var videoDiv = document.getElementById('video-' + id);
    if (videoDiv.style.display === 'none') {
      videoDiv.style.display = 'block';
    } else {
      videoDiv.style.display = 'none';
    }
  }
  function filterByText() {
    var input = document.getElementById('searchEnunciado');
    var filter = input.value.toLowerCase();
    var questoes = document.querySelectorAll('.questao');
    questoes.forEach(function (questao) {
      var enunciado = questao.querySelector('.enunciado').textContent.toLowerCase();
      var materia = questao.querySelector('.materia').textContent.toLowerCase();
      
      if (enunciado.includes(filter) || materia.includes(filter)) {
        questao.style.display = '';
      } else {
        questao.style.display = 'none';
      }
    });
  }
  function filterByYear(ano) {
    var input = document.getElementById('searchEnunciado');
    var filter = input.value.toLowerCase();
    var questoes = document.querySelectorAll('.questao');
    questoes.forEach(function (questao) {
      var questaoAno = questao.getAttribute('data-ano');
      var enunciado = questao.querySelector('.enunciado').textContent.toLowerCase();
      var materia = questao.querySelector('.materia').textContent.toLowerCase();
      if ((questaoAno == ano) && (enunciado.includes(filter) || materia.includes(filter))) {
        questao.style.display = '';
      } else {
        questao.style.display = 'none';
      }
    });
  }
  </script>
</body>
</html>
