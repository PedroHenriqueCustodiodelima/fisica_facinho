<?php
include("funcoes_php/funcoes_eear.php");
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
                echo "<form method='POST' action='' onsubmit='return validarAlternativa($id_questao)'>"; 
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
        <h5 style="margin-bottom: 40px;">Filtros</h5>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text" id="search-icon">
              <i class="fas fa-search"></i>
            </span>
          </div>
          <input type="text" id="searchEnunciado" class="form-control" placeholder="Pesquisar aqui" onkeyup="filterByText()">
        </div>
        <div class="form-group">
            <label for="selectAno">Escolha o Ano</label>
            <select class="form-control" id="selectAno" onchange="filterByYear(this.value)">
                <option value="">Selecione um Ano</option>
                <?php
                for ($ano = 1998; $ano <= 2024; $ano++) {
                    echo "<option value='$ano'>$ano</option>";
                }
                ?>
            </select>
        </div>
        </div>
      </div>
    </main>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
  <script src="js/eear.js"></script>
</body>
</html>
