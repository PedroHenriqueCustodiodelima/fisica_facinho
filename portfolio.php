<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Landing Page Moderna</title>
    <link rel="stylesheet" href="css/land.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>
<body>
    <header>
        <div class="container">
            <div class="logo">
                <img src="img/logo.png" alt="Logo da Minha Empresa">
            </div>
            <nav>
                <ul>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="index.php">Cadastre-se</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <section id="hero">
        <div class="container">
            <div class="text-content">
                <h2 id="hero-heading">Transforme seus estudos</h2>
                <p id="hero-subheading" class="typing-effect">Oferecemos soluções inovadoras para o seu ensino</p>
                <div class="cta-container">
                    <a href="#contato" class="cta-button">Saiba mais</a>
                </div>
            </div>
            <div class="image-content">
                <img src="img/fisica.png" alt="Imagem ilustrativa sobre estudos">
            </div>
        </div>
    </section>
    

    <section id="sobre">
    <div class="container">
        <div class="text-content">
            <h2>Sobre Nós</h2>
        </div>
        <div class="slider-container">
            <div class="cards-container">
                <div class="card">
                    <i class="fas fa-user fa-5x"></i>
                    <h3>Card 1</h3>
                    <p>Descrição do Card 1</p>
                </div>
                <div class="card">
                    <i class="fas fa-user-nurse fa-5x"></i>
                    <h3>Card 2</h3>
                    <p>Descrição do Card 2</p>
                </div>
                <div class="card">
                    <i class="fas fa-user-tie fa-5x"></i>
                    <h3>Card 3</h3>
                    <p>Descrição do Card 3</p>
                </div>
                <div class="card">
                    <i class="fas fa-user-graduate fa-5x"></i>
                    <h3>Card 4</h3>
                    <p>Descrição do Card 4</p>
                </div>
                <div class="card">
                    <i class="fas fa-user-astronaut fa-5x"></i>
                    <h3>Card 5</h3>
                    <p>Descrição do Card 5</p>
                </div>
            </div>
            <div class="slider-buttons">
                <button class="prev">&#10094;</button>
                <button class="next">&#10095;</button>
            </div>
        </div>
        <div class="pagination-dots">
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
        </div>
    </div>
</section>
<script>
    const prevBtn = document.querySelector('.prev');
    const nextBtn = document.querySelector('.next');
    const cardsContainer = document.querySelector('.cards-container');

    let currentPosition = 0;
    const cardWidth = 300; // Largura de cada card
    const visibleCards = 3; // Número de cards visíveis ao mesmo tempo

    prevBtn.addEventListener('click', () => {
        if (currentPosition < 0) {
            currentPosition += cardWidth;
            cardsContainer.style.transform = `translateX(${currentPosition}px)`;
        }
    });

    nextBtn.addEventListener('click', () => {
        if (currentPosition > -cardWidth * (5 - visibleCards)) {
            currentPosition -= cardWidth;
            cardsContainer.style.transform = `translateX(${currentPosition}px)`;
        }
    });
</script>






    <section id="depoimentos">
        <div class="container">
            <h2>O que nossos clientes dizem</h2>
            <div class="depoimentos">
                <div class="depoimento">
                    <p>"Excelente serviço, superou minhas expectativas!"</p>
                    <p>- João Silva</p>
                </div>
                <div class="depoimento">
                    <p>"Recomendo a todos, muito profissionalismo e qualidade."</p>
                    <p>- Maria Oliveira</p>
                </div>
            </div>
        </div>
    </section>
    <section id="contato">
        <div class="container_segundo">
            <h2>Entre em Contato</h2>
            <p>Quer saber mais? Entre em contato conosco agora mesmo!</p>
            <a href="mailto:contato@empresa.com" class="cta-button">Fale Conosco</a>
        </div>
    </section>
    <footer>
        <div class="container">
            <p>&copy; 2024 Minha Empresa - Todos os direitos reservados</p>
        </div>
    </footer>
</body>
<script src="js/desempenho.js"></script>

</html>
