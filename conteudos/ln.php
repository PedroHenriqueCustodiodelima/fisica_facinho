<?php
// Usar caminho absoluto para evitar erros
include(__DIR__ . '/../funcoes_php/funcoes_inicio.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>As Leis de Newton e Suas Aplicações</title>
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
        <a href="../configuracoes.php" class="d-flex align-items-center" style="text-decoration: none;">
        <img id="avatar-imagem" src="<?php echo htmlspecialchars('../' . $imagemPerfil); ?>" alt="Avatar" width="50px" height="50px" class="ml-3">
        <p class="m-0 ml-2">Olá, <span id="usuario-nome"><?php echo htmlspecialchars($nomeUsuario); ?></span>!</p>
        </a>
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
            <h2 class="text-dark">As Leis de Newton e Suas Aplicações</h2>
            <p class="text-dark">As Leis de Newton são fundamentais para a mecânica clássica, pois descrevem como os corpos interagem com as forças e como essas forças resultam em movimento. Elas foram formuladas por Sir Isaac Newton no século XVII e são a base para muitas aplicações em física e engenharia.</p>

            <h3 class="text-dark">Primeira Lei de Newton: A Lei da Inércia</h3>
            <p class="text-dark">A primeira lei de Newton, também conhecida como a Lei da Inércia, afirma que:</p>
            <blockquote class="text-dark">
                "Todo corpo em repouso tende a permanecer em repouso, e todo corpo em movimento tende a permanecer em movimento com velocidade constante, a menos que uma força externa atue sobre ele."
            </blockquote>
            <p class="text-dark">Isso significa que, na ausência de forças externas, um objeto não mudará sua velocidade, seja ela zero (repouso) ou constante (movimento uniforme).</p>

            <h3 class="text-dark">Aplicação da Primeira Lei: Cinto de Segurança</h3>
            <p class="text-dark">Um exemplo clássico da primeira lei é o uso do cinto de segurança em veículos. Quando o carro faz uma frenagem abrupta, o corpo tende a continuar se movendo na direção inicial devido à inércia. O cinto de segurança exerce uma força para parar o corpo do ocupante, evitando que ele continue em movimento.</p>

            <h3 class="text-dark">Segunda Lei de Newton: A Lei Fundamental da Dinâmica</h3>
            <p class="text-dark">A segunda lei de Newton afirma que:</p>
            <blockquote class="text-dark">
                "A aceleração de um objeto é diretamente proporcional à força resultante que age sobre ele e inversamente proporcional à sua massa."
            </blockquote>
            <p class="text-dark">Essa lei pode ser expressa pela equação:</p>
            <p class="text-dark"><b>F = ma</b></p>
            <p class="text-dark">Onde:</p>
            <ul class="text-dark">
                <li><b>F:</b> Força resultante (em Newtons)</li>
                <li><b>m:</b> Massa do objeto (em kg)</li>
                <li><b>a:</b> Aceleração (em m/s²)</li>
            </ul>

            <h3 class="text-dark">Aplicação da Segunda Lei: Empurrando um Carro</h3>
            <p class="text-dark">Se você empurrar um carro, a aceleração que ele experimentará dependerá da força que você aplicar e da sua massa. Um carro mais pesado exigirá uma força maior para obter a mesma aceleração de um carro mais leve. Isso é um exemplo direto da segunda lei de Newton.</p>

            <h3 class="text-dark">Terceira Lei de Newton: A Lei da Ação e Reação</h3>
            <p class="text-dark">A terceira lei de Newton afirma que:</p>
            <blockquote class="text-dark">
                "Para toda ação, há uma reação de igual intensidade e em sentido oposto."
            </blockquote>
            <p class="text-dark">Ou seja, se um corpo A exerce uma força sobre o corpo B, o corpo B exerce uma força de igual intensidade, mas de direção oposta, sobre o corpo A.</p>

            <h3 class="text-dark">Aplicação da Terceira Lei: Lançamento de Foguete</h3>
            <p class="text-dark">No lançamento de um foguete, os gases expelidos para baixo pela base do foguete geram uma força para cima, que impulsiona o foguete. Esse é um exemplo claro da terceira lei de Newton, onde a ação (gases sendo expelidos para baixo) resulta em uma reação (foguete se movendo para cima).</p>

            <h3 class="text-dark">Exemplo de Movimento em Queda Livre</h3>
            <p class="text-dark">Em uma queda livre, um objeto sofre a aceleração da gravidade devido à força gravitacional da Terra. Essa aceleração é descrita pela segunda lei de Newton, onde a força gravitacional atua sobre o objeto, fazendo-o acelerar em direção ao solo.</p>

            <h3 class="text-dark">Gráficos e Fórmulas Relacionadas às Leis de Newton</h3>
            <p class="text-dark">Os gráficos que relacionam a força com a aceleração ou a velocidade com o tempo são usados para entender como a aplicação das leis de Newton afeta o movimento dos objetos. Por exemplo, um gráfico da força versus aceleração de um objeto mostra uma linha reta, já que a aceleração é proporcional à força.</p>

            <h3 class="text-dark">Aplicações Cotidianas das Leis de Newton</h3>
            <p class="text-dark">As leis de Newton são aplicadas em diversas situações do cotidiano, como:</p>
            <ul class="text-dark">
                <li>O movimento de carros e bicicletas.</li>
                <li>Os foguetes e satélites enviados ao espaço.</li>
                <li>A queda de objetos em diferentes alturas.</li>
                <li>O comportamento de massas em colisões, como no caso de esportes (futebol, basquete, etc.).</li>
            </ul>

            <h3 class="text-dark">Conclusão</h3>
            <p class="text-dark">As leis de Newton são essenciais para a física e a engenharia, permitindo-nos compreender e prever o movimento de objetos e os efeitos das forças sobre eles. Elas têm uma vasta gama de aplicações práticas, desde o simples ato de empurrar uma cadeira até os complexos cálculos necessários para lançar um foguete ao espaço.</p>

            <p class="text-dark">Para mais informações sobre as Leis de Newton, acesse o artigo do <a href="https://brasilescola.uol.com.br/fisica/leis-de-newton.htm" target="_blank" rel="noopener noreferrer">Brasil Escola</a>.</p>
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
