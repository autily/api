<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jogo de Relacionar</title>
    <link rel="stylesheet" href="style.css">
</head>

<style>
    /* Variáveis de cores */
:root {
    --cor-animais: #ff7675;
    --cor-frutas: #74b9ff;
    --cor-objetos: #55efc4;
    --cor-fundo-gradiente: linear-gradient(135deg, #ff9a9e 0%, #fad0c4 55%, #fad0c4 100%, 
                                           #fbc2eb 0%, #a18cd1 55%, #a1c4fd 100%, 
                                           #f6d365 0%, #ff9a9e 55%, #ffecd2 100%);
    --cor-branco: rgba(255, 255, 255, 1);
    --cor-verde-claro: rgba(173, 255, 47, 0.7);
    --cor-error: #f28d8d;
}

/* Estilos do corpo */
body {
    font-family: 'Arial', sans-serif;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
    margin: 0;
    background: var(--cor-fundo-gradiente); /* Gradiente colorido */
}

/* Estilo do título */
h1 {
    font-size: 2.5em;
    color: #fff;
    margin-bottom: 30px;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
}

/* Tela inicial */
#start-screen {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 20px;
}

.mode-buttons {
    display: flex;
    gap: 20px;
}

/* Botões de modo */
.mode-btn {
    font-size: 1.5rem;
    font-weight: bold;
    padding: 15px 30px;
    border: none;
    border-radius: 10px;
    cursor: pointer;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.mode-btn:hover {
    transform: scale(1.1);
    box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
}

/* Cores dos botões de modo */
.animal { background-color: var(--cor-animais); color: #fff; }
.fruits { background-color: var(--cor-frutas); color: #fff; }
.food { background-color: var(--cor-objetos); color: #fff; }

/* Ocultar contêineres */
.hidden {
    display: none;
}

/* Contêiner principal para letras e imagens */
.main-container {
    display: flex; 
    justify-content: space-between; 
    width: 90%; 
    gap: 380px; /* Aumentar o gap entre as colunas */
}

/* Contêiner de letras */
.letters-container {
    display: flex;
    flex-direction: column; 
    align-items: center; 
    width: 45%; 
    gap: 40px; /* Aumeaço entre as letras */
}

/* Contêiner de imagens */
.images-container {
    display: flex;
    flex-wrap: wrap; /* Permite que as imagens se ajustem em várias linhas */
    justify-content: center; /* Centraliza as imagens horizontalmente */
    width: 45%; /* Largura da coluna das imagens */
    gap: 40px; /* Espaço entre as imagens */
    padding: 20px; 
}

/* Estilo das letras */
.letter {
    font-size: 2.5rem;
    font-weight: bold;
    width: 80px;
    height: 80px;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 10px;
    box-shadow: 0 6px 10px rgba(0, 0, 0, 0.1);
    cursor: pointer;
    margin-bottom: 60px;
    transition: transform 0.3s ease, background-color 0.3s ease;
}

/* Cores das letras */
.letter:nth-child(1) { background-color: #ff6b6b; } /* Vermelho claro */
.letter:nth-child(2) { background-color: #ffcc5c; } /* Amarelo */
.letter:nth-child(3) { background-color: #88d8b0; } /* Verde claro */
.letter:nth-child(4) { background-color: #6c5ce7; } /* Roxo */
.letter:nth-child(5) { background-color: #74b9ff; } /* Azul claro */
.letter:nth-child(6) { background-color: #fd79a8; } /* Rosa */
.letter:nth-child(7) { background-color: #ffeaa7; } /* Amarelo claro */
.letter:nth-child(8) { background-color: #a29bfe; } /* Lavanda */
.letter:nth-child(9) { background-color: #ff7675; } /* Salmão */
.letter:nth-child(10) { background-color: #ff6b6b; } /* Vermelho claro */
.letter:nth-child(11) { background-color: #ffcc5c; } /* Amarelo */
.letter:nth-child(12) { background-color: #88d8b0; } /* Verde claro */
.letter:nth-child(13) { background-color: #6c5ce7; } /* Roxo */
.letter:nth-child(14) { background-color: #74b9ff; } /* Azul claro */
.letter:nth-child(15) { background-color: #fd79a8; } /* Rosa */
.letter:nth-child(16) { background-color: #ffeaa7; } /* Amarelo claro */
.letter:nth-child(17) { background-color: #a29bfe; } /* Lavanda */
.letter:nth-child(18) { background-color: #ff7675; } 
.letter:nth-child(19) { background-color: #ff6b6b; } /* Vermelho claro */
.letter:nth-child(20) { background-color: #ffcc5c; } /* Amarelo */
.letter:nth-child(21) { background-color: #88d8b0; } /* Verde claro */
.letter:nth-child(22) { background-color: #6c5ce7; } /* Roxo */
.letter:nth-child(23) { background-color: #74b9ff; } /* Azul claro */
.letter:nth-child(24) { background-color: #fd79a8; } /* Rosa */
.letter:nth-child(25) { background-color: #ffeaa7; } /* Amarelo claro */
.letter:nth-child(26) { background-color: #a29bfe; } /* Lavanda */

.letter:hover {
    transform: scale(1.1);
    background-color: var(--cor-branco); /* Branco no hover */
    box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
}

/* Estilo das imagens */
.image {
    width: 100px;
    height: 100px;
    padding: 10px;
    background-color: rgba(255, 255, 255, 0.9); /* Fundo branco translúcido */
    border-radius: 10px;
    box-shadow: 0 6px 10px rgba(0, 0, 0, 0.1);
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    margin: 20px; 
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.image:hover {
    transform: scale(1.1);
    box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
}

.image img {
    width: 100%;
    height: 100%;
    object-fit: contain;
    border-radius: 5px;
}

/* Quando a letra ou imagem for combinada corretamente */
.matched {
    background-color: var(--cor-verde-claro); /* Verde claro suave */
    box-shadow: 0 6px 10px rgba(0, 0, 0, 0.1);
    transform: none;
    pointer-events: none;
    color: #fff;
}

/* Feedback de erro */
.error {
    background-color: var(--cor-error) !important;
    animation: shake 0.4s;
}

/* Animação de "shake" para erros */
@keyframes shake {
    0% { transform: translateX(0); }
    25% { transform: translateX(-5px); }
    50% { transform: translateX(5px); }
    75% { transform: translateX(-5px); }
    100% { transform: translateX(0); }
}
</style>

<body>
    <h1>Jogo de Relacionar</h1>
    <div id="start-screen">
        <h2>Escolha um modo para jogar:</h2>
        <div class="mode-buttons">
            <button id="animal-btn" class="mode-btn animal">Animais</button>
            <button id="fruit-btn" class="mode-btn fruits">Frutas</button> <!-- Alterado para fruit-btn -->
            <button id="object-btn" class="mode-btn objects">Objetos</button> <!-- Alterado para object-btn -->
        </div>        
    </div>
    
    <!-- Contêineres para o jogo (inicialmente escondidos) -->
    <div id="game-container" class="hidden">
        <div class="main-container"> 
        <div class="letters-container">
            <div class="letter" data-letter="A">A</div>
            <div class="letter" data-letter="B">B</div>
            <div class="letter" data-letter="C">C</div>
            <div class="letter" data-letter="D">D</div>
            <div class="letter" data-letter="E">E</div>
            <div class="letter" data-letter="F">F</div>
            <div class="letter" data-letter="G">G</div>
            <div class="letter" data-letter="H">H</div>
            <div class="letter" data-letter="I">I</div>
            <div class="letter" data-letter="J">J</div>
            <div class="letter" data-letter="K">K</div>
            <div class="letter" data-letter="L">L</div>
            <div class="letter" data-letter="M">M</div>
            <div class="letter" data-letter="N">N</div>
            <div class="letter" data-letter="O">O</div>
            <div class="letter" data-letter="P">P</div>
            <div class="letter" data-letter="Q">Q</div>
            <div class="letter" data-letter="R">R</div>
            <div class="letter" data-letter="S">S</div>
            <div class="letter" data-letter="T">T</div>
            <div class="letter" data-letter="U">U</div>
            <div class="letter" data-letter="V">V</div>
            <div class="letter" data-letter="W">W</div>
            <div class="letter" data-letter="X">X</div>
            <div class="letter" data-letter="Y">Y</div>
            <div class="letter" data-letter="Z">Z</div>
        </div>
        <div class="images-container">
            <div class="image" data-letter="A">
                <img src="imagens/agua.png" alt="Água">
            </div>
            <div class="image" data-letter="B">
                <img src="../img/bolo.png" alt="Bolo">
            </div>
            <div class="image" data-letter="C">
                <img src="../img/caneta.png" alt="Caneta">
            </div>
            <div class="image" data-letter="D">
                <img src="imagens/dinossauro.png" alt="Dinossauro">
            </div>
            <div class="image" data-letter="E">
                <img src="imagens/elefante.png" alt="Elefante">
            </div>
            <div class="image" data-letter="F">
                <img src="imagens/foca.png" alt="Foca">
            </div>
            <div class="image" data-letter="G">
                <img src="imagens/garfo.png" alt="Garfo">
            </div>
            <div class="image" data-letter="H">
                <img src="imagens/hipopotamo.png" alt="Hipopótamo">
            </div>
            <div class="image" data-letter="I">
                <img src="imagens/igreja.png" alt="Igreja">
            </div>
            <div class="image" data-letter="J">
                <img src="imagens/jarra.png" alt="Jarra">
            </div>
            <div class="image" data-letter="K">
                <img src="imagens/kiwi.png" alt="Kiwi">
            </div>
            <div class="image" data-letter="L">
                <img src="imagens/lapis.png" alt="Lápis">
            </div>
            <div class="image" data-letter="M">
                 <img src="imagens/melancia.png" alt="Melancia">
            </div>
            <div class="image" data-letter="N">
                <img src="imagens/navio.png" alt="Navio">
            </div>
            <div class="image" data-letter="O">
                <img src="imagens/ovo.png" alt="Ovo">
            </div>
            <div class="image" data-letter="P">
                <img src="imagens/perna.png" alt="Perna">
            </div>
            <div class="image" data-letter="Q">
                <img src="images/queijo.png" alt="Queijo">
            </div>
            <div class="image" data-letter="R">
                <img src="images/rato.png" alt="Rato">
            </div>
            <div class="image" data-letter="S">
                <img src="images/sapo.png" alt="Sapo">
            </div>
            <div class="image" data-letter="T">
                <img src="imagens/tatu.png" alt="Tatu">
            </div>
            <div class="image" data-letter="U">
                <img src="images/uva.png" alt="Uva">
            </div>
            <div class="image" data-letter="V">
                <img src="imagens/vaca.png" alt="Vaca">
            </div>
            <div class="image" data-letter="W">
                <img src="imagens/waffle.png" alt="Waffle">
            </div>
            <div class="image" data-letter="X">
                <img src="imagens/xicara.png" alt="Xícara">
            </div>
            <div class="image" data-letter="Y">
                <img src="imagens/yakisoba.png" alt="Yakisoba">
            </div>
            <div class="image" data-letter="Z">
                <img src="imagens/zebra.png" alt="Zebra">
            </div>
        </div>
    </div>
</body>

<script>
    // Array completo de animais de A a Z
const alphabetAnimals = [
    { letter: 'A', image: 'anta.png' },
    { letter: 'B', image: 'baleia.png' },
    { letter: 'C', image: 'cachorro.png' },
    { letter: 'D', image: 'dinossauro.png' },
    { letter: 'E', image: 'elefante.png' },
    { letter: 'F', image: 'formiga.png' },
    { letter: 'G', image: 'gato.png' },
    { letter: 'H', image: 'hipopotamo.png' },
    { letter: 'I', image: 'iguana.png' },
    { letter: 'J', image: 'jacare.png'},
    { letter: 'K', image: 'kakapo' },
    { letter: 'L', image: 'leao.png' },
    { letter: 'M', image: 'macaco.png' },
    { letter: 'N', image: 'naja.png' },
    { letter: 'O', image: 'ornitorrinco.png' },
    { letter: 'P', image: 'pinguim.png' },
    { letter: 'Q', image: 'quati.png'},
    { letter: 'R', image: 'rato.png' },
    { letter: 'S', image: 'sapo.png' },
    { letter: 'T', image: 'tubarão.png' },
    { letter: 'U', image: 'urso.png' },
    { letter: 'V', image: 'veado' },
    { letter: 'Z', image: 'zebra.png' }
];
const alphabetFruits = [
    { letter: 'A', image: 'amora.png' },
    { letter: 'B', image: 'banana.png' },
    { letter: 'C', image: 'caju.png'},
    { letter: 'D', image: 'damasco.png' },
    { letter: 'E', image: 'embu.png' },
    { letter: 'F', image: 'figo.png' },
    { letter: 'G', image: 'goiaba.png' },
    { letter: 'J', image: 'jaca.png' },
    { letter: 'K', image: 'kiwi.png'},
    { letter: 'L', image: 'lima0.png'},
    { letter: 'M', image: 'manga.png' },
    { letter: 'N', image: 'noz.png' },
    { letter: 'P', image: 'pera.png' },
    { letter: 'R', image: 'roma.png' },
    { letter: 'S', image: 'strawberry.png' },
    { letter: 'T', image: 'tangerina.png' },
    { letter: 'U', image: 'uva.png'},
];


const alphabetObjects = [
    { letter: 'A', image: 'https://th.bing.com/th/id/OIP.JrSdg_F6c4gZ54AMqB9-bwAAAA?rs=1&pid=ImgDetMain/aviao.png' },
    { letter: 'B', image: 'bola.png'},
    { letter: 'C', image: 'camera.png'},
    { letter: 'D', image: 'dado.png'},
    { letter: 'E', image: 'escada.png' },
    { letter: 'F', image: 'faca.png'},
    { letter: 'G', image: 'garfo.png' },
    { letter: 'H', image: 'helicoptero.png' },
    { letter: 'I', image: 'iogurte.png' },
    { letter: 'J', image: 'jarra.png' },
    { letter: 'K', image: 'ketchup.png' },
    { letter: 'L', image: 'lampada.png' },
    { letter: 'M', image: 'microfone.png' },
    { letter: 'N', image: 'notebook.png' },
    { letter: 'O', image: 'oculos.png' },
    { letter: 'P', image: 'pincel.png' },
    { letter: 'Q', image: 'quadro.png' },
    { letter: 'R', image: 'radio.png' },
    { letter: 'S', image: 'sabonete.png' },
    { letter: 'T', image: 'tablet.png' },
    { letter: 'U', image: 'unhas.png' },
    { letter: 'V', image: 'violão.png' },
    { letter: 'X', image: 'xicara.png'},
    { letter: 'Y', image: 'yoyo.png'},
    { letter: 'Z', image: 'ziper.png' }
];

const startScreen = document.getElementById('start-screen');
const gameContainer = document.getElementById('game-container');
const lettersContainer = document.querySelector('.letters-container');
const imagesContainer = document.querySelector('.images-container');

function startGame(category) {
    startScreen.style.display = 'none'; 
    gameContainer.classList.remove('hidden'); 

    lettersContainer.innerHTML = '';
    imagesContainer.innerHTML = '';

    category.forEach(item => {
        const letterDiv = document.createElement('div');
        letterDiv.classList.add('letter');
        letterDiv.textContent = item.letter;
        lettersContainer.appendChild(letterDiv);

        const imageDiv = document.createElement('div');
        imageDiv.classList.add('image');
        const imgElement = document.createElement('img');
        imgElement.src = `images/${item.image}`; 
        const nameElement = document.createElement('p');
        nameElement.textContent = item.name;
        imageDiv.appendChild(imgElement);
        imageDiv.appendChild(nameElement);
        imagesContainer.appendChild(imageDiv);

        // Eventos de clique para comparação
        letterDiv.addEventListener('click', () => checkMatch(letterDiv, imageDiv));
        imageDiv.addEventListener('click', () => checkMatch(letterDiv, imageDiv));
    });
}
displayAlphabet();

function displayAlphabet() {
    const allLetters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'.split('');
    allLetters.forEach(letter => {
        const letterDiv = document.createElement('div');
        letterDiv.classList.add('letter');
        letterDiv.textContent = letter;
        lettersContainer.appendChild(letterDiv);
    });
}

function checkMatch(letterDiv, imageDiv) {
    if (!letterDiv.classList.contains('matched') && !imageDiv.classList.contains('matched')) {
        letterDiv.classList.add('matched');
        imageDiv.classList.add('matched');
    } else {
        letterDiv.classList.add('error');
        imageDiv.classList.add('error');
        setTimeout(() => {
            letterDiv.classList.remove('error');
            imageDiv.classList.remove('error');
        }, 800);
    }
}

function combineFruitsAndObjects() {
    return [alphabetAnimals,...alphabetFruits, ...alphabetObjects];
}

document.getElementById('animal-btn').addEventListener('click', () => startGame(alphabetAnimals));
document.getElementById('fruit-btn').addEventListener('click', () => startGame(alphabetFruits));
document.getElementById('object-btn').addEventListener('click', () => startGame(alphabetObjects));
</script>

</html>
