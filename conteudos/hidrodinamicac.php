<?php
// Usar caminho absoluto para evitar erros
include(__DIR__ . '/../funcoes_php/funcoes_inicio.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hidrodinâmica</title>
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
            <h2 class="text-dark">Hidrodinâmica</h2>
            <p class="text-dark">A Hidrodinâmica é o ramo da Física que estuda o comportamento dos fluidos em movimento. Ao contrário da Hidrostática, que trata dos fluidos em repouso, a Hidrodinâmica foca nas forças que atuam sobre os fluidos e as leis que descrevem seu movimento. Esse campo é crucial para entender o fluxo de líquidos, como água e gases, em diversos contextos, desde o fluxo sanguíneo até o comportamento de rios, oceanos e sistemas de tubulação.</p>

            <h3 class="text-dark">Equação de Continuidade</h3>
            <p class="text-dark">A equação de continuidade é um princípio fundamental da Hidrodinâmica que descreve a conservação da massa em um fluido em movimento. Ela afirma que a vazão (quantidade de fluido que passa por uma seção transversal por unidade de tempo) é constante ao longo de um tubo ou canal, desde que não haja acúmulo de fluido. A fórmula da equação de continuidade é:</p>
            <p class="text-dark"><b>A₁ * v₁ = A₂ * v₂</b></p>
            <p class="text-dark">Onde:</p>
            <ul class="text-dark">
                <li><b>A₁ e A₂:</b> Áreas das seções transversais do tubo em dois pontos diferentes (em metros quadrados, m²)</li>
                <li><b>v₁ e v₂:</b> Velocidade do fluido nos dois pontos (em metros por segundo, m/s)</li>
            </ul>
            <p class="text-dark">Essa equação nos diz que a velocidade do fluido aumenta quando a área da seção transversal diminui e vice-versa, de acordo com a conservação da massa.</p>

            <h3 class="text-dark">Teorema de Bernoulli</h3>
            <p class="text-dark">O teorema de Bernoulli é outro princípio fundamental da Hidrodinâmica que descreve a relação entre a pressão, a velocidade e a altura de um fluido em movimento. Ele é uma forma da lei da conservação de energia aplicada aos fluidos. A fórmula do teorema de Bernoulli é:</p>
            <p class="text-dark"><b>p + ½ * ρ * v² + ρ * g * h = constante</b></p>
            <p class="text-dark">Onde:</p>
            <ul class="text-dark">
                <li><b>p:</b> Pressão do fluido (em pascal, Pa)</li>
                <li><b>ρ:</b> Densidade do fluido (em kg/m³)</li>
                <li><b>v:</b> Velocidade do fluido (em metros por segundo, m/s)</li>
                <li><b>g:</b> Aceleração da gravidade (aproximadamente 9,8 m/s²)</li>
                <li><b>h:</b> Altura do fluido em relação a um ponto de referência (em metros, m)</li>
            </ul>
            <p class="text-dark">Este teorema explica, por exemplo, por que a pressão é menor em regiões onde a velocidade do fluido é maior. Isso tem diversas aplicações práticas, como o funcionamento de asas de aviões e a dinâmica de rios e canais.</p>

            <h3 class="text-dark">Exemplo de Aplicação: Velocidade e Vazão em um Canudo</h3>
            <p class="text-dark">Considere um canudo com duas seções transversais de áreas diferentes. Se a água entra por uma seção maior e sai por uma seção menor, a velocidade da água na seção menor será maior, de acordo com a equação de continuidade. Se a área na seção menor for metade da área na seção maior, a velocidade da água na seção menor será o dobro.</p>

            <h3 class="text-dark">Perda de Energia e Resistência ao Fluxo</h3>
            <p class="text-dark">Quando um fluido se move, ele encontra resistência devido ao atrito com as superfícies e com ele mesmo, o que causa uma perda de energia. Essa resistência é chamada de <b>viscosidade</b> e a perda de energia por atrito é um fator importante a ser considerado em projetos de sistemas de tubulação, como oleodutos e aquedutos.</p>

            <h3 class="text-dark">Exemplo de Aplicação: Vento e Asa de Avião</h3>
            <p class="text-dark">Em aviões, a forma da asa é projetada de modo que o ar que passa por cima da asa se move mais rápido que o ar que passa por baixo dela. Isso cria uma diferença de pressão, com pressão menor acima da asa e maior abaixo dela, gerando a força de sustentação que permite que o avião voe.</p>

            <h3 class="text-dark">Conclusão</h3>
            <p class="text-dark">A Hidrodinâmica é essencial para entender o comportamento de líquidos e gases em movimento, com inúmeras aplicações em engenharia, medicina, física e outros campos. O estudo de fenômenos como a equação de continuidade e o teorema de Bernoulli é crucial para projetar sistemas eficientes de transporte de fluido, otimizar o desempenho de veículos e entender diversos processos naturais e tecnológicos.</p>

            <p class="text-dark">Para mais informações sobre Hidrodinâmica, consulte o artigo da <a href="https://www.educacao.uol.com.br/disciplinas/fisica/hidrodinamica.htm" target="_blank" rel="noopener noreferrer">UOL Educação</a>.</p>
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
