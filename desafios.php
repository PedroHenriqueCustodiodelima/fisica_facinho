<?php
include("funcoes_php/funcoes_desafios.php");
include 'header.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DESAFIOS</title>
    <link rel="stylesheet" href="css/desafios.css">
    <script>
        function mostrarResolucao() {
            var resolucaoDiv = document.getElementById('resolucao');
            resolucaoDiv.style.display = 'block'; 
        }
        function mostrarFeedbackModal() {
            var feedbackModal = document.getElementById('feedbackModal');
            var feedbackMessage = document.getElementById('feedbackMessage');
            var feedbackText = document.getElementById('feedbackText');
            <?php if (!empty($feedback)): ?>
                feedbackMessage.innerHTML = "Feedback";
                feedbackText.innerHTML = "<?php echo addslashes($feedback); ?>"; 
                feedbackModal.style.display = "block"; 
                setTimeout(function () {
                    feedbackModal.style.display = "none"; 
                }, 2000);
            <?php endif; ?>
        }
        function fecharModal() {
            var feedbackModal = document.getElementById('feedbackModal');
            feedbackModal.style.display = "none"; 
        }
        function mostrarFeedbackModal() {
            var feedbackModal = document.getElementById('feedbackModal');
            var feedbackMessage = document.getElementById('feedbackMessage');
            var feedbackText = document.getElementById('feedbackText');

            <?php if (!empty($feedback)): ?>
                feedbackModal.classList.add('show'); 
                setTimeout(function () {
                    feedbackModal.classList.remove('show'); 
                }, 2000);
            <?php endif; ?>
        }
    </script>
</head>
<body onload="mostrarFeedbackModal()">
<div class="voltar-container mb-4">
      <a href="inicio.php" class="custom-link mb-3">
        <i class="fa-solid fa-circle-arrow-left" style="color: #001A4E;"></i> 
        <span style="color: #001A4E;">Voltar</span>
      </a>
    </div>
  <h4>DESAFIOS DIÁRIOS PARA VOCÊ</h4>
    <div class="container">
        <div class="questao-cabecalho">
            <div class="questao-info">
                <p><?php echo htmlspecialchars($questao['ano']); ?></p>
                <p><?php echo htmlspecialchars($questao['concurso']); ?></p>
                <p><?php echo htmlspecialchars($questao['materia']); ?></p>
            </div>
            <div class="imagem-cabecalho">
                <img src="<?php echo $imagemCabecalho; ?>" alt="Imagem de feedback" />
            </div>
            <?php if (!empty($questao['foto_enunciado'])): ?>
                <div class="foto-enunciado">
                    <img src="<?php echo htmlspecialchars($questao['foto_enunciado']); ?>" alt="Foto do Enunciado" />
                </div>
            <?php endif; ?>
        </div>
        <hr class="linha-separadora">
        <div class="questao">
            <p><?php echo nl2br(htmlspecialchars($questao['enunciado'])); ?></p>
            <form method="POST" action="">
                <input type="hidden" name="id_questao" value="<?php echo $questao['id']; ?>" />

                <?php foreach ($alternativas as $alternativa): ?>
                    <div class="alternativa">
                        <input type="radio" name="alternativa" value="<?php echo $alternativa['id']; ?>"
                            id="alternativa_<?php echo $alternativa['id']; ?>" required>
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
        <div id="resolucao" style="display: none; margin-top: 20px;">
            <h3>Resolução:</h3>
            <p><?php echo nl2br(htmlspecialchars($questao['resolucao'])); ?></p>
        </div>
    </div>
    <div id="feedbackModal" class="modal fade-in">
      <div class="modal-content">
          <span class="close-btn" onclick="fecharModal()">&times;</span>
          <div class="feedback-icon">
              <img src="<?php echo $imagemCabecalho; ?>" alt="Feedback Icon" />
          </div>
          <h2 class="feedback-message"><?php echo htmlspecialchars($feedback); ?></h2>
      </div>
    </div>
</body>
</html>
