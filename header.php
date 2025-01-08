<?php
include("funcoes_php/funcoes_header.php");
$primeiroNome = explode(" ", $nomeUsuario)[0];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FACINHO</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .header-menu {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: #F8F9FA; 
            padding: 10px 20px;
        }


        .lista-dropdown {
            display: none;
            position: absolute;
            top: 60px; 
            right: 0;
            background-color: #001A4E;
            box-shadow: 0px 8px 16px rgba(0,0,0,0.2);
            z-index: 1000; 
            width: 220px;
            border-radius: 8px;
            transition: opacity 0.3s ease, transform 0.3s ease;
        }

        .lista-dropdown.show {
            display: block;
            opacity: 1;
            transform: translateY(0);
        }

        .lista-dropdown a {
            color: #FFFFFF; 
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            transition: background-color 0.3s ease;
        }

        .lista-dropdown a:hover {
            background-color: #F1F1F1;
            color: #000;
        }

        #menu-button {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: #333333;
            transition: color 0.3s ease;
        }

        #avatar-imagem {
            border-radius: 50%;
            object-fit: cover;
            width: 35px;
            height: 35px;
            margin-right: 10px;
        }

        #usuario-nome {
            font-size: 16px;
        }

        .fas.fa-bars {
            font-size: 20px;
            color: #FFD700;
            margin-left: 10px;
        }
        #menu-button {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: #333333;
            transition: color 0.3s ease;
        }

        .fas.fa-bars {
            font-size: 20px;
            color: #FFD700;
            margin-left: 10px;
            transition: transform 0.3s ease; 
        }

        .lista-dropdown.show ~ .fas.fa-bars {
            transform: rotate(90deg);
        }

       @media screen and (max-width: 768px) {
            .header-menu {
                flex-direction: column;
            }
        
            .perfil-header {
                justify-content: flex-end;
            }
        
            .lista-dropdown {
                width: 90%;
                top: 50px;
            }
        
            .logo {
                max-width: 60%; /* Ajuste para dispositivos menores */
                max-height: 40px;
            }
        }
    </style>
</head>
<body>
<header class="d-flex justify-content-between align-items-center">
    <a href="inicio.php">
        <img src="img/logo.png" 
     srcset="img/logo.png 100w, img/logo.png 200w" 
     sizes="(max-width: 768px) 100px, 200px" 
     alt="Logo">

    </a>
    <div class="perfil-header d-flex align-items-center">
        <a href="#" class="d-flex align-items-center" style="text-decoration: none;" id="menu-button">
            <img id="avatar-imagem" src="<?php echo htmlspecialchars($imagemPerfil); ?>" alt="Avatar" width="35px" height="35px" class="ml-3">
            <p class="m-0 ml-2"><span id="usuario-nome"><?php echo htmlspecialchars($primeiroNome); ?></span></p>
            <i class="fas fa-bars ml-3" style="font-size: 20px; color: #FFD700;"></i>
        </a>
        <div id="dropdown-list" class="lista-dropdown">
            <a href="inicio.php">Inicio</a>
            <a href="conteudos.php">Conteúdos</a>
            <a href="tarefas.php">Tarefas</a>
            <a href="concurso.php">Concursos</a>
            <a href="desempenho.php">Desempenho</a>
            <a href="rank.php">Ranking</a>
            <a href="missoes.php">Missões</a>
            <a href="suporte.php">Ajuda</a>
            <a href="configuracoes.php">Perfil</a>
            <a href="desafios.php">Desafios</a>
            <a href="logout.php">Sair</a>
        </div>
    </div>
</header>

<script>
    document.getElementById('menu-button').addEventListener('click', function(e) {
    e.preventDefault();
    var dropdown = document.getElementById('dropdown-list');
    dropdown.classList.toggle('show');

    var icon = document.querySelector('#menu-button .fas.fa-bars');
    if (dropdown.classList.contains('show')) {
        icon.style.transform = 'rotate(90deg)';
    } else {
        icon.style.transform = 'rotate(0deg)';
    }
});

window.addEventListener('click', function(e) {
    var dropdown = document.getElementById('dropdown-list');
    if (!dropdown.contains(e.target) && !document.getElementById('menu-button').contains(e.target)) {
        dropdown.classList.remove('show');
        document.querySelector('#menu-button .fas.fa-bars').style.transform = 'rotate(0deg)';
    }
});

</script>
</body>
</html>
