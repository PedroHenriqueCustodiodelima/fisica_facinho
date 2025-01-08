<?php
include("funcoes_php/funcoes_ranking.php");
include 'header.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ranking</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <link rel="stylesheet" href="css/rank.css">
</head>
<body>

  <div class="container">
    <div class="voltar-container">
        <a href="inicio.php"><i class="fa-solid fa-circle-arrow-left"></i> Voltar</a>
    </div>

    <h2>
        <i class="fa fa-trophy"></i> Ranking 
    </h2>




    <div class="top-ranking">
    <?php for ($i = 0; $i < 3 && $i < count($ranking); $i++): ?>
    <div class="rank-item rank-<?php echo $i + 1; ?>">
        <!-- Verifica se o usuário tem foto, senão exibe ícone -->
        <?php if (empty($ranking[$i]['usuario_foto'])): ?>
            <i class="fa fa-user-circle" style="font-size: 80px; color: #333;"></i> <!-- Ícone de usuário preto -->
        <?php else: ?>
            <img src="<?php echo htmlspecialchars($ranking[$i]['usuario_foto']); ?>" alt="Foto de <?php echo htmlspecialchars($ranking[$i]['usuario_nome']); ?>" class="avatar">
        <?php endif; ?>

        <p><?php echo htmlspecialchars($ranking[$i]['usuario_nome']); ?></p>
        <div class="rank-bar">
            <span class="rank-number"><?php echo ($i + 1); ?></span>
        </div>
        <!-- Ícones de medalha ao lado direito -->
        <?php if ($i == 0): ?>
            <i class="fa fa-medal gold-medal" aria-hidden="true"></i>
        <?php elseif ($i == 1): ?>
            <i class="fa fa-medal silver-medal" aria-hidden="true"></i>
        <?php elseif ($i == 2): ?>
            <i class="fa fa-medal bronze-medal" aria-hidden="true"></i>
        <?php endif; ?>
    </div>
    <?php endfor; ?>
</div>




    <table>
    <thead>
        <tr>
            <th>Ranking</th>
            <th>Usuário</th>
            <th>Pontos</th>
            <th>Patente</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $usuario_exibido = false; // Flag para verificar se o usuário logado já foi exibido

        foreach ($ranking as $index => $usuario):
            // Exibe o usuário logado sempre, mesmo que tenha menos de 20 acertos
            if ($usuario['usuario_id'] == $usuario_id) {
                $usuario_exibido = true;
            }

            // Exibe os usuários com mais de 10 acertos no ranking
            if ($usuario['total_acertos'] > 10 || $usuario['usuario_id'] == $usuario_id):
        ?>
            <tr class="<?php
                // Highlight para o usuário logado
                if ($usuario['usuario_id'] == $usuario_id) {
                    echo 'highlight-row'; 
                } elseif ($index == 0) {
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
                    // Exibe os ícones de patente com base no número de acertos
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
        <?php endif; endforeach; ?>

        <!-- Caso o usuário logado tenha menos de 10 acertos, ele será exibido separadamente -->
        <?php if (!$usuario_exibido): ?>
            <tr class="highlight-row">
                <td> - </td>
                <td><?php echo htmlspecialchars($usuario_logado['usuario_nome']); ?></td>
                <td><?php echo $usuario_logado['total_acertos']; ?></td>
                <td>
                    <?php
                    // Definir o ícone de patente para o usuário com menos de 10 acertos
                    $icone = "<img src='img/iniciante3.png' alt='Iniciante' style='width:30px; height:20px; vertical-align: middle;'>";
                    echo $icone;
                    ?>
                </td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

  </div>

  <footer>
    <p>&copy; 2024 Todos os direitos reservados.</p>
  </footer>

  <!-- Modal -->
  <div class="modal fade" id="patenteModal" tabindex="-1" role="dialog" aria-labelledby="patenteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="patenteModalLabel">Patentes e Pontos Necessários</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <ul>
            <li>Iniciante: 0 - 2 pontos</li>
            <li>Aventureiro: 3 - 20 pontos</li>
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
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
</body>
</html>
