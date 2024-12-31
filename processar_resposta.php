<?php
include("conexao.php");

// Obter os dados do formulário
$id_questao = $_POST['id_questao'];
$resposta = $_POST['resposta_' . $id_questao]; // A alternativa escolhida pelo usuário

// Verificar se a resposta está correta
$query = "SELECT * FROM alternativas_concurso WHERE id = $resposta";
$resultado = mysqli_query($conn, $query);
$alternativa = mysqli_fetch_assoc($resultado);

// Verificar se a resposta está correta
if ($alternativa['correta'] == 1) {
    // Resposta correta
    echo "
    <script>
        Swal.fire({
            title: 'Resposta Correta!',
            text: 'Parabéns, você acertou a questão!',
            icon: 'success',
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'missoes.php'; // Redireciona para a página de missões
            }
        });
    </script>";
} else {
    // Resposta errada
    echo "
    <script>
        Swal.fire({
            title: 'Resposta Errada!',
            text: 'Infelizmente, você errou a questão. Tente novamente!',
            icon: 'error',
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'missoes.php'; // Redireciona para a página de missões
            }
        });
    </script>";
}

// Fechar a conexão com o banco de dados
mysqli_close($conn);
?>
