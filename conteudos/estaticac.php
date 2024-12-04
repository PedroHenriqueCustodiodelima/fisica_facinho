<?php
// Usar caminho absoluto para evitar erros
include(__DIR__ . '/../funcoes_php/funcoes_inicio.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Estática</title>
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
            <h2 class="text-dark">Estática</h2>
            <p class="text-dark">A Estática é um ramo da Física que estuda os corpos em repouso ou os corpos que estão em equilíbrio. O objetivo principal da Estática é analisar as condições para que um objeto esteja em equilíbrio, ou seja, em repouso ou se movendo a uma velocidade constante.</p>

            <h3 class="text-dark">Equilíbrio de Forças</h3>
            <p class="text-dark">Quando um corpo está em equilíbrio, a soma de todas as forças que atuam sobre ele é igual a zero. Isso pode ser expresso pela seguinte equação:</p>
            <p class="text-dark"><b>∑F = 0</b></p>
            <p class="text-dark">Isso significa que a força resultante sobre o objeto é nula, e o objeto não acelera. O equilíbrio de forças pode ser classificado em dois tipos:</p>
            <ul class="text-dark">
                <li><b>Equilíbrio Translacional:</b> Quando a soma das forças que atuam sobre um objeto em todas as direções é zero, e o objeto não se move.</li>
                <li><b>Equilíbrio Rotacional:</b> Quando a soma dos momentos de força (ou torques) em torno de um ponto de rotação é zero, e o objeto não gira.</li>
            </ul>

            <h3 class="text-dark">Condição de Equilíbrio</h3>
            <p class="text-dark">Para que um corpo esteja em equilíbrio, duas condições devem ser atendidas:</p>
            <ul class="text-dark">
                <li><b>Equilíbrio Translacional:</b> A soma das forças em cada direção (horizontal, vertical e ao longo de qualquer outro eixo) deve ser igual a zero.</li>
                <li><b>Equilíbrio Rotacional:</b> A soma dos momentos de força (torques) em torno de qualquer ponto de rotação deve ser igual a zero.</li>
            </ul>

            <h3 class="text-dark">Momento de Força</h3>
            <p class="text-dark">O momento de força (ou torque) é uma medida da capacidade de uma força de fazer um objeto girar em torno de um ponto de rotação. O momento de força é calculado pela seguinte fórmula:</p>
            <p class="text-dark"><b>M = F * d * sen(θ)</b></p>
            <p class="text-dark">Onde:</p>
            <ul class="text-dark">
                <li><b>M:</b> Momento de força (em newton-metro, N·m)</li>
                <li><b>F:</b> Força aplicada (em newtons, N)</li>
                <li><b>d:</b> Distância entre o ponto de rotação e o ponto de aplicação da força (em metros, m)</li>
                <li><b>θ:</b> Ângulo entre a linha de ação da força e a linha de distância (em graus ou radianos)</li>
            </ul>
            <p class="text-dark">Quanto maior a distância entre o ponto de rotação e o ponto de aplicação da força, maior será o momento de força. Isso é importante, por exemplo, no uso de alavancas.</p>

            <h3 class="text-dark">Leis da Estática</h3>
            <p class="text-dark">A Estática é baseada em várias leis e princípios fundamentais. As duas principais leis da Estática são:</p>
            <ul class="text-dark">
                <li><b>Primeira Lei de Newton (Lei da Inércia):</b> Um corpo em repouso permanecerá em repouso e um corpo em movimento continuará a se mover com velocidade constante, a menos que uma força resultante atue sobre ele.</li>
                <li><b>Segunda Lei de Newton:</b> A soma das forças que atuam sobre um objeto é igual ao produto de sua massa e sua aceleração. No entanto, para o caso da Estática, como o objeto está em equilíbrio, a aceleração é zero e a soma das forças é igual a zero.</li>
            </ul>

            <h3 class="text-dark">Exemplo de Equilíbrio de Forças</h3>
            <p class="text-dark">Imagine uma viga horizontal em equilíbrio, apoiada em dois pontos. Para que a viga esteja em equilíbrio, a soma das forças verticais deve ser zero, e a soma dos momentos de força em torno de qualquer ponto deve ser zero.</p>
            <p class="text-dark">Se um peso P é colocado no meio da viga e a força de reação nos dois apoios é R1 e R2, a condição de equilíbrio pode ser expressa por:</p>
            <p class="text-dark"><b>R1 + R2 = P</b></p>
            <p class="text-dark">E para o equilíbrio rotacional, podemos usar o momento em torno de qualquer ponto, por exemplo, o ponto de apoio em uma das extremidades da viga:</p>
            <p class="text-dark"><b>R2 * d = P * (d/2)</b></p>
            <p class="text-dark">Onde <b>d</b> é o comprimento da viga. Com isso, podemos calcular as forças de reação nos dois pontos de apoio e garantir que a viga permaneça em equilíbrio.</p>

            <h3 class="text-dark">Equilíbrio em Alavancas</h3>
            <p class="text-dark">As alavancas são dispositivos simples que permitem levantar objetos pesados com uma força menor. Elas funcionam com base no princípio de equilíbrio rotacional. Para uma alavanca estar em equilíbrio, a soma dos momentos de força deve ser zero:</p>
            <p class="text-dark"><b>F1 * d1 = F2 * d2</b></p>
            <p class="text-dark">Onde:</p>
            <ul class="text-dark">
                <li><b>F1 e F2:</b> As forças aplicadas nas extremidades da alavanca</li>
                <li><b>d1 e d2:</b> As distâncias entre os pontos de aplicação das forças e o ponto de apoio</li>
            </ul>
            <p class="text-dark">Com isso, é possível calcular a força necessária para levantar um objeto, dependendo da distância entre o ponto de apoio e o ponto de aplicação da força.</p>

            <h3 class="text-dark">Conclusão</h3>
            <p class="text-dark">A Estática é fundamental para entender o equilíbrio de forças e momentos em corpos em repouso. Ela tem aplicações práticas em engenharia, construção civil, design de máquinas e muitos outros campos. A compreensão das condições de equilíbrio e das leis que regem as forças e os momentos de força é essencial para garantir a segurança e a funcionalidade de sistemas mecânicos e estruturais.</p>

            <p class="text-dark">Para mais informações sobre Estática, consulte o artigo do <a href="https://www.educacao.uol.com.br/disciplinas/fisica/estatica.htm" target="_blank" rel="noopener noreferrer">UOL Educação</a>.</p>
        </div>
    </div>
</div>

</main>

  <footer>
    <p>Copyright © 2023 | Instituto Federal de Educação, Ciência e Tecnologia do Rio Grande do Norte (IFRN)</p>
  </footer>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
  <script src="../js/mecanica.js"></script>
</body>
</html>
