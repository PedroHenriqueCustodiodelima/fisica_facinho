<?php
include("funcoes_php/funcoes_ranking.php");
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ranking de Usuários</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <link rel="stylesheet" href="css/rank.css">
</head>
<body>

  <header class="d-flex justify-content-between align-items-center">
    <a href="inicio.php">
        <img src="img/logo.png" width="200px" alt="Logo">
    </a>
    <div class="perfil-header d-flex align-items-center">
      <img id="avatar-imagem" src="<?php echo htmlspecialchars($imagemPerfil); ?>" alt="Avatar" width="50px" height="50px" class="ml-3">
      <p class="m-0 ml-2">Olá, <span id="usuario-nome"><?php echo htmlspecialchars($nomeUsuario); ?></span>!</p>
    </div>
  </header>

  <div class="container">
    <div class="voltar-container mb-4">
        <a href="inicio.php" class="custom-link">
            <i class="fa-solid fa-circle-arrow-left"></i> <span>Voltar</span>
        </a>
    </div>
    <main class="centralizado">
    <h2 class="mb-4">Ranking de Estudantes</h2>

    <div class="top-ranking">
    <?php for ($i = 0; $i < 3 && $i < count($ranking); $i++): ?>
        <div class="rank-item rank-<?php echo $i + 1; ?>">
            <img src="<?php echo htmlspecialchars($ranking[$i]['usuario_foto'] ?? 'img/default-avatar.png'); ?>" alt="Foto de <?php echo htmlspecialchars($ranking[$i]['usuario_nome']); ?>" class="avatar">
            <p><?php echo htmlspecialchars($ranking[$i]['usuario_nome']); ?></p> 
            <div class="rank-bar" style="background-color: <?php echo ($i == 0) ? '#FFD700' : (($i == 1) ? '#C0C0C0' : '#CD7F32'); ?>; height: <?php echo (80 - ($i * 5)) . 'px'; ?>;">
                <span class="rank-number"><?php echo ($i + 1); ?></span>
            </div>
        </div>
    <?php endfor; ?>
</div>

    <h4 class="mt-4">Estudantes</h4>
    <table class="table table-striped">
    <thead>
        <tr>
            <th style="width: 10%;">Ranking</th>
            <th>Usuário</th>
            <th style="width: 15%;">Pontos</th> 
            <th>Patente <i class="fa-solid fa-exclamation-circle" title="Patente do usuário" style="color: white; margin-left: 5px; cursor: pointer;"></i></th>
        </tr>
    </thead>
    <tbody>
        <?php if (count($ranking) > 0): ?>
            <?php foreach ($ranking as $index => $usuario): ?>
                <tr class="<?php
                    if ($index == 0) {
                        echo 'gold-row';
                    } elseif ($index == 1) {
                        echo 'silver-row';
                    } elseif ($index == 2) {
                        echo 'bronze-row';
                    }
                ?>">
                    <td><?php echo $index + 1; ?></td>
                    <td><?php echo htmlspecialchars($usuario['usuario_nome']); ?></td>
                    <td><?php echo $usuario['total_acertos']; ?></td>
                    <td>
                        <?php
                        $acertos = $usuario['total_acertos'];
                        $icone = "";

                        // Lógica para selecionar o ícone de patente baseado nos acertos
                        if ($acertos < 2) {
                            $icone = "<img src='img/iniciante3.png' alt='Iniciante' style='width:30px; height:20px; vertical-align: middle;'>";
                        } elseif ($acertos <= 20) {
                            $icone = "<img src='img/iniciante3.png' alt='Iniciante' style='width:30px; height:20px; vertical-align: middle;'>";
                        } elseif ($acertos <= 40) {
                            $icone = "<img src='img/aventurero.png' alt='Aventureiro' style='width:30px; height:20px; vertical-align: middle;'>";
                        } elseif ($acertos <= 60) {
                            $icone = "<img src='img/explorador.png' alt='Explorador' style='width:30px; height:20px; vertical-align: middle;'>";
                        } elseif ($acertos <= 80) {
                            $icone = "<img src='img/desbravador.png' alt='Desbravador' style='width:30px; height:20px; vertical-align: middle;'>";
                        } elseif ($acertos <= 100) {
                            $icone = "<img src='img/valente.png' alt='Valente' style='width:30px; height:20px; vertical-align: middle;'>";
                        } elseif ($acertos <= 120) {
                            $icone = "<img src='img/heroi.png' alt='Herói' style='width:30px; height:20px; vertical-align: middle;'>";
                        } elseif ($acertos <= 140) {
                            $icone = "<img src='img/campeao.png' alt='Campeão' style='width:30px; height:20px; vertical-align: middle;'>";
                        } elseif ($acertos <= 160) {
                            $icone = "<img src='img/mestre.png' alt='Mestre' style='width:30px; height:20px; vertical-align: middle;'>";
                        } elseif ($acertos <= 180) {
                            $icone = "<img src='img/lendario.png' alt='Lendário' style='width:30px; height:20px; vertical-align: middle;'>";
                        } else {
                            $icone = "<img src='img/supremo.png' alt='Supremo' style='width:30px; height:20px; vertical-align: middle;'>";
                        }

                        echo $icone;
                        ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4" class="text-center">Não há usuários suficientes para mostrar.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="patenteModal" tabindex="-1" role="dialog" aria-labelledby="patenteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="patenteModalLabel">Patentes e Pontos Necessários</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul>
                    <li>Iniciante: 0 - 1 ponto</li>
                    <li>Aventureiro: 2 - 20 pontos</li>
                    <li>Explorador: 21 - 40 pontos</li>
                    <li>Desbravador: 41 - 60 pontos</li>
                    <li>Valente: 61 - 80 pontos</li>
                    <li>Herói: 81 - 100 pontos</li>
                    <li>Campeão: 101 - 120 pontos</li>
                    <li>Mestre: 121 - 140 pontos</li>
                    <li>Lendário: 141 - 160 pontos</li>
                    <li>Supremo: 161+ pontos</li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    // Abrir o modal ao clicar no ícone de alerta
    $('.fa-exclamation-circle').on('click', function() {
        $('#patenteModal').modal('show'); // Corrigido aqui
    });
});
</script>



</main>

  </div>

  <footer>
    <p>Copyright © 2023 | Instituto Federal de Educação, Ciência e Tecnologia do Rio Grande do Norte</p>
  </footer>
    
  <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-3d"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="js/inicio.js"></script>
  <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>

</body>
</html>
