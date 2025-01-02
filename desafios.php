<?php
include("funcoes_php/funcoes_desafios.php");
include 'header.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Resolver Questão</title>
  <link rel="stylesheet" href="css/desafios.css">
  <script>
    // Função para exibir a resolução ao clicar no botão
    function mostrarResolucao() {
      var resolucaoDiv = document.getElementById('resolucao');
      resolucaoDiv.style.display = 'block'; // Exibe a resolução
    }

    // Função para abrir o modal de feedback
    function mostrarFeedbackModal() {
      var feedbackModal = document.getElementById('feedbackModal');
      var feedbackMessage = document.getElementById('feedbackMessage');
      var feedbackText = document.getElementById('feedbackText');

      // Alterando o conteúdo do modal com o feedback
      <?php if (!empty($feedback)): ?>
        feedbackMessage.innerHTML = "Feedback";
        feedbackText.innerHTML = "<?php echo addslashes($feedback); ?>"; // Exibe o feedback gerado
        feedbackModal.style.display = "block"; // Abre o modal
        // Fecha o modal após 3 segundos
        setTimeout(function() {
          feedbackModal.style.display = "none"; // Fecha o modal após 3 segundos
        }, 2000);
      <?php endif; ?>
    }

    // Função para fechar o modal
    function fecharModal() {
      var feedbackModal = document.getElementById('feedbackModal');
      feedbackModal.style.display = "none"; // Fecha o modal
    }
  </script>
</head>
<body onload="mostrarFeedbackModal()">
  <div class="container">
    <!-- Cabeçalho com informações da questão -->
    <div class="questao-cabecalho">
      <div class="questao-info">
        <p><?php echo htmlspecialchars($questao['ano']); ?></p>
        <p><?php echo htmlspecialchars($questao['concurso']); ?></p>
        <p><?php echo htmlspecialchars($questao['materia']); ?></p>
      </div>

      <!-- Imagem pequena ao lado do cabeçalho, trocada conforme acerto/erro -->
      <div class="imagem-cabecalho">
        <img src="<?php echo $imagemCabecalho; ?>" alt="Imagem de feedback" />
      </div>

      <!-- Foto do enunciado, caso exista -->
      <?php if (!empty($questao['foto_enunciado'])): ?>
        <div class="foto-enunciado">
          <img src="<?php echo htmlspecialchars($questao['foto_enunciado']); ?>" alt="Foto do Enunciado" />
        </div>
      <?php endif; ?>
    </div>

    <!-- Linha separadora -->
    <hr class="linha-separadora">



    <!-- Exibindo o enunciado da questão -->
    <div class="questao">
      <p><?php echo nl2br(htmlspecialchars($questao['enunciado'])); ?></p>

      <!-- Exibindo as alternativas -->
      <form method="POST" action="">
        <input type="hidden" name="id_questao" value="<?php echo $questao['id']; ?>" />

        <?php foreach ($alternativas as $alternativa): ?>
          <div class="alternativa">
            <input type="radio" name="alternativa" value="<?php echo $alternativa['id']; ?>" id="alternativa_<?php echo $alternativa['id']; ?>" required>
            <label for="alternativa_<?php echo $alternativa['id']; ?>"><?php echo htmlspecialchars($alternativa['texto']); ?></label>
          </div>
        <?php endforeach; ?>

        <div class="botoes-container">
          <button type="submit" class="botao responder">Responder</button>
          <button type="button" onclick="mostrarResolucao()" class="botao resolucao">Ver Resolução</button>
          <?php if (!empty($questao['video'])): ?>
            <a href="<?php echo htmlspecialchars($questao['video']); ?>" target="_blank" class="botao video">Ver Vídeo</a>
          <?php endif; ?>
        </div>
      </form>
    </div>

    <!-- Resolução -->
    <div id="resolucao" style="display: none; margin-top: 20px;">
      <h3>Resolução:</h3>
      <p><?php echo nl2br(htmlspecialchars($questao['resolucao'])); ?></p>
    </div>
  </div>

  <!-- Modal de Feedback -->
  <div id="feedbackModal" class="modal">
    <div class="modal-content">
      <span class="close-btn" onclick="fecharModal()">&times;</span>
      <h2 id="feedbackMessage"></h2>
      <p id="feedbackText"></p>
    </div>
  </div>
</body>
</html>
