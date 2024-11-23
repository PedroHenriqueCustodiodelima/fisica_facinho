<?php
include("funcoes_php/funcoes_inicio.php");

// Definindo o número de questões por página
$questoesPorPagina = 2;

// Obtendo o número total de questões
$sqlTotal = "SELECT COUNT(*) AS total_questoes FROM questoes WHERE concurso = 'ENEM'";
$resultTotal = $conn->query($sqlTotal);
$rowTotal = $resultTotal->fetch_assoc();
$totalDeQuestoes = $rowTotal['total_questoes'];

// Calculando o número total de páginas
$totalDePaginas = ceil($totalDeQuestoes / $questoesPorPagina);

// Verificando a página atual
$paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
if ($paginaAtual < 1) {
    $paginaAtual = 1;
} elseif ($paginaAtual > $totalDePaginas) {
    $paginaAtual = $totalDePaginas;
}

// Calculando o limite de início para a consulta
$inicio = ($paginaAtual - 1) * $questoesPorPagina;

// Consulta para pegar as questões da página atual
$sql = "
    SELECT q.id AS questao_id, q.enunciado, q.ano, q.concurso, q.materia, q.resolucao, q.foto_enunciado
    FROM questoes q
    WHERE q.concurso = 'ENEM'
    ORDER BY q.id ASC
    LIMIT $inicio, $questoesPorPagina
";
$result = $conn->query($sql);

// Função para salvar a resposta no banco
function salvarTentativa($idUsuario, $idQuestao, $resposta, $status) {
    global $conn;

    // Inserir tentativa do usuário na tabela 'tentativas_concursos'
    $stmt = $conn->prepare("INSERT INTO tentativas_concursos (id_usuario, id_questao, resposta, status) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("iiis", $idUsuario, $idQuestao, $resposta, $status);
    $stmt->execute();
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Configurações</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <link rel="stylesheet" href="css/enem.css">
</head>
<body>
  <div class="page-container">
    <header class="d-flex justify-content-between align-items-center">
      <a href="inicio.php">
        <img src="img/logo.png" alt="Logo">
      </a>
      <div class="perfil-header d-flex align-items-center">
        <img id="avatar-imagem" src="<?php echo htmlspecialchars($imagemPerfil); ?>" alt="Avatar" width="50px" height="50px">
        <p class="ml-3"><span id="usuario-nome"><?php echo htmlspecialchars($nomeUsuario); ?></span></p>
      </div>
    </header>

    <main class="container">
      <div class="main-content">
        <div class="questions-container">
          <h3 class="text-primary">Perguntas do ENEM</h3>

          <?php
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              echo '<div class="question shadow-sm">';
              echo '<h5>Pergunta ' . htmlspecialchars($row['questao_id']) . ': ' . htmlspecialchars($row['enunciado']) . '</h5>';

              // Consulta das alternativas da questão
              $sqlAlternativas = "SELECT * FROM alternativas_concurso WHERE id_questao = " . $row['questao_id'];
              $alternativasResult = $conn->query($sqlAlternativas);

              echo '<div class="alternatives">';
              if ($alternativasResult->num_rows > 0) {
                while ($alt = $alternativasResult->fetch_assoc()) {
                  echo '<label><input type="radio" name="question' . $row['questao_id'] . '" value="' . $alt['id'] . '"> ' . htmlspecialchars($alt['texto']) . '</label><br>';
                }
              }
              echo '</div>'; // Fecha alternativas

              echo '<div class="btn-group">';
              echo '<button class="btn btn-outline-success btn-sm" onclick="responderQuestao(' . $row['questao_id'] . ')">Responder</button>';
              echo '<button class="btn btn-outline-primary btn-sm" onclick="toggleResolution(\'resolution' . $row['questao_id'] . '\')">Ver Resolução</button>';
              echo '</div>';

              echo '<div id="resolution' . $row['questao_id'] . '" class="resolution" style="display:none;">';
              echo htmlspecialchars($row['resolucao']);
              echo '</div>';

              echo '</div>'; // Fecha a questão
            }
          } else {
            echo "Nenhuma questão encontrada.";
          }
          ?>

          <!-- Navegação de páginas -->
          <div class="pagination-container">
            <ul class="pagination">
              <li class="page-item <?php echo ($paginaAtual == 1) ? 'disabled' : ''; ?>">
                <a class="page-link" href="?pagina=<?php echo $paginaAtual - 1; ?>">Anterior</a>
              </li>

              <?php for ($i = 1; $i <= $totalDePaginas; $i++) { ?>
                <li class="page-item <?php echo ($i == $paginaAtual) ? 'active' : ''; ?>">
                  <a class="page-link" href="?pagina=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
              <?php } ?>

              <li class="page-item <?php echo ($paginaAtual == $totalDePaginas) ? 'disabled' : ''; ?>">
                <a class="page-link" href="?pagina=<?php echo $paginaAtual + 1; ?>">Próxima</a>
              </li>
            </ul>
          </div>

        </div>
      </div>
    </main>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    function toggleResolution(id) {
      const resolution = document.getElementById(id);
      resolution.style.display = resolution.style.display === "block" ? "none" : "block";
    }

    function responderQuestao(questionId) {
      const respostaSelecionada = document.querySelector('input[name="question' + questionId + '"]:checked');

      if (!respostaSelecionada) {
        Swal.fire({
          title: 'Erro',
          text: 'Você precisa selecionar uma alternativa.',
          icon: 'error',
          confirmButtonText: 'OK'
        });
        return;
      }

      const resposta = respostaSelecionada.value;

      // Aqui você deve verificar se a resposta está correta
      // Consulta para verificar a resposta correta da questão
      fetch('verificar_resposta.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify({
          questionId: questionId,
          resposta: resposta
        })
      })
      .then(response => response.json())
      .then(data => {
        Swal.fire({
          title: 'Resposta registrada!',
          text: data.message,
          icon: data.icon,
          confirmButtonText: 'OK'
        });
      });
    }
  </script>
</body>
</html>

<?php
// Fecha a conexão com o banco de dados
$conn->close();
?>
