<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>jogos</title>
    <style>
         .scrollable-app {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .background-bubbles {
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: -1;
            overflow: hidden;
        }

        .bubble {
            position: absolute;
            border-radius: 50%;
            opacity: 0.5;
            background-color: #66B9FA;
            animation: rise 15s infinite linear; 
        }

        @keyframes rise {
            0% {
                transform: translateY(100vh); 
            }
            100% {
                transform: translateY(-100vh); 
            }
        }

        .bubble:nth-child(1) { width: 100px; height: 100px; left: 10%; animation-duration: 7s; }
        .bubble:nth-child(2) { width: 150px; height: 150px; left: 70%; animation-duration: 12s; }
        .bubble:nth-child(3) { width: 50px; height: 50px; left: 30%; animation-duration: 10s; }
        .bubble:nth-child(4) { width: 80px; height: 80px; left: 50%; animation-duration: 15s; }
        .bubble:nth-child(5) { width: 60px; height: 60px; left: 20%; animation-duration: 8s; }
        .bubble:nth-child(6) { width: 120px; height: 120px; left: 80%; animation-duration: 18s; }
        .bubble:nth-child(7) { width: 90px; height: 90px; left: 40%; animation-duration: 20s; }
        .bubble:nth-child(8) { width: 110px; height: 110px; left: 60%; animation-duration: 14s; }
        .bubble:nth-child(9) { width: 130px; height: 130px; left: 15%; animation-duration: 22s; }
        .bubble:nth-child(10) { width: 70px; height: 70px; left: 75%; animation-duration: 9s; }

        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #698cff;
            border-radius: 20px;
            padding: 20px;
            width: 350px;
            color: #fff;
            text-align: center;
            margin-top: 20%;
        }
        h1 {
            margin-bottom: 20px;
        }
        .jogos-card {
            display: flex;
            background-color: #F9F9FB;
            border-radius: 15px;
            padding: 15px;
            margin-bottom: 20px;
            color: #333;
        }
        .jogos-image {
            width: 60px;
            height: 60px;
            margin-right: 15px;
            border-radius: 10px;
        }
        .jogos-info h2 {
            margin: 0;
            font-size: 16px;
            color: #698cff;
        }
        .jogos-info p {
            margin: 5px 0;
            font-size: 14px;
        }
        .progress-bar {
            background-color: #ddd;
            border-radius: 10px;
            height: 10px;
            width: 100%;
            margin-top: 10px;
        }
        .progress {
            background-color: #698cff;
            height: 100%;
            border-radius: 10px;
        }

        @media (max-width: 768px) {
            .text-section { width: 95%; }
            .image-section img { width: 90%; max-width: 200px; }
        }
    </style>
</head>
<body>
    <div class="scrollable-app">    
        <main class="main-content">
            <div class="background-bubbles">
                <div class="bubble"></div>
                <div class="bubble"></div>
                <div class="bubble"></div>
                <div class="bubble"></div>
                <div class="bubble"></div>
                <div class="bubble"></div>
                <div class="bubble"></div>
                <div class="bubble"></div>
                <div class="bubble"></div>
                <div class="bubble"></div>
                <!-- Bubbles -->
            </div>

    <div class="container">
        <h1>Jogos</h1>
    <a href="jogocores.php">
        <div class="jogos-card">
            <img src="..img/gato nerd" alt="" class="jogos-image">
            <div class="jogos-info">
                <h2>Jogo das cores</h2>
                <p>As cores serão mostradas em uma ordem, clique nas cores conforme foram mostradas!</p>
            </div>
        </div>
    </a>

    <a href="sentidos.php">
        <div class="jogos-card">
            <img src="new-image2.png" alt="" class="jogos-image">
            <div class="jogos-info">
                <h2>Jogo dos Sentidos</h2>
                <p>Descubra qual sentido do corpo humano o objeto trabalha</p>
            </div>
        </div>
    </a>    

        <a href="jogomemoria.php">
            <div class="jogos-card">
                <img src="new-image2.png" alt="" class="jogos-image">
                <div class="jogos-info">
                    <h2>Jogo da memória</h2>
                    <p>Acerte os pares de cada peça!</p>
                </div>
            </div>
        </a>

        <a href="alfabeto.php">
            <div class="jogos-card">
                <img src="new-image2.png" alt="" class="jogos-image">
                <div class="jogos-info">
                    <h2>Alfabeto</h2>
                    <p>Relacione a letra com a letra incial de cada fruta, objeto ou animais!</p>
                </div>
            </div>
        </a>

    </div>
</body>
</html>
