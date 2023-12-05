<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página do Médico</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-image: url("https://media.istockphoto.com/id/1364075546/pt/foto/empty-corridor-in-modern-hospital-with-information-counter-and-hospital-bed-in-rooms-3d.jpg?s=612x612&w=0&k=20&c=AAbtYVROH-hob3Cez4vuH1R7pNqp-AdmDsHknq2fy-8="); 
            margin: auto;
            background-repeat: no-repeat;
            background-size: cover;
        }
        .container {
            background-color: rgba(144, 184, 206, 0.9); /* Tons de azul */
            border-radius: 10px;
            box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.2);
            padding: 20px;
            width: 80%;
            max-width: 600px;
            margin: 50px auto;
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
        }
        .button:hover {
            background-color: #27274B;
        }
    </style>
</head>
<body>
    <center>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>

    <div class="container">
        <h1>Bem-vindo à sua página de paciente</h1>
        <p>Aqui você pode agendar consultas e gerenciar suas informações.</p>
        <a href="agendamentos.php" class="button" onclick="agendamentos()">Agendar Consulta</a>
        <a href="logout.php" class="button">Sair</a>
    </div>
    <script>
        function verconsultas(){
            window.location.assign("http://localhost/prontuarios.php")
        }
    </script>
</body>
</html>