<?php
include(__DIR__ . '/../funcoes_php/funcoes_inicio.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Introdução à Física</title>
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
      <a href="../conteudos1.php" class="custom-link" >
        <i class="fa-solid fa-circle-arrow-left"></i> <span>Voltar</span>
      </a>
    </div>
    <main>
    <div class="container">
    <div class="card mb-4 mx-auto" >
        <div class="card-body">
            <h2 class="text-dark">Introdução à Física</h2>
            <p class="text-dark">A Física é uma das ciências naturais que estuda os fenômenos do universo, incluindo a matéria, a energia, o espaço e o tempo. O principal objetivo da Física é compreender as leis naturais que governam o comportamento do mundo físico. Desde as partículas subatômicas até o cosmos, a Física explica como as forças interagem, como a matéria se organiza e como a energia se transforma.</p>

            <h3 class="text-dark"><b>  O que é a Física?</b></h3>
            <p class="text-dark">A Física é o estudo das interações entre matéria e energia, buscando entender como os sistemas funcionam no universo. Ela abrange várias áreas, como a mecânica, a termodinâmica, a eletromagnetismo, a óptica, a física nuclear, entre outras. A Física não apenas ajuda a descrever os fenômenos naturais, mas também desenvolve tecnologias que melhoram a vida cotidiana, como computadores, eletrônicos, e sistemas de comunicação.</p>
<img class="col-12" src="../img/2150591668.jpg" style="  margin: 10px;" alt="">
            <h3 class="text-dark"><b>O Método Científico </b> </h3>
            <p class="text-dark">A Física se baseia no método científico, um processo de investigação rigoroso utilizado para entender o mundo físico. Esse método segue etapas como observação, formulação de hipóteses, experimentação, análise de resultados e elaboração de teorias. O método científico permite que as teorias sejam testadas e validadas ou refutadas, criando um ciclo contínuo de aprimoramento do conhecimento.</p>

            <h3 class="text-dark"> <b>Unidades de Medida e Sistema Internacional (SI) </b></h3>
            <p class="text-dark">As medições na Física seguem um conjunto de unidades padronizadas chamado Sistema Internacional de Unidades (SI). As unidades básicas do SI são:</p>
            <ul class="text-dark">
                <li><b>Metro (m):</b> Unidade de comprimento</li>
                <li><b>Kilograma (kg):</b> Unidade de massa</li>
                <li><b>Segundo (s):</b> Unidade de tempo</li>
                <li><b>Ampère (A):</b> Unidade de corrente elétrica</li>
                <li><b>Kelvin (K):</b> Unidade de temperatura</li>
                <li><b>Mol (mol):</b> Unidade de quantidade de substância</li>
                <li><b>Candela (cd):</b> Unidade de intensidade luminosa</li>
            </ul>
<img  class="col-12" src="../img/Sistema_Internacional_de_Unidades_(SI)_(page_6_crop).jpg" style="  margin: 10px;"  alt="">

            <h3 class="text-dark"><b>  Áreas da Física</b></h3>
            <p class="text-dark">A Física é dividida em diversas áreas de estudo, cada uma focada em um aspecto específico do comportamento físico. Algumas dessas áreas incluem:</p>
            <ul class="text-dark">
                <li><b>Mecânica:</b> Estudo dos movimentos dos corpos e das forças que os causam.</li>
                <li><b>Termodinâmica:</b> Estudo da transferência de calor e das leis que governam o comportamento da energia térmica.</li>
                <li><b>Eletromagnetismo:</b> Estudo dos fenômenos elétricos e magnéticos e suas interações.</li>
                <li><b>Óptica:</b> Estudo da luz e de como ela interage com a matéria.</li>
                <li><b>Física Nuclear:</b> Estudo das partículas subatômicas e dos processos nucleares.</li>
            </ul>

            <h3 class="text-dark"> <b>  Importância da Física no Cotidiano</b></h3>
            <p class="text-dark">A Física tem um impacto profundo no nosso cotidiano. A compreensão das leis físicas permite o desenvolvimento de tecnologias que usamos todos os dias, como computadores, smartphones, veículos e aparelhos de comunicação. Além disso, a Física é crucial para a exploração espacial, a medicina (como na utilização de raios-X e ressonância magnética) e na energia (como na geração de eletricidade e o uso de energias renováveis).</p>

            <h3 class="text-dark"><b>  Exemplo de Aplicação: Leis de Newton</b></h3>
            <p class="text-dark">As Leis de Newton são um dos pilares da Física clássica e explicam como os objetos se movem quando são submetidos a forças. Elas são fundamentais para o estudo da mecânica e têm diversas aplicações práticas, como em veículos, aeronaves e até mesmo em satélites no espaço. A primeira lei de Newton, conhecida como a Lei da Inércia, afirma que um objeto em repouso permanecerá em repouso, e um objeto em movimento continuará em movimento, a menos que uma força externa atue sobre ele.</p>
<img  class="col-12" src="../img/11561.jpg"  style="margin: 10px;">
            <h3 class="text-dark"><b>  Conclusão</b></h3>
            <p class="text-dark">A Física é uma ciência fundamental para o entendimento do universo e para a criação de novas tecnologias. Ela é presente em todos os aspectos da nossa vida, e seu estudo é essencial para quem deseja compreender como o mundo funciona. Através da física, podemos observar as leis que governam a natureza e usar esse conhecimento para melhorar a qualidade de vida e impulsionar o desenvolvimento científico e tecnológico.</p>

            <p class="text-dark">Para mais informações sobre Física, consulte o artigo da <a href="https://www.educacao.uol.com.br/disciplinas/fisica/o-que-e-fisica.html" target="_blank" rel="noopener noreferrer">UOL Educação</a>.</p>
        </div>

        <!-- O que é a Física? -->
        <div class="card mb-4">
          <div class="card-body">
            <h3 class="text-success">O que é a Física?</h3>
            <img src="../img/oque_e_fisica.jpg" alt="O que é a Física?" class="img-fluid rounded mb-3">
            <p>A Física é o estudo das interações entre matéria e energia...</p>
          </div>
        </div>

        <!-- O Método Científico -->
        <div class="card mb-4">
          <div class="card-body">
            <h3 class="text-warning">O Método Científico</h3>
            <p>A Física se baseia no método científico, um processo de investigação rigoroso utilizado para entender o mundo físico...</p>
          </div>
        </div>

        <!-- Unidades de Medida e Sistema Internacional -->
        <div class="card mb-4">
          <div class="card-body">
            <h3 class="text-info">Unidades de Medida e Sistema Internacional (SI)</h3>
            <ul class="list-group">
              <li class="list-group-item"><b>Metro (m):</b> Unidade de comprimento</li>
              <li class="list-group-item"><b>Kilograma (kg):</b> Unidade de massa</li>
              <li class="list-group-item"><b>Segundo (s):</b> Unidade de tempo</li>
              <li class="list-group-item"><b>Ampère (A):</b> Unidade de corrente elétrica</li>
              <li class="list-group-item"><b>Kelvin (K):</b> Unidade de temperatura</li>
              <li class="list-group-item"><b>Mol (mol):</b> Unidade de quantidade de substância</li>
              <li class="list-group-item"><b>Candela (cd):</b> Unidade de intensidade luminosa</li>
            </ul>
          </div>
        </div>
        <div class="card mb-4">
          <div class="card-body">
            <h3 class="text-danger">Áreas da Física</h3>
            <ul class="list-group">
              <li class="list-group-item"><b>Mecânica:</b> Estudo dos movimentos dos corpos e das forças que os causam.</li>
              <li class="list-group-item"><b>Termodinâmica:</b> Estudo da transferência de calor e das leis que governam o comportamento da energia térmica.</li>
              <li class="list-group-item"><b>Eletromagnetismo:</b> Estudo dos fenômenos elétricos e magnéticos e suas interações.</li>
              <li class="list-group-item"><b>Óptica:</b> Estudo da luz e de como ela interage com a matéria.</li>
              <li class="list-group-item"><b>Física Nuclear:</b> Estudo das partículas subatômicas e dos processos nucleares.</li>
            </ul>
          </div>
        </div>
        <div class="card mb-4">
          <div class="card-body">
            <h3 class="text-primary">Importância da Física no Cotidiano</h3>
            <p>A Física tem um impacto profundo no nosso cotidiano. A compreensão das leis físicas permite o desenvolvimento de tecnologias...</p>
            <img src="../img/importancia_fisica.jpg" alt="Importância da Física" class="img-fluid rounded mb-4">
          </div>
        </div>
        <div class="card mb-4">
          <div class="card-body">
            <h3 class="text-secondary">Exemplo de Aplicação: Leis de Newton</h3>
            <p>As Leis de Newton são um dos pilares da Física clássica e explicam como os objetos se movem quando são submetidos a forças...</p>
          </div>
        </div>
        <div class="card mb-4">
          <div class="card-body">
            <h3 class="text-dark">Conclusão</h3>
            <p>A Física é uma ciência fundamental para o entendimento do universo e para a criação de novas tecnologias...</p>
            <p>Para mais informações sobre Física, consulte o artigo da <a href="https://www.educacao.uol.com.br/disciplinas/fisica/o-que-e-fisica.htm" target="_blank" rel="noopener noreferrer">UOL Educação</a>.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card mb-4">
          <div class="card-body">
            <h4 class="text-primary">Exploração Visual</h4>
            <p>Adicione mais imagens e gráficos para tornar a compreensão mais fácil.</p>
            <img src="../img/experimentos.jpg" alt="Experimentos" class="img-fluid rounded">
          </div>
        </div>
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
