<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="crianca.css">
    <title>Rotina - Criança</title>
</head>

<header class="header">
    <a href="public/crianca.php">
        <i class="fa-solid fa-arrow-left" style="color: white;"></i>
    </a>
    <div class="search-bar">
        <input type="text" id="searchInput" placeholder="Pesquisar...">
        <i class="fa-solid fa-magnifying-glass search-icon"></i>
    </div>   
</header>


<body>
    <div class="container-dad">
        <h1><i class="fa-solid fa-children"></i><h1 style="color: rgb(0, 0, 0);">Veja a rotina</h1></h1>
    
        <table id="readonlyTable">
            <thead>
                <tr>
                    <th><i class="fa-solid fa-calendar-days"></i> Data</th>
                    <th><i class="fa-solid fa-clock"></i> Horário</th>
                    <th><i class="fa-solid fa-child"></i> Atividade</th>
                </tr>
            </thead>
            <tbody>
                <!-- As linhas serão adicionadas pelo script -->
            </tbody>
        </table>
        <script src="rotinaC.js"></script>
        
        <style>
            body {
                font-family: 'Comic Sans MS', sans-serif;
                background-color: #e3f2fd; 
                margin: 0;
                padding: 0;
            }
        
            h2 {
                text-align: center;
                color: #007bff;
                margin: 20px 0;
                font-size: 1.8em;
                font-weight: bold;
                text-shadow: 2px 2px #90caf9;
            }
        
            .container-dad {
                padding: 20px;
                max-width: 800px;
                margin: 10% auto;
                background-color: #ffffff;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
                border-radius: 16px;
                animation: bounceIn 1s ease;
            }
        
            @keyframes bounceIn {
                from {
                    transform: translateY(50px);
                    opacity: 0;
                }
                to {
                    transform: translateY(0);
                    opacity: 1;
                }
            }
        
            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 5%;
                background-color: #ffffff;
                border-radius: 12px;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
                overflow: hidden;
            }
        
            th, td {
                padding: 12px 15px;
                text-align: center;
                border-bottom: 2px solid #90caf9;
                font-size: 16px;
                font-weight: bold;
            }
        
            th {
                background-color: #007bff;
                color: #ffffff;
                text-transform: uppercase;
                border-bottom: 3px solid #0056b3;
                font-size: 18px;
            }
        
            td {
                background-color: #e1f5fe;
                transition: background-color 0.3s ease;
                font-size: 16px;
            }
        
            td:hover {
                background-color: #b3e5fc;
            }
        
            td.editable {
                background-color: #ffeb3b;
                cursor: pointer;
                transition: transform 0.2s ease;
            }
        
            td.editable:hover {
                transform: scale(1.1);
                background-color: #fff59d;
            }
        
            td button {
                background-color: #007bff;
                color: #ffffff;
                border: none;
                padding: 8px 12px;
                font-size: 14px;
                cursor: pointer;
                border-radius: 12px;
                transition: background-color 0.3s ease, transform 0.2s ease;
            }
        
            td button:hover {
                background-color: #0056b3;
                transform: scale(1.1);
            }
        
            .button-container {
                margin-top: 20px;
                display: flex;
                justify-content: center;
                align-items: center;
            }
        
            .button-container button {
                background-color: #007bff;
                color: #ffffff;
                border: none;
                padding: 12px 24px;
                font-size: 18px;
                cursor: pointer;
                border-radius: 30px;
                transition: background-color 0.3s ease, transform 0.2s ease;
            }
        
            .button-container button:hover {
                background-color: #0056b3;
                transform: scale(1.05);
            }
        
            .bottom-menu {
                position: fixed;
                bottom: 0;
                width: 100%;
                background-color: rgba(173, 216, 230, 0.8);
                box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);
                display: flex;
                justify-content: space-around;
                padding: 10px 0;
            }
        
            .bottom-menu a {
                text-align: center;
                color: #007bff;
                text-decoration: none;
                font-size: 14px;
            }
        
            .bottom-menu a .menu-item {
                display: flex;
                flex-direction: column;
                align-items: center;
            }
        
            .bottom-menu a:hover {
                color: #0056b3;
            }
        
            .fa-solid {
                font-size: 24px;
                margin-bottom: 5px;
            }
        </style>
        </div>
    
   <!-- MENU INFERIOR -->
   <div class="bottom-menu">
    <a href="rotinaC.php" class="menu-item">
        <i class="fa-solid fa-calendar-check"></i>
    </a>
    <a href="public/jogos/jogos.php" class="menu-item">
        <i class="fa-solid fa-gamepad"></i>
    </a>
</div>

    <script src="crianca.js"></script>
</body>
</html>