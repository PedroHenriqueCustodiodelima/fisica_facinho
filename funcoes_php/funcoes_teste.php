<?php
include('conexao.php'); 
$nivel = isset($_GET['nivel']) ? intval($_GET['nivel']) : 1;
$pesquisa = isset($_GET['pesquisa']) ? $_GET['pesquisa'] : '';
$pagina_atual = isset($_GET['pagina']) ? intval($_GET['pagina']) : 1;
$itens_por_pagina = 3; 


$offset = ($pagina_atual - 1) * $itens_por_pagina;

$sql = "SELECT * FROM questoes WHERE nivel = ? AND enunciado LIKE ? LIMIT ? OFFSET ?";
$stmt = $conn->prepare($sql);
$pesquisa_like = "%$pesquisa%";
$stmt->bind_param("issi", $nivel, $pesquisa_like, $itens_por_pagina, $offset);
$stmt->execute();
$result = $stmt->get_result();

$questoes_data = [];
while ($row = $result->fetch_assoc()) {
    $questao_id = $row['id'];
    $alternativas_sql = "SELECT * FROM alternativas WHERE questao_id = ?";
    $alternativas_stmt = $conn->prepare($alternativas_sql);
    $alternativas_stmt->bind_param("i", $questao_id);
    $alternativas_stmt->execute();
    $alternativas_result = $alternativas_stmt->get_result();
    $alternativas = $alternativas_result->fetch_all(MYSQLI_ASSOC);
    $row['alternativas'] = $alternativas;
    $questoes_data[] = $row;
}

$count_sql = "SELECT COUNT(*) AS total FROM questoes WHERE nivel = ? AND enunciado LIKE ?";
$count_stmt = $conn->prepare($count_sql);
$count_stmt->bind_param("is", $nivel, $pesquisa_like);
$count_stmt->execute();
$count_result = $count_stmt->get_result();
$total_itens = $count_result->fetch_assoc()['total'];
$total_paginas = ceil($total_itens / $itens_por_pagina);
?>
