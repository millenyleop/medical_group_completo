<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta Agendada</title>
    <style>
        body {
            background-color: #f0f8ff; /* Um tom claro de azul (alice blue) */
            text-align: center;
            padding: 50px;
            font-family: Arial, sans-serif;
            display: flex;
            align-items: center;
        }

        .content {
            flex: 1;
            text-align: left;
        }

        h1 {
            color: #000080; 
            font-size:40px;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 18px;
            background-color: #27274B;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            margin: 10px;
            font-size: 24px;
        }

        .button:hover {
            background-color: #27274B;
        }

        .sidebar {
            width: 50%;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .doctor-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
            margin-right: -500px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5); /* Sombra ao redor da imagem */
        }

    </style>
</head>
<body>
    <div class="content">
        <h1>Parabéns, você agendou sua consulta com sucesso!</h1>
        <a href="painel.php" class="button">Sair</a>
    </div>

    <div class="sidebar">
        <!-- Substitua o caminho da imagem pela URL da imagem que você deseja usar -->
        <img src="189813-estudante-de-medicina-quais-sao-seus-principais-desafios-810x540.jpg" alt="Imagem de médicos" class="doctor-image">
    </div>
</body>
</html>
