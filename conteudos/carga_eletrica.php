<?php
include(__DIR__ . '/../funcoes_php/funcoes_inicio.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Eletricidade – Eletrostática – Carga Elétrica e Processos de Eletrização</title>
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
          <h2 class="text-dark">Eletricidade – Eletrostática – Carga Elétrica e Processos de Eletrização</h2>

          <h3 class="text-dark"><b>Carga Elétrica</b></h3>
          <p class="text-dark">A carga elétrica é uma propriedade fundamental da matéria, responsável pelas interações eletromagnéticas. Ela pode ser positiva ou negativa e está associada aos átomos, mais especificamente aos elétrons e prótons. As cargas elétricas de sinais opostos se atraem, enquanto cargas de sinais iguais se repelem.</p>

          <h3 class="text-dark"><b>Unidade de Carga Elétrica</b></h3>
          <p class="text-dark">A unidade de carga elétrica no Sistema Internacional de Unidades (SI) é o <b>Coulomb (C)</b>. A carga de um elétron é aproximadamente <b>-1,6 x 10^-19 C</b> e a carga de um próton é de <b>+1,6 x 10^-19 C</b>.</p>

          <h3 class="text-dark"><b>Lei da Conservação de Carga</b></h3>
          <p class="text-dark">A Lei da Conservação de Carga afirma que a carga elétrica total de um sistema isolado se mantém constante, ou seja, a carga não pode ser criada nem destruída, apenas transferida ou redistribuída entre os corpos.</p>

          <h3 class="text-dark"><b>Processos de Eletrização</b></h3>
          <p class="text-dark">Os processos de eletrização envolvem a transferência de cargas elétricas entre corpos. Existem três métodos principais de eletrização:</p>
          <ul class="text-dark">
            <li><b>Fricção:</b> Quando dois corpos diferentes são esfregados, ocorre a transferência de elétrons de um corpo para o outro, gerando cargas opostas. Um corpo fica carregado negativamente e o outro, positivamente. Exemplo: ao esfregar um balão contra o cabelo, o balão fica com carga negativa.</li>
            <li><b>Contato:</b> Quando um corpo carregado entra em contato com um corpo neutro, ocorre a transferência de cargas entre eles até que ambos adquiram a mesma carga. Se o corpo carregado estiver negativo, o corpo neutro se carregará negativamente também. Exemplo: ao tocar um objeto metálico carregado, outro corpo pode ficar carregado devido ao contato.</li>
            <li><b>Indução:</b> A indução ocorre quando um corpo carregado aproxima-se de um corpo neutro, fazendo com que as cargas do corpo neutro se reorganizem. Embora não haja contato direto, ocorre uma separação de cargas no corpo neutro. Após a separação de cargas, o corpo neutro pode ser eletrizado por contato com outro corpo carregado.</li>
          </ul>

          <h3 class="text-dark"><b>Exemplo de Eletrização por Fricção</b></h3>
          <p class="text-dark">Um exemplo clássico de eletrização por fricção é o processo de esfregar um balão contra o cabelo. Ao fazer isso, os elétrons do cabelo são transferidos para o balão, tornando-o negativamente carregado. O cabelo, por sua vez, fica carregado positivamente, já que perdeu elétrons. Isso cria uma atração entre o balão e o cabelo.</p>

          <h3 class="text-dark"><b>Exemplo de Eletrização por Contato</b></h3>
          <p class="text-dark">Outro exemplo é o processo de eletrização por contato em um fio metálico conectado a um condutor carregado. Quando o fio entra em contato com o condutor, ocorre a transferência de cargas, e o fio fica carregado com a mesma carga do condutor.</p>

          <h3 class="text-dark"><b>Exemplo de Eletrização por Indução</b></h3>
          <p class="text-dark">Na eletrização por indução, um corpo carregado se aproxima de um corpo neutro sem que ocorra contato. Como exemplo, imagine uma barra carregada negativamente sendo aproximada de um condutor neutro. A aproximação faz com que as cargas no condutor se rearranjem, com os elétrons sendo repelidos pela carga negativa da barra, criando uma carga positiva no lado do condutor mais próximo à barra e uma carga negativa do lado oposto.</p>

          <h3 class="text-dark"><b>Forças Eletrostáticas</b></h3>
          <p class="text-dark">A interação entre cargas elétricas é regida pela Lei de Coulomb, que afirma que a força entre duas cargas é diretamente proporcional ao produto das cargas e inversamente proporcional ao quadrado da distância entre elas. A fórmula é:</p>
          <div class="text-dark">
            <b>F = k * (q1 * q2) / r²</b>
          </div>
          <p class="text-dark">Onde:</p>
          <ul class="text-dark">
            <li><b>F</b> = força entre as cargas (em Newtons)</li>
            <li><b>k</b> = constante eletrostática (aproximadamente 8,99 x 10^9 N·m²/C²)</li>
            <li><b>q1 e q2</b> = as cargas elétricas (em Coulombs)</li>
            <li><b>r</b> = a distância entre as cargas (em metros)</li>
          </ul>

          <h3 class="text-dark"><b>Conclusão</b></h3>
          <p class="text-dark">A carga elétrica é um dos conceitos fundamentais da física e está na base de muitos fenômenos naturais. A eletrização por fricção, contato e indução são formas diferentes de transferir cargas elétricas entre os corpos, e as interações entre essas cargas são descritas pela Lei de Coulomb. O estudo da eletrostática é essencial para entender uma série de fenômenos no dia a dia e tem aplicações em diversas áreas da ciência e tecnologia.</p>

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
