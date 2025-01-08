<?php
include("funcoes_php/funcoes_inicio.php");
date_default_timezone_set('America/Sao_Paulo');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $enunciado = $_POST['enunciado'];
    $resolucao = $_POST['resolucao'];
    $ano = $_POST['ano'];
    $concurso = $_POST['concurso']; 
    $materia = $_POST['materia']; 
    $foto_enunciado = ''; 
    $video = isset($_POST['video']) ? $_POST['video'] : ''; // Captura o link do vídeo

    // Verifica se há um arquivo de foto
    if (isset($_FILES['foto_enunciado']) && $_FILES['foto_enunciado']['error'] == 0) {
        $foto_enunciado = 'img/' . $_FILES['foto_enunciado']['name'];
        move_uploaded_file($_FILES['foto_enunciado']['tmp_name'], $foto_enunciado);
    }

    // Validar os dados
    if (empty($enunciado) || empty($resolucao) || empty($ano) || empty($concurso)) {
        $mensagem_feedback = 'Por favor, preencha todos os campos obrigatórios.';
    } else {
        // Inserir dados no banco de dados para a questão
        $stmt = $conn->prepare("INSERT INTO questoes (enunciado, resolucao, ano, concurso, materia, foto_enunciado, video) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $enunciado, $resolucao, $ano, $concurso, $materia, $foto_enunciado, $video);

        if ($stmt->execute()) {
            $id_questao = $stmt->insert_id; // ID da questão recém inserida

            // Inserir alternativas (supondo que as alternativas venham do formulário)
            for ($i = 1; $i <= 5; $i++) {
                $alternativa = $_POST["alternativa_$i"];
                $correta = isset($_POST["correta_$i"]) ? 1 : 0; // Verifica se é a alternativa correta

                // Inserir alternativa na tabela alternativas_concurso
                $stmt_alt = $conn->prepare("INSERT INTO alternativas_concurso (id_questao, texto, correta) VALUES (?, ?, ?)");
                $stmt_alt->bind_param("isi", $id_questao, $alternativa, $correta);
                $stmt_alt->execute();
            }

            $mensagem_feedback = 'Questão e alternativas adicionadas com sucesso!';
        } else {
            $mensagem_feedback = 'Erro ao adicionar a questão. Tente novamente.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Questões - Concurso</title>
    <style>
        /* Reset básico para remover margens e paddings indesejados */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Estilização geral do body */
body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f4;
    padding: 20px;
    color: #333;
}

/* Cabeçalho da página */
h1 {
    text-align: center;
    color: #555;
    margin-bottom: 20px;
}

/* Mensagem de feedback */
.alert {
    padding: 10px;
    background-color: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
    margin-bottom: 20px;
    border-radius: 5px;
}

/* Formulário */
form {
    background-color: #fff;
    padding: 30px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
    max-width: 800px;
    margin: 0 auto;
}

/* Labels */
label {
    display: block;
    font-weight: bold;
    margin-top: 10px;
    margin-bottom: 5px;
}

/* Textarea e Input */
textarea, input[type="text"], select {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

/* Botão */
button {
    background-color: #007bff;
    color: white;
    border: none;
    padding: 12px 20px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
}

/* Botão hover */
button:hover {
    background-color: #0056b3;
}

/* Divs para alternativas */
div > div {
    margin-bottom: 20px;
}

/* Checkbox */
input[type="checkbox"] {
    margin-left: 10px;
}

/* Adição de espaçamento entre os campos */
div > div > div {
    display: flex;
    align-items: center;
    justify-content: space-between;
}

/* Ajuste para campos de texto */
input[type="file"] {
    padding: 10px;
}

/* Textarea */
textarea {
    min-height: 100px;
    resize: vertical;
}

/* Responsividade */
@media (max-width: 768px) {
    form {
        padding: 20px;
    }
}

    </style>
</head>
<body>
    <h1>Adicionar Questão ao Concurso</h1>
    
    <!-- Exibir mensagem de feedback -->
    <?php if (isset($mensagem_feedback)): ?>
        <div class="alert">
            <?php echo $mensagem_feedback; ?>
        </div>
    <?php endif; ?>

    <!-- Formulário para adicionar uma nova questão -->
    <form action="add_questoes_concurso.php" method="POST" enctype="multipart/form-data">
        <div>
            <label for="enunciado">Enunciado da Questão:</label>
            <textarea name="enunciado" id="enunciado" rows="4" required></textarea>
        </div>
        <div>
            <label for="resolucao">Resolução da Questão:</label>
            <textarea name="resolucao" id="resolucao" rows="4" required></textarea>
        </div>
        <div>
            <label for="ano">Ano:</label>
            <input type="text" name="ano" id="ano" required>
        </div>
        <div>
            <label for="concurso">Concurso:</label>
            <select name="concurso" id="concurso" required>
                <option value="ENEM">ENEM</option>
                <option value="ITA">ITA</option>
                <option value="IME">IME</option>
                <option value="EEAR">EEAR</option>
                <option value="FUVEST">FUVEST</option>
            </select>
        </div>
        <div>
            <label for="materia">Matéria (Opcional):</label>
            <input type="text" name="materia" id="materia">
        </div>
        <div>
            <label for="foto_enunciado">Foto do Enunciado (Opcional):</label>
            <input type="file" name="foto_enunciado" id="foto_enunciado" accept="image/*">
        </div>
        <div>
            <label for="video">Link do Vídeo (Opcional):</label>
            <input type="text" name="video" id="video" placeholder="https://youtube.com/...">
        </div>

        <h2>Alternativas:</h2>
        <div>
            <label for="alternativa_1">Alternativa 1:</label>
            <textarea name="alternativa_1" required></textarea>
            <label for="correta_1">Correta</label>
            <input type="checkbox" name="correta_1">
        </div>
        <div>
            <label for="alternativa_2">Alternativa 2:</label>
            <textarea name="alternativa_2" required></textarea>
            <label for="correta_2">Correta</label>
            <input type="checkbox" name="correta_2">
        </div>
        <div>
            <label for="alternativa_3">Alternativa 3:</label>
            <textarea name="alternativa_3" required></textarea>
            <label for="correta_3">Correta</label>
            <input type="checkbox" name="correta_3">
        </div>
        <div>
            <label for="alternativa_4">Alternativa 4:</label>
            <textarea name="alternativa_4" required></textarea>
            <label for="correta_4">Correta</label>
            <input type="checkbox" name="correta_4">
        </div>
        <div>
            <label for="alternativa_5">Alternativa 5:</label>
            <textarea name="alternativa_5" required></textarea>
            <label for="correta_5">Correta</label>
            <input type="checkbox" name="correta_5">
        </div>

        <div>
            <button type="submit">Adicionar Questão</button>
        </div>
    </form>
</body>
</html>












