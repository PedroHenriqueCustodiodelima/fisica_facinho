<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Landing Page Moderna</title>
    <link rel="stylesheet" href="css/land.css">
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
                    <img src="https://via.placeholder.com/300x200" alt="Imagem Card 1">
                    <h3>Card 1</h3>
                    <p>Descrição do Card 1</p>
                </div>
                <div class="card">
                    <img src="https://via.placeholder.com/300x200" alt="Imagem Card 2">
                    <h3>Card 2</h3>
                    <p>Descrição do Card 2</p>
                </div>
                <div class="card">
                    <img src="https://via.placeholder.com/300x200" alt="Imagem Card 3">
                    <h3>Card 3</h3>
                    <p>Descrição do Card 3</p>
                </div>
                <div class="card">
                    <img src="https://via.placeholder.com/300x200" alt="Imagem Card 4">
                    <h3>Card 4</h3>
                    <p>Descrição do Card 4</p>
                </div>
                <div class="card">
                    <img src="https://via.placeholder.com/300x200" alt="Imagem Card 5">
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
<script>
        window.onload = function() {
        var textElement = document.querySelector('.typing-effect');
        textElement.style.animationPlayState = 'running'; // Inicia a animação assim que a página for carregada
    };
    let currentIndex = 0;
    const cards = document.querySelectorAll('.card');
    const totalCards = cards.length;

    function showCards() {
        // Esconde todos os cards
        cards.forEach(card => {
            card.classList.remove('active');
        });

        // Exibe os 3 cards que devem ser visíveis
        for (let i = currentIndex; i < currentIndex + 3; i++) {
            if (i < totalCards) {
                cards[i].classList.add('active');
            }
        }
    }

    document.querySelector('.next').addEventListener('click', function() {
        currentIndex = (currentIndex + 1) % totalCards;
        showCards();
    });

    document.querySelector('.prev').addEventListener('click', function() {
        currentIndex = (currentIndex - 1 + totalCards) % totalCards;
        showCards();
    });

    // Exibir os cards inicialmente
    showCards();

    document.addEventListener('DOMContentLoaded', () => {
    const prevButton = document.querySelector('.prev');
    const nextButton = document.querySelector('.next');
    const cardsContainer = document.querySelector('.cards-container');
    const cards = document.querySelectorAll('.card');
    const totalCards = cards.length;
    const visibleCards = 3; // Apenas 3 cards visíveis por vez
    const dots = document.querySelectorAll('.pagination-dots .dot');
    let currentIndex = 0;

    // Função para atualizar os cards visíveis
    function updateCardVisibility() {
        const offset = -currentIndex * 320; // Cada card tem 300px + 20px de gap
        cardsContainer.style.transform = `translateX(${offset}px)`;

        // Desabilitar/Ativar os botões de navegação
        prevButton.disabled = currentIndex === 0;
        nextButton.disabled = currentIndex >= totalCards - visibleCards;

        // Atualiza as bolinhas de navegação
        dots.forEach(dot => dot.classList.remove('active'));
        dots[Math.floor(currentIndex / visibleCards)].classList.add('active');
    }

    // Navegar para o próximo conjunto de cards
    nextButton.addEventListener('click', () => {
        if (currentIndex < totalCards - visibleCards) {
            currentIndex++;
            updateCardVisibility();
        }
    });

    // Navegar para o conjunto anterior de cards
    prevButton.addEventListener('click', () => {
        if (currentIndex > 0) {
            currentIndex--;
            updateCardVisibility();
        }
    });

    // Inicializar a visibilidade dos cards
    updateCardVisibility();
});


    </script>

</html>
