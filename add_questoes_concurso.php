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
        /* Reseta margens e paddings para garantir um layout mais limpo */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Container do formulário */
.container {
    width: 100%;
    max-width: 900px;
    background-color: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

/* Título */
h1 {
    text-align: center;
    margin-bottom: 20px;
    color: #4CAF50;
}

/* Estilo do formulário */
form {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

/* Estilo dos campos de entrada */
label {
    font-weight: bold;
    font-size: 14px;
    color: #555;
}

textarea, input[type="text"], input[type="file"] {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 14px;
    width: 100%;
    margin-top: 5px;
    resize: vertical;
}

/* Tamanho mínimo das caixas de texto */
textarea {
    min-height: 80px;
}

input[type="text"] {
    height: 35px;
}

input[type="file"] {
    height: auto;
}

/* Estilo do botão */
button[type="submit"] {
    background-color: #4CAF50;
    color: white;
    border: none;
    padding: 12px 20px;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s;
}

button[type="submit"]:hover {
    background-color: #45a049;
}

/* Estilo para mensagens de feedback */
.alert {
    padding: 10px;
    margin-bottom: 20px;
    border-radius: 5px;
    font-weight: bold;
}

.alert.success {
    background-color: #4CAF50;
    color: white;
}

.alert.error {
    background-color: #f44336;
    color: white;
}

/* Estilo das alternativas */
h2 {
    margin-top: 20px;
    font-size: 18px;
    color: #333;
}

/* Estilo das alternativas */
div {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

textarea[name^="alternativa_"] {
    width: 90%;
}

/* Responsividade */
@media (max-width: 768px) {
    .container {
        padding: 15px;
    }

    button[type="submit"] {
        width: 100%;
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












