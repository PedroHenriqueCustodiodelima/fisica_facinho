<?php
// Usar caminho absoluto para evitar erros
include(__DIR__ . '/../funcoes_php/funcoes_inicio.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Movimento Sob Ação da Gravidade</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <link rel="stylesheet" href="../css/mecanica.css">
</head>
<body>

  <header class="d-flex justify-content-between align-items-center">
    <a href="../inicio.php">
      <img src="../img/logo.png" width="200px" alt="Logo">
    </a>
    <div class="perfil-header d-flex align-items-center">
      <img id="avatar-imagem" src="<?php echo htmlspecialchars('../' . $imagemPerfil); ?>" alt="Avatar" width="50px" height="50px" class="ml-3">
      <p class="m-0 ml-2">Olá, <span id="usuario-nome"><?php echo htmlspecialchars($nomeUsuario); ?></span>!</p>
    </div>
  </header>
  <div class="voltar-container mb-4">
      <a href="../conteudos1.php" class="custom-link">
        <i class="fa-solid fa-circle-arrow-left"></i> <span>Voltar</span>
      </a>
    </div>
    <main>
    <div class="container">
    <div class="card mb-4 mx-auto" style="max-width: 800px; width: 95%;">
        <div class="card-body">
            <h2 class="text-dark">Movimento Sob Ação da Gravidade</h2>
            <p class="text-dark">O movimento sob a ação da gravidade é um tipo de movimento que ocorre quando um objeto é atraído pela força gravitacional da Terra. Esse movimento é caracterizado pela aceleração constante, que tem valor aproximado de 9,8 m/s² (aceleração da gravidade), quando não há resistência do ar.</p>

            <h3 class="text-dark">Características do Movimento Sob Ação da Gravidade</h3>
            <ul class="text-dark">
                <li><b>Aceleração constante:</b> A aceleração do movimento é constante e é igual à aceleração da gravidade (g ≈ 9,8 m/s²).</li>
                <li><b>Trajetória vertical:</b> O movimento ocorre ao longo de uma linha reta, na direção vertical (para cima ou para baixo).</li>
                <li><b>Velocidade variável:</b> A velocidade do objeto muda ao longo do tempo devido à aceleração gravitacional.</li>
            </ul>

            <h3 class="text-dark">Equações do Movimento Sob Ação da Gravidade</h3>
            <p class="text-dark">As equações principais que descrevem o movimento de um objeto sob a ação da gravidade (sem resistência do ar) são:</p>
            <ul class="text-dark">
                <li><b>Velocidade:</b> v = v₀ + gt</li>
                <li><b>Posição:</b> s = s₀ + v₀t + (1/2)gt²</li>
                <li><b>Velocidade final em altura máxima:</b> v = 0 (quando o objeto atinge a altura máxima)</li>
            </ul>

            <h3 class="text-dark">Exemplo de Movimento de Queda Livre</h3>
            <p class="text-dark">Quando um objeto é solto de uma certa altura, ele cai devido à força gravitacional. Suponha que um objeto seja solto de uma altura de 20 metros e que a aceleração da gravidade seja 9,8 m/s². Vamos calcular o tempo necessário para o objeto atingir o solo.</p>
            <ul class="text-dark">
                <li><b>Equação da posição:</b> s = s₀ + v₀t + (1/2)gt². Sabemos que v₀ = 0 (pois o objeto é solto) e s₀ = 20 metros.</li>
                <li><b>Substituindo na equação:</b> 0 = 20 + (1/2)(9,8)t²</li>
                <li><b>Resolvendo para t:</b> t = √(2s / g) = √(2 * 20 / 9,8) ≈ 2 segundos</li>
            </ul>

            <h3 class="text-dark">Exemplo de Lançamento Vertical para Cima</h3>
            <p class="text-dark">Agora, vamos analisar um objeto lançado para cima com uma velocidade inicial de 20 m/s. A aceleração gravitacional vai diminuir a velocidade do objeto até que ele pare momentaneamente no ponto mais alto, e então o objeto começará a cair.</p>
            <ul class="text-dark">
                <li><b>Velocidade no ponto máximo:</b> v = 0 (quando o objeto atinge a altura máxima).</li>
                <li><b>Tempo até a altura máxima:</b> t = v₀ / g = 20 / 9,8 ≈ 2,04 segundos.</li>
                <li><b>Altura máxima:</b> s = s₀ + v₀t - (1/2)gt² = 0 + 20(2,04) - (1/2)(9,8)(2,04)² ≈ 20,4 metros.</li>
            </ul>

            <h3 class="text-dark">Gráfico do Movimento Sob Ação da Gravidade</h3>
            <p class="text-dark">No gráfico de velocidade versus tempo para um objeto em queda livre, a linha é reta e com uma inclinação positiva, pois a velocidade aumenta com o tempo devido à aceleração constante. Para um objeto lançado para cima, o gráfico apresenta uma linha reta com inclinação negativa até o ponto máximo, onde a velocidade se torna zero.</p>

            <h3 class="text-dark">Aplicações do Movimento Sob Ação da Gravidade</h3>
            <p class="text-dark">Este tipo de movimento é observado em diversas situações do cotidiano, como a queda de um objeto solto, o lançamento de projéteis, ou até mesmo o movimento da Lua e dos planetas ao redor do Sol, que também estão sujeitos à gravidade.</p>

            <h3 class="text-dark">Exemplo de Lançamento de Projétil</h3>
            <p class="text-dark">Em lançamentos de projéteis, como uma bola sendo jogada para cima ou para frente, a gravidade age sobre o objeto tanto na direção vertical quanto na horizontal. A velocidade vertical vai diminuir até atingir o ponto máximo, e a velocidade horizontal permanece constante (ignorando a resistência do ar).</p>

            <p class="text-dark">Para mais informações sobre o Movimento Sob Ação da Gravidade, acesse o artigo do <a href="https://brasilescola.uol.com.br/fisica/movimento-sob-a-acao-da-gravidade.htm" target="_blank" rel="noopener noreferrer">Brasil Escola</a>.</p>
        </div>
    </div>
</div>

</main>

  <footer>
    <p>Copyright © 2023 | Instituto Federal de Educação, Ciência e Tecnologia do Rio Grande do Norte</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-3d"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="../js/inicio.js"></script>
  <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>

</body>
</html>
