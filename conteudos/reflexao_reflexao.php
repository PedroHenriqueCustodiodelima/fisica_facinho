<?php
include(__DIR__ . '/../funcoes_php/funcoes_inicio.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ondulatória – Reflexão e Refração de Ondas</title>
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
        <img id="avatar-imagem" src="<?php echo htmlspecialchars('../' . $imagemPerfil); ?>" alt="Avatar" width="35px" height="35px" class="ml-3">
        <p class="m-0 ml-2"><span id="usuario-nome"><?php echo htmlspecialchars($nomeUsuario); ?></span></p>
        </a>
      </div>
  </header>

  <div class="voltar-container mb-4">
      <a href="../conteudos3.php" class="custom-link">
        <i class="fa-solid fa-circle-arrow-left"></i> <span>Voltar</span>
      </a>
  </div>

  <main>
    <div class="container">
      <div class="card mb-4 mx-auto">
        <div class="card-body">
          <h2 class="text-dark">Ondulatória – Reflexão e Refração de Ondas</h2>

          <h3 class="text-dark"><b>O que é Reflexão de Ondas?</b></h3>
          <p class="text-dark">A reflexão de ondas ocorre quando uma onda encontra um obstáculo ou uma superfície que a impede de continuar em sua trajetória. Nesse caso, a onda se propaga de volta para o meio de origem. A lei da reflexão determina que o ângulo de incidência é igual ao ângulo de reflexão. A reflexão pode ocorrer com diferentes tipos de ondas, como as ondas sonoras, as ondas luminosas e as ondas na água.</p>

          <h3 class="text-dark"><b>Exemplo de Reflexão: O Espelho</b></h3>
          <p class="text-dark">Um exemplo clássico de reflexão é a imagem que vemos em um espelho. A luz (onda eletromagnética) incide sobre a superfície do espelho e é refletida de volta para os nossos olhos. O ângulo com que a luz incide sobre o espelho é igual ao ângulo com que ela é refletida.</p>

          <h3 class="text-dark"><b>O que é Refração de Ondas?</b></h3>
          <p class="text-dark">A refração é o fenômeno que ocorre quando uma onda atravessa a fronteira entre dois meios materiais diferentes, alterando sua velocidade e, consequentemente, sua direção de propagação. Isso ocorre porque a velocidade de propagação da onda depende das propriedades do meio, como sua densidade e elasticidade.</p>

          <h3 class="text-dark"><b>Exemplo de Refração: A Lente</b></h3>
          <p class="text-dark">Um exemplo de refração pode ser observado quando a luz atravessa um vidro ou uma lente. Quando a luz passa de um meio (como o ar) para outro (como o vidro ou a água), ela diminui sua velocidade e muda de direção. Esse fenômeno é responsável por efeitos como a formação de arco-íris e o foco da luz em lentes de óculos e câmeras.</p>

          <h3 class="text-dark"><b>Lei de Snell para Refração</b></h3>
          <p class="text-dark">A Lei de Snell descreve a relação entre os ângulos de incidência e refração de uma onda ao passar de um meio para outro. A fórmula é:</p>
          <p class="text-dark"><b>n₁ * sen(θ₁) = n₂ * sen(θ₂)</b></p>
          <p class="text-dark">Onde:</p>
          <ul class="text-dark">
            <li><b>n₁ e n₂:</b> Índices de refração dos dois meios.</li>
            <li><b>θ₁ e θ₂:</b> Ângulos de incidência e refração, respectivamente.</li>
          </ul>

          <h3 class="text-dark"><b>Importância da Reflexão e Refração de Ondas</b></h3>
          <p class="text-dark">Esses fenômenos são fundamentais em muitas áreas da ciência e tecnologia. A reflexão é importante na construção de espelhos, telescópios e sistemas de radar. Já a refração é essencial em dispositivos como lentes de câmeras, óculos, microscópios e até mesmo na comunicação via fibras ópticas. Compreender como as ondas se comportam ao se refletirem ou se refratarem é crucial para o desenvolvimento de muitas tecnologias modernas.</p>

          <h3 class="text-dark"><b>Conclusão</b></h3>
          <p class="text-dark">A reflexão e a refração de ondas são fenômenos importantes para entender o comportamento das ondas em diferentes meios e suas aplicações práticas. Esses fenômenos estão presentes em muitas áreas do nosso cotidiano e nas tecnologias que usamos, sendo fundamentais para o desenvolvimento científico e tecnológico.</p>

        </div>
      </div>
    </div>
  </main>

  <footer class="text-center py-4">
    <p>&copy; 2024 - Todos os direitos reservados</p>
  </footer>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
  <script src="../js/mecanica.js"></script>
</body>
</html>
