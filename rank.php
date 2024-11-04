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
            <th>Posição</th>
            <th>Usuário</th>
            <th>Patente</th>
        </tr>
    </thead>
    <tbody>
        <?php if (count($ranking) > 0): ?>
            <?php foreach ($ranking as $index => $usuario): ?>
                <tr>
                    <td><?php echo $index + 1; ?></td>
                    <td>
                        <?php echo htmlspecialchars($usuario['usuario_nome']); ?><br>
                        <span><?php echo $usuario['total_acertos']; ?> Acertos</span>
                    </td>
                    <td>
                        <?php
                        $acertos = $usuario['total_acertos'];
                        if ($acertos < 2) {
                            echo "Iniciante";
                        } elseif ($acertos <= 20) {
                            echo "Iniciante";
                        } elseif ($acertos <= 40) {
                            echo "Aventureiro";
                        } elseif ($acertos <= 60) {
                            echo "Explorador";
                        } elseif ($acertos <= 80) {
                            echo "Desbravador";
                        } elseif ($acertos <= 100) {
                            echo "Valente";
                        } elseif ($acertos <= 120) {
                            echo "Herói";
                        } elseif ($acertos <= 140) {
                            echo "Campeão";
                        } elseif ($acertos <= 160) {
                            echo "Mestre";
                        } elseif ($acertos <= 180) {
                            echo "Lendário";
                        } else {
                            echo "Supremo";
                        }
                        ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="3" class="text-center">Não há usuários suficientes para mostrar.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>


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
