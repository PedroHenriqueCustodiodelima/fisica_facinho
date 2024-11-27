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
    <main>
  <div class="container my-5">
    <div class="row">
      <!-- Coluna principal com conteúdo -->
      <div class="col-md-8">
        
        <!-- Introdução à Física -->
        <div class="card mb-4">
          <div class="card-body">
            <h2 class="text-primary">Introdução à Física</h2>
            <p class="text-muted">A Física é uma das ciências naturais que estuda os fenômenos do universo, incluindo a matéria, a energia, o espaço e o tempo.</p>
            <img src="../img/fisica_intro.jpg" alt="Introdução à Física" class="img-fluid rounded mb-4">
            <p>A principal objetivo da Física é compreender as leis naturais que governam o comportamento do mundo físico...</p>
          </div>
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
