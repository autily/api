<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Jogo Da Memória</title>
    <link rel="stylesheet" href="jogomemoria.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  </head>

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}
body {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
    background: linear-gradient(135deg, #258EE8, #6EC1E4);
    font-family: 'Arial', sans-serif;
    margin: 0;
}
.game-container {
    text-align: center;
    padding: 39px;
    background-color: white;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
}
h1 {
    color: #034672;
    margin-bottom: 20px;
    font-size: 26px;
}
.difficulty-selection {
    margin-bottom: 20px;
    font-size: 18px;
}
#timer,#score {
    font-size: 18px;
    color: #034672;
    text-align: center;
    margin-bottom: 10px;
}
.wrapper{
    padding: 25px;
    background: #D6F0FD; 
    border-radius: 10px;
    box-shadow: 0 3px 10px rgba(0,0,0,0.1);
    text-align: center;
}
#game-board {
    display: none; 
}

.difficulty-selection label {
    font-size: 18px;
    font-weight: bold;
    color: #034672;
}
.difficulty-selection select {
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #034672;
    margin-left: 10px;
    font-size: 16px;
    color: #034672;
    background-color: #f0f8ff;
}
#start-game {
    padding: 12px 24px;
    background-color: #034672;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 18px;
    transition: background-color 0.3s ease;
    margin-top: 15px;
}
#start-game:hover {
    background-color: #0261a8;
}
#score {
    font-size: 24px;
    font-weight: 600;
    color: #034672; 
    margin-bottom: 15px; 
}
.cards, .card, .view{
    display: flex;
    align-items: center;
    justify-content: center;
}
.cards{
    display: flex;
    height: 400px;
    width: 400px;
    flex-wrap: wrap;
    justify-content: space-between;
}
.cards .card{
    cursor: pointer;
    list-style: none;
    user-select: none;
    position: relative;
    perspective: 1000px;
    transform-style: preserve-3d;
    height: calc(100% / 4 - 10px);
    width: calc(100% / 4 - 10px);
}
.card.shake{
    animation: shake 0.35s ease-in-out;
}
@keyframes shake{
    0% , 100%{
        transform:translateX(0);
    }
    20%{
        transform: translateX(-13px);
    }
    40%{
        transform: translateX(13px);
    }
    60%{
        transform: translateX(-8px);
    }
    80%{
        transform: translateX(8px);
    }
}
.card .view{
    width: 100%;
    height: 100%;
    position: absolute;
    border-radius: 7px;
    background: #fff;
    pointer-events: none;
    backface-visibility: hidden;
    box-shadow: 0 3px 10px rgba(0,0,0,0.1);
    transition: transform 0.25s linear;
}
.card .front-view img{
    width: 19px;
}
.card .back-view img{
    max-width: 45px;
}
.card .back-view{
    transform: rotateY(-180deg);
}
.card.flip .back-view{
    transform: rotateY(0);
}
.card.flip .front-view{
    transform: rotateY(180deg);
}

.modal {
    display: none;
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5); 
    display: flex;
    justify-content: center;
    align-items: center;
}

.modal-content {
    background-color: #fff;
    padding: 30px;
    border-radius: 15px;
    text-align: center;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    animation: pop-up 0.5s ease;  
}

@keyframes pop-up {
    0% {
        transform: scale(0.7);
        opacity: 0;
    }
    100% {
        transform: scale(1);
        opacity: 1;
    }
}

.modal-icon {
    width: 80px;
    margin-bottom: 20px;
}

h2 {
    font-size: 24px;
    margin-bottom: 10px;
    color: #333;
}

p {
    font-size: 18px;
    color: #666;
}

#play-again-button {
    margin-top: 20px;
    padding: 10px 20px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 18px;
    transition: background-color 0.3s ease;
}

#play-again-button:hover {
    background-color: #388E3C;
}
.back-button {
    margin-top: 10px;
    padding: 10px 20px;
    background-color: #FF9800;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 18px;
    transition: background-color 0.3s ease;
}

.back-button:hover {
    background-color: #F57C00;
}

#retry-button {
    margin-top: 20px;
    padding: 10px 20px;
    background-color: #00ff00;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 18px;
    transition: background-color 0.3s ease;
}

#retry-button:hover {
    background-color: #e64a19;
}


  
@media screen and (max-width: 700px) {
    .cards{
        height: 350px;
        width: 350px;
    }
    .card .front-view img{
        width: 17px;
    }
    .card .back-view img{
        max-width: 40px;
    }
}
@media screen and (max-width: 530px) {
    .cards{
        height: 300px;
        width: 300px;
    }
    .card .front-view img{
        width: 15px;
    }
    .card .back-view img{
        max-width: 35px;
    }
}
  </style>

  <body>
    <div class="game-container">
      <div class="difficulty-selection" id="difficulty-selection">
          <label for="difficulty">Escolha o nível de dificuldade:</label>
          <select id="difficulty">
              <option value="easy">Fácil (4 pares)</option>
              <option value="medium">Médio (6 pares)</option>
              <option value="hard">Difícil (8 pares)</option>
          </select>
      <button id="start-game" style="display:none;">Iniciar Jogo</button>
  </div>
     
  <div id="win-modal" class="modal" style="display: none;">
    <div class="modal-content">
        <img src="imagens/trofeu.png" alt="Troféu" class="modal-icon">
        <h2>Parabéns, você venceu!</h2>
        <p>Você conseguiu combinar todas as cartas!</p>
        <button id="play-again-button">Jogar novamente</button>
        <button id="back-to-selection-button" class="back-button">Voltar à seleção de fases</button>
    </div>
</div>

  <div id="time-up-modal" class="modal" style="display: none;">
    <div class="modal-content">
      <h2>Ops!O tempo acabou!</h2>
      <p>Não se preocupe, você pode tentar novamente!</p>
      <button id="retry-button">Tentar novamente</button>
    </div>
  </div>
  
  <div id="game-board" style="display:none;">
    <div id="timer">Tempo restante: 60 segundos</div>
    <div id="score">Pontuação: 0</div>
    <div class="wrapper">
        <ul class="cards">
        <li class="card">
          <div class="view front-view">
            <img src="imagens/pontoi.png" alt="icon">
          </div>
          <div class="view back-view">
            <img src="imagens/img-1.png" alt="card-img">
          </div>
        </li>
        <li class="card">
          <div class="view front-view">
            <img src="imagens/pontoi.png" alt="icon">
          </div>
          <div class="view back-view">
            <img src="imagens/img-6.png" alt="card-img">
          </div>
        </li>
        <li class="card">
          <div class="view front-view">
            <img src="imagens/pontoi.png" alt="icon">
          </div>
          <div class="view back-view">
            <img src="imagens/img-3.png" alt="card-img">
          </div>
        </li>
        <li class="card">
          <div class="view front-view">
            <img src="imagens/pontoi.png" alt="icon">
          </div>
          <div class="view back-view">
            <img src="imagens/img-2.png" alt="card-img">
          </div>
        </li>
        <li class="card">
          <div class="view front-view">
            <img src="imagens/pontoi.png" alt="icon">
          </div>
          <div class="view back-view">
            <img src="imagens/img-1.png" alt="card-img">
          </div>
        </li>
        <li class="card">
          <div class="view front-view">
            <img src="imagens/pontoi.png" alt="icon">
          </div>
          <div class="view back-view">
            <img src="imagens/img-5.png" alt="card-img">
          </div>
        </li>
        <li class="card">
          <div class="view front-view">
            <img src="imagens/pontoi.png" alt="icon">
          </div>
          <div class="view back-view">
            <img src="imagens/img-2.png" alt="card-img">
          </div>
        </li>
        <li class="card">
          <div class="view front-view">
            <img src="imagens/pontoi.png" alt="icon">
          </div>
          <div class="view back-view">
            <img src="images/img-6.png" alt="card-img">
          </div>
        </li>
        <li class="card">
          <div class="view front-view">
            <img src="imagens/pontoi.png" alt="icon">
          </div>
          <div class="view back-view">
            <img src="images/img-3.png" alt="card-img">
          </div>
        </li>
        <li class="card">
          <div class="view front-view">
            <img src="imagens/pontoi.png" alt="icon">
          </div>
          <div class="view back-view">
            <img src="images/img-4.png" alt="card-img">
          </div>
        </li>
        <li class="card">
          <div class="view front-view">
            <img src="imagens/pontoi.png" alt="icon">
          </div>
          <div class="view back-view">
            <img src="images/img-5.png" alt="card-img">
          </div>
        </li>
        <li class="card">
          <div class="view front-view">
            <img src="imagens/pontoi.png" alt="icon">
          </div>
          <div class="view back-view">
            <img src="images/img-4.png" alt="card-img">
          </div>
        </li>
        <li class="card">
          <div class="view front-view">
            <img src="imagens/pontoi.png" alt="icon">
          </div>
          <div class="view back-view">
            <img src="images/img-4.png" alt="card-img">
          </div>
        </li>
        <li class="card">
          <div class="view front-view">
            <img src="imagens/pontoi.png" alt="icon">
          </div>
          <div class="view back-view">
            <img src="images/img-4.png" alt="card-img">
          </div>
        </li>
        <li class="card">
          <div class="view front-view">
            <img src="imagens/pontoi.png" alt="icon">
          </div>
          <div class="view back-view">
            <img src="images/img-4.png" alt="card-img">
          </div>
        </li>
        <li class="card">
          <div class="view front-view">
            <img src="imagens/pontoi.png" alt="icon">
          </div>
          <div class="view back-view">
            <img src="images/img-4.png" alt="card-img">
          </div>
        </li>
      </ul>
    </div>

    <script>
      
const scoreDisplay = document.getElementById("score");
const timerDisplay = document.getElementById("timer");
const difficultySelector = document.getElementById("difficulty");
const startButton = document.getElementById("start-game");
const gameBoard = document.getElementById("game-board");
const difficultySelection = document.getElementById("difficulty-selection");
const cardsContainer = document.querySelector(".cards");

let matched = 0;
let score = 0;
let timeLeft = 60;
let cardOne, cardTwo;
let disableDeck = false;
let timer;


difficultySelector.addEventListener("change", () => {
    startButton.style.display = "block";  
});

function updateScore(points) {
    score += points;
    scoreDisplay.textContent = `Pontuação: ${score}`;
}

function flipCard({ target: clickedCard }) {
    if (cardOne !== clickedCard && !disableDeck) {
        clickedCard.classList.add("flip");
        if (!cardOne) {
            return cardOne = clickedCard;
        }
        cardTwo = clickedCard;
        disableDeck = true;
        let cardOneImg = cardOne.querySelector(".back-view img").src,
            cardTwoImg = cardTwo.querySelector(".back-view img").src;
        matchCards(cardOneImg, cardTwoImg);
    }
}

function showWinModal() {
    const winModal = document.getElementById("win-modal");
    winModal.style.display = "flex";  

    const playAgainButton = document.getElementById("play-again-button");
    playAgainButton.onclick = function() {
        winModal.style.display = "none";  
        resetGame();  
    };

    const backToSelectionButton = document.getElementById("back-to-selection-button");
    backToSelectionButton.onclick = function() {
        winModal.style.display = "none";  
        gameBoard.style.display = "none";  
        difficultySelection.style.display = "block"; 
        resetGame();  
    };
}

function matchCards(img1, img2) {
    if (img1 === img2) {
        matched++;
        updateScore(10);
        if (matched === numberOfPairs) {
            setTimeout(() => {
                showWinModal();  s
            }, 1000);
        }
        cardOne.removeEventListener("click", flipCard);
        cardTwo.removeEventListener("click", flipCard);
        cardOne = cardTwo = "";
        return disableDeck = false;
    }

    setTimeout(() => {
        cardOne.classList.add("shake");
        cardTwo.classList.add("shake");
    }, 400);

    setTimeout(() => {
        cardOne.classList.remove("shake", "flip");
        cardTwo.classList.remove("shake", "flip");
        cardOne = cardTwo = "";
        disableDeck = false;
    }, 1200);
}


function shuffleCard() {
    matched = 0;
    score = 0;
    updateScore(0);
    disableDeck = false;
    cardOne = cardTwo = "";

    let arr = [];
    for (let i = 1; i <= numberOfPairs; i++) {
        arr.push(i, i);
    }
    arr.sort(() => Math.random() > 0.5 ? 1 : -1);

    cardsContainer.innerHTML = "";  
    arr.forEach((num) => {
        const card = document.createElement("li");
        card.classList.add("card");
        card.innerHTML = `
            <div class="view front-view"><img src="imagens/pontoi.png" alt="icon"></div>
            <div class="view back-view"><img src="imagens/img-${num}.png" alt="card-img"></div>`;
        card.addEventListener("click", flipCard);
        cardsContainer.appendChild(card);
    });
}

function startTimer() {
        if (timer) {
            clearInterval(timer);
        }
        timer = setInterval(() => {
            timeLeft--;
            document.getElementById("timer").textContent = `Tempo restante: ${timeLeft} segundos`;
            if (timeLeft <= 0) {
                clearInterval(timer);  
                alert('O tempo acabou! Tente novamente.');  
                resetGame();  
            }
        }, 1000);  
    }


function showTimeUpModal() {
    const modal = document.getElementById("time-up-modal");
    modal.style.display = "flex";  
    const retryButton = document.getElementById("retry-button");
    retryButton.onclick = function() {
        modal.style.display = "none";  
        resetGame();  
    };
}

function resetGame() {
    timeLeft = 60;  
    score = 0;  
    matched = 0;  
    updateScore(0);  
    shuffleCard();  
    startTimer(); 
}

function hideTimeUpModal() {
    const modal = document.getElementById("time-up-modal");
    modal.style.display = "none";  
}


function startTimer() {
    if (timer) {
        clearInterval(timer); 
    }
    timer = setInterval(() => {
        timeLeft--;
        document.getElementById("timer").textContent = `Tempo restante: ${timeLeft} segundos`;
        if (timeLeft <= 0) {
            clearInterval(timer);  
            showTimeUpModal(); 
        }
    }, 1000);  
}

document.getElementById("retry-button").addEventListener("click", () => {
    hideTimeUpModal();  
    resetGame();        
});

startButton.addEventListener("click", () => {
    const selectedDifficulty = difficultySelector.value;

    if (selectedDifficulty === "easy") {
        numberOfPairs = 4;
    } else if (selectedDifficulty === "medium") {
        numberOfPairs = 6;
    } else if (selectedDifficulty === "hard") {
        numberOfPairs = 8;
    }

    
    difficultySelection.style.display = "none";
    gameBoard.style.display = "block";

    resetGame();
    startTimer();
});
    </script>

  </body>
</html>