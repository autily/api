<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jogo Sequência de Cores</title>
    <link rel="stylesheet" href="jogocores.css">
</head>

<style>
    body {
    font-family: 'Arial', sans-serif;
    background-color: #66b9fa;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.container {
    background-color: #b3e5fc;
    border-radius: 15px;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
    padding: 40px;
    width: 400px;
    text-align: center;
}

h1 {
    font-size: 2.5em;
    margin-bottom: 10px;
    color: #01579b;
    font-family: 'Trebuchet MS', sans-serif;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
}

#score {
    font-size: 1.2em;
    color: #0288d1;
    margin-bottom: 20px;
    font-family: 'Courier New', monospace;
}

.buttons {
    display: grid;
    grid-template-columns: repeat(2, 150px);
    grid-gap: 15px;
    justify-content: center;
    margin-bottom: 30px;
}

.color-button {
    width: 150px;
    height: 150px;
    border-radius: 10px;
    cursor: pointer;
    transition: all 0.2s ease-in-out;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    position: relative;
    opacity: 1;
}

#red {
    background-color: #ff0000; 
}

#green {
    background-color: #1eff00; 
}

#blue {
    background-color: rgb(36, 2, 189); 
}

#yellow {
    background-color: #fbff00; 
}


.color-button.active {
    transform: scale(1.2);  
    box-shadow: 0 0 20px rgba(255, 255, 255, 0.8); 
    filter: brightness(1.5);  
    opacity: 1;
}

.color-button.inactive {
    opacity: 0.5;
    pointer-events: none;
}

#startBtn {
    background-color: #03a9f4;
    color: white;
    border: none;
    padding: 15px 30px;
    font-size: 1.2em;
    border-radius: 30px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

#startBtn:hover {
    background-color: #0288d1;
}

#startBtn:active {
    transform: scale(0.98);
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
}

@media (max-width: 500px) {
    .container {
        width: 90%;
        padding: 20px;
    }

    .color-button {
        width: 120px;
        height: 120px;
    }

    .buttons {
        grid-template-columns: repeat(2, 120px);
    }

    #startBtn {
        font-size: 1em;
        padding: 10px 20px;
    }
}
#error-message {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: rgba(255, 99, 71, 0.95); 
    color: #fff;
    padding: 25px 40px;
    border-radius: 20px;
    font-size: 1.8em;
    text-align: center;
    z-index: 1000;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    animation: slide-down 0.5s ease;  
}

#error-message.fade-out {
    opacity: 0;
    transition: opacity 1s ease;
}

@keyframes slide-down {
    0% {
        transform: translate(-50%, -100%);
        opacity: 0;
    }
    100% {
        transform: translate(-50%, -50%);
        opacity: 1;
    }
} 
</style>

<body>
    <div class="container">
        <h1>Jogo sequência de Cores</h1>
        <div id="score">Pontuação: 0</div>
        <div class="buttons">
            <div class="color-button" id="red"></div>
            <div class="color-button" id="green"></div>
            <div class="color-button" id="blue"></div>
            <div class="color-button" id="yellow"></div>
        </div>
        <button id="startBtn"> <a href=""></a>Iniciar Jogo</button>
    </div>

    <script>
        const colors = ["red", "green", "blue", "yellow"];
let gameSequence = [];
let playerSequence = [];
let score = 0;
let playerTurn = false;

const redButton = document.getElementById("red");
const greenButton = document.getElementById("green");
const blueButton = document.getElementById("blue");
const yellowButton = document.getElementById("yellow");
const startButton = document.getElementById("startBtn");
const scoreDisplay = document.getElementById("score");

const buttons = {
    red: redButton,
    green: greenButton,
    blue: blueButton,
    yellow: yellowButton,
};

function nextSequence() {
    const randomColor = colors[Math.floor(Math.random() * colors.length)];
    gameSequence.push(randomColor);
    playerSequence = [];
    playSequence();
}


function playSequence() {
    playerTurn = false;
    setButtonsInactive(true); 
    let delay = 700;

    gameSequence.forEach((color, index) => {
        setTimeout(() => {
            flashButton(color);
        }, delay * (index + 1));
    });

    setTimeout(() => {
        playerTurn = true;
        setButtonsInactive(false); 
    }, delay * (gameSequence.length + 1));
}

function flashButton(color) {
    const button = buttons[color];
    button.classList.add("active");
    setTimeout(() => {
        button.classList.remove("active");
    }, 500); 
}

function setButtonsInactive(state) {
    Object.values(buttons).forEach(button => {
        if (state) {
            button.classList.add("inactive");
        } else {
            button.classList.remove("inactive");
        }
    });
}

function checkPlayerSequence() {
    const currentMove = playerSequence.length - 1;

    if (playerSequence[currentMove] !== gameSequence[currentMove]) {
        resetGame();
        return;
    }

    if (playerSequence.length === gameSequence.length) {
        score++;
        updateScore();
        setTimeout(() => {
            nextSequence();
        }, 1000);
    }
}

function startGame() {
    score = 0;
    gameSequence = [];
    playerSequence = [];
    updateScore();
    nextSequence();
}

function resetGame() {
    alert("Você errou! Tente novamente.");
    score = 0;
    gameSequence = [];
    playerSequence = [];
    playerTurn = false;
    updateScore();
}

function updateScore() {
    scoreDisplay.innerText = `Pontuação: ${score}`;
}

document.querySelectorAll(".color-button").forEach(button => {
    button.addEventListener("click", (e) => {
        if (!playerTurn) return;

        const clickedColor = e.target.id;
        playerSequence.push(clickedColor);
        flashButton(clickedColor);
        checkPlayerSequence();
    });
});

startButton.addEventListener("click", startGame);

function showErrorMessage() {
    const message = document.createElement('div');
    message.id = 'error-message';
    message.innerText = "Você errou! Tente novamente.";
    document.body.appendChild(message);

    setTimeout(() => {
        message.remove();
    }, 3000);  
}


function resetGame() {
    showErrorMessage();  
    score = 0;
    gameSequence = [];
    playerSequence = [];
    playerTurn = false;
    updateScore();
}



    </script>
</body>
</html>

