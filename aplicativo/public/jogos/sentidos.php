<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jogo dos Sentidos</title>
    <link rel="stylesheet" href="style.css">
</head>

<style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

body {
    background: linear-gradient(135deg, #a8edea, #fed6e3);
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

#game-container {
    width: 100%;
    max-width: 600px;
    background-color: #ffffff;
    border-radius: 20px;
    padding: 40px;
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
    text-align: center;
    transition: transform 0.3s ease-in-out;
}

#game-container:hover {
    transform: scale(1.02);
}

#start-screen {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

h1 {
    font-size: 2.5rem;
    color: #333;
    margin-bottom: 20px;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
}

#start-button {
    background-color: #4CAF50;
    color: white;
    padding: 15px 30px;
    font-size: 1.2rem;
    border: none;
    border-radius: 50px;
    cursor: pointer;
    transition: all 0.4s ease;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

#start-button:hover {
    background-color: #45a049;
    transform: translateY(-5px);
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
}

#game-screen {
    display: flex;
    flex-direction: column;
    align-items: center;
    display: none;
}

#question-text {
    font-size: 1.8rem;
    color: #444;
    margin-bottom: 20px;
    font-weight: bold;
}

#game-options {
    display: flex;
    flex-direction: column;
    align-items: center;
}

#image {
    width: 200px;
    height: 200px;
    margin-bottom: 20px;
    border-radius: 10px;
    border: 5px solid #f0f0f0;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s;
}

#image:hover {
    transform: scale(1.05);
}

#choices {
    display: flex;
    justify-content: space-around;
    width: 100%;
}

.choice {
    padding: 15px 20px;
    margin: 10px;
    font-size: 2rem;
    background-color: #f0f0f0;
    border: none;
    cursor: pointer;
    border-radius: 50%;
    transition: all 0.3s;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.choice:hover {
    background-color: #ddd;
    transform: translateY(-5px);
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
}

.choice:focus {
    outline: none;
    border: 2px solid #4CAF50;
}

#feedback {
    margin-top: 20px;
    font-size: 1.2rem;
    color: #333;
    font-weight: bold;
    text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
    transition: all 0.3s;
}
</style>

<body>
    <div id="game-container">
        <div id="start-screen">
            <h1>Jogo dos Sentidos</h1>
            <button id="start-button">Começar Jogo</button>
        </div>

        <div id="game-screen">
          <h2 id="question-text"></h2>
          <img id="image" src="" alt="Imagem do Jogo">
          <div id="choices">
              <button class="choice" id="choice-1"></button>
              <button class="choice" id="choice-2"></button>
              <button class="choice" id="choice-3"></button>
              <button class="choice" id="choice-4"></button>
          </div>
          <p id="feedback"></p>
          <button id="next-phase-button" style="display:none;">Próxima Fase</button> <!-- Botão da próxima fase -->
      </div>
</body>

<script>
    const startButton = document.getElementById("start-button");
const gameScreen = document.getElementById("game-screen");
const startScreen = document.getElementById("start-screen");
const questionText = document.getElementById("question-text");
const imageElement = document.getElementById("image");
const choices = Array.from(document.getElementsByClassName("choice"));
const feedback = document.getElementById("feedback");
const nextPhaseButton = document.getElementById("next-phase-button");

let currentPhase = 0; // Fase inicial

const phases = [
    {
        question: "Qual sentido usamos?",
        image: "caminho/para/imagem1.jpg",
        answers: ["👄", "👁️", "✋","👂"],
        correctAnswer: 1
    },
    {
        question: "Qual sentido usamos?",
        image: "caminho/para/imagem2.jpg",
        answers: ["👂", "👁️", "👄","✋"],
        correctAnswer: 0
    },
    {
        question: "Qual sentido usamos?",
        image: "caminho/para/imagem3.jpg",
        answers: ["👄", "👂", "✋","👁️"],
        correctAnswer: 2
    },
    {
        question: "Qual sentido usamos?",
        image: "caminho/para/imagem4.jpg",
        answers: ["👄", "👁️", "👂","✋"],
        correctAnswer: 1
    },
    {
        question: "Qual sentido usamos?",
        image: "caminho/para/imagem5.jpg",
        answers: ["👄", "✋", "👂","👁️"],
        correctAnswer: 0
    },
    {
        question: "Qual sentido usamos?",
        image: "caminho/para/imagem6.jpg",
        answers: ["👁️", "👂", "👄","✋"],
        correctAnswer: 0
    },
    {
        question: "Qual sentido usamos?",
        image: "caminho/para/imagem7.jpg",
        answers: ["✋", "👂", "👄","👁️"],
        correctAnswer: 0
    },
    {
        question: "Qual sentido usamos?",
        image: "caminho/para/imagem8.jpg",
        answers: ["👄", "👂", "👁️","✋"],
        correctAnswer: 2
    },
    {
        question: "Qual sentido usamos?",
        image: "caminho/para/imagem9.jpg",
        answers: ["✋", "👂", "👁️","👄"],
        correctAnswer: 0
    },
    {
        question: "Qual sentido usamos?",
        image: "caminho/para/imagem10.jpg",
        answers: ["👁️", "👂", "✋","👄"],
        correctAnswer: 2
    },
    {
        question: "Qual sentido usamos?",
        image: "caminho/para/imagem11.jpg",
        answers: ["👄", "✋", "👁️","👂"],
        correctAnswer: 1
    },
    {
        question: "Qual sentido usamos?",
        image: "caminho/para/imagem12.jpg",
        answers: ["👂", "👁️", "👄","✋"],
        correctAnswer: 2
    },
    {
        question: "Qual sentido usamos?",
        image: "caminho/para/imagem13.jpg",
        answers: ["👁️", "👂", "👄","✋"],
        correctAnswer: 1
    },
    {
        question: "Qual sentido usamos?",
        image: "caminho/para/imagem14.jpg",
        answers: ["👄", "👁️", "👂","✋"],
        correctAnswer: 0
    },
    {
        question: "Qual sentido usamos?",
        image: "caminho/para/imagem15.jpg",
        answers: ["👁️", "👂", "✋","👄"],
        correctAnswer: 2
    },
    {
        question: "Qual sentido usamos?",
        image: "caminho/para/imagem16.jpg",
        answers: ["👄", "✋", "👂","👁️"],
        correctAnswer: 0
    },
    {
        question: "Qual sentido usamos?",
        image: "caminho/para/imagem17.jpg",
        answers: ["👂", "👄", "✋","👁️"],
        correctAnswer: 2
    },
    {
        question: "Qual sentido usamos?",
        image: "caminho/para/imagem18.jpg",
        answers: ["👁️", "✋", "👂","👄"],
        correctAnswer: 0
    },
    {
        question: "Qual sentido usamos?",
        image: "caminho/para/imagem19.jpg",
        answers: ["👄", "👂", "✋","👁️"],
        correctAnswer: 2
    },
    {
        question: "Qual sentido usamos?",
        image: "caminho/para/imagem20.jpg",
        answers: ["👁️", "✋", "👄","👂"],
        correctAnswer: 0
    },
];

// Função para carregar a fase
function loadPhase(phaseIndex) {
    const phase = phases[phaseIndex];
    questionText.textContent = phase.question;
    imageElement.src = phase.image;
    feedback.textContent = "";
    nextPhaseButton.style.display = "none";

    choices.forEach((choice, index) => {
        choice.textContent = phase.answers[index];
        choice.style.backgroundColor = "#78C2AD"; 
        choice.onclick = () => {
            if (index === phase.correctAnswer) {
                feedback.textContent = "Correto!";
                choice.style.backgroundColor = "#90EE90";
                nextPhaseButton.style.display = "block";
            } else {
                feedback.textContent = "Tente novamente!";
                choice.style.backgroundColor = "#FF6F61";
            }
        };
    });
}

// Avançar para a próxima fase
nextPhaseButton.onclick = () => {
    currentPhase++;
    if (currentPhase < phases.length) {
        loadPhase(currentPhase);
    } else {
        feedback.textContent = "Você completou todas as fases!";
        nextPhaseButton.style.display = "none";
    }
};

// Iniciar o jogo
startButton.onclick = () => {
    startScreen.style.display = "none";
    gameScreen.style.display = "block";
    loadPhase(currentPhase);
};

</script>

</html>
