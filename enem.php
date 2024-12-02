<?php
include("funcoes_php/funcoes_enem.php");
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
    <header class="d-flex justify-content-between align-items-center p-3">
      <a href="inicio.php" aria-label="Ir para a página inicial">
        <img src="img/logo.png" width="200px" alt="Logo do ENEM">
      </a>
      <div class="perfil-header d-flex align-items-center">
        <img id="avatar-imagem" src="<?= htmlspecialchars($imagemPerfil); ?>" alt="Avatar do usuário" width="50px" height="50px" class="rounded-circle ml-3">
        <p class="m-0 ml-2"><span id="usuario-nome"><?= htmlspecialchars($nomeUsuario); ?></span></p>
      </div>
    </header>
    <main class="container mt-4">
      <div class="row">
        <!-- Coluna das questões -->
        <div class="col-md-8">
          <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
              <?php 
                $id_questao = $row['id'];
                $alternativas = ['A', 'B', 'C', 'D', 'E'];
              ?>
              <div class="questao mb-4" data-ano="<?= $row['ano']; ?>" data-materia="<?= strtolower($row['materia']); ?>">
                <div class="d-flex justify-content-between mb-2">
                  <span class="btn btn-info"><?= htmlspecialchars($row['concurso']); ?></span>
                  <span class="btn btn-secondary"><?= htmlspecialchars($row['materia']); ?></span>
                  <span class="btn btn-secondary"><?= htmlspecialchars($row['ano']); ?></span>
                </div>
                <h4 class="enunciado mb-3"><?= htmlspecialchars($row['enunciado']); ?></h4>
                <form method="POST" action="">
                  <input type="hidden" name="id_questao" value="<?= $id_questao; ?>">
                  <div class="alternativas">
                    <?php 
                    $stmt = $conn->prepare("SELECT id, texto, correta FROM alternativas_concurso WHERE id_questao = ?");
                    $stmt->bind_param("i", $id_questao);
                    $stmt->execute();
                    $alt_result = $stmt->get_result();
                    $letra_index = 0;

                    while ($alt_row = $alt_result->fetch_assoc()):
                      $letra = $alternativas[$letra_index++];
                    ?>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="resposta" id="alt-<?= $alt_row['id']; ?>" value="<?= $alt_row['id']; ?>">
                        <label class="form-check-label" for="alt-<?= $alt_row['id']; ?>">
                          <?= $letra; ?>. <?= htmlspecialchars($alt_row['texto']); ?>
                        </label>
                      </div>
                    <?php endwhile; ?>
                  </div>
                  <button type="submit" class="btn btn-primary btn-sm mt-3">Responder</button>
                  <button type="button" class="btn btn-info btn-sm mt-3 ml-2" onclick="mostrarResolucao(<?= $id_questao; ?>)">Resolução</button>
                  <button type="button" class="btn btn-danger btn-sm mt-3 ml-2" onclick="verVideo(<?= $id_questao; ?>)">Vídeo</button>
                </form>
                <div id="resolucao-<?= $id_questao; ?>" class="resolucao mt-3" style="display: none;">
                  <h5>Resolução:</h5>
                  <p><?= htmlspecialchars($row['resolucao']); ?></p>
                </div>
                <div id="video-<?= $id_questao; ?>" class="video mt-3" style="display: none;">
                  <h5>Vídeo:</h5>
                  <a href="https://www.youtube.com/watch?v=example" target="_blank" class="btn btn-primary">Assistir</a>
                </div>
              </div>
            <?php endwhile; ?>
          <?php else: ?>
            <p class="text-center">Não há questões disponíveis no momento.</p>
          <?php endif; ?>
        </div>
        <!-- Filtros -->
        <div class="col-md-4">
          <h5>Filtros</h5>
          <div class="form-group">
            <label for="searchEnunciado">Pesquisar Enunciado</label>
            <input type="text" id="searchEnunciado" class="form-control" placeholder="Digite aqui..." onkeyup="filterByText()">
          </div>
          <div class="form-group">
            <label for="selectAno">Filtrar por Ano</label>
            <select id="selectAno" class="form-control" onchange="filterByYear(this.value)">
              <option value="">Selecione</option>
              <?php for ($ano = 1998; $ano <= 2024; $ano++): ?>
                <option value="<?= $ano; ?>"><?= $ano; ?></option>
              <?php endfor; ?>
            </select>
          </div>
        </div>
      </div>
    </main>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
  <script src="js/enem.js"></script>
</body>
</html>
