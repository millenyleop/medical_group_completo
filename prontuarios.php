<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prontuário Médico</title>
    <style>
         body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #E6F7FF; /* Azul claro suave */
        margin: 0;
        padding: 0;
        background-image: url(fundo1.jpg);
        background-repeat: no-repeat;
        background-size: cover;
        min-height: 100vh;
    }

    .prontuario {
        width: 80%;
        max-width: 600px;
        padding: 20px;
        border: 1px solid #BFD3C1; /* Azul mais claro para a borda */
        background-color: #fff; /* Azul claro */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        border-radius: 10px;
        text-align:left;
        margin-bottom:20px;
        
    }

    h1 {
        background-color: ; /* Azul mais claro para o cabeçalho */
        padding: 10px;
        border-radius: 10px;
        color: #1E90FF; /* Azul Royal */
        text-align: center;
        margin-bottom: 20px;
    }

    h2 {
        color: #1E90FF; /* Azul Royal */
    }

    .dados-paciente,
    .historico,
    #info-adicional {
        margin-top: 20px;
    }

    .dados-paciente label,
    .historico label {
        font-weight: bold;
        color: #1E90FF; /* Azul Royal */
    }

    .dados-paciente p,
    .historico p,
    #info-adicional p {
        margin: 5px 0;
        color: #333; /* Cor escura para o texto */
    }

    #mostrar-mais {
        background-color: #4169E1; /* Azul Real */
        color: #fff;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        margin-top: 20px;
        border-radius: 5px;
        transition: 0.3s ease;
    }

    #mostrar-mais:hover {
        background-color: #001F3F; /* Tom mais escuro ao passar o mouse */
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

        .tudo{
            width:100%;
            height:100%;
       
          
          
            
        }
   
    </style>
</head>
<center>
    <body>
    <h1 class="aa" >Prontuários</h1>
    <br>

    <?php
        // Conectar ao banco de dados (substitua com suas credenciais)
        $servername = "localhost";
        $username = "phpmyadmin";
        $password = "aluno";
        $dbname = "agendamento";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verificar a conexão
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Consulta SQL para obter dados do banco de dados
        $sql = "SELECT nome, telefone, servicos, data_agendamento, hora_agendamento, dia_semana FROM agendamentos";
        $result = $conn->query($sql);

        // Exibir dados se houver resultados
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="tudo">';
                echo '<div class="prontuario">';
                echo '<div class="dados-paciente">';
                echo '<h2>Dados do Paciente</h2>';
                echo '<label>Nome:</label><p>' . $row["nome"] . '</p>';
                echo '<label>Telefone:</label><p>' . $row["telefone"] . '</p>';
                echo '<label>Serviços:</label><p>' . $row["servicos"] . '</p>';
                echo '<label>Data de Agendamento:</label><p>' . $row["data_agendamento"] . '</p>';
                echo '<label>Hora de Agendamento:</label><p>' . $row["hora_agendamento"] . '</p>';
                echo '<label>Dia da Semana:</label><p>' . $row["dia_semana"] . '</p>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo "Você náo possui consultas no momento";
        }

        $conn->close();
    ?>
        <div class="prontuario"> 
        
        <a href="painel1.php" class="button" >Sair</a>
        
            

<script>
    function mostrarMais() {
        var infoAdicional = document.getElementById("info-adicional");
        var botaoMostrarMais = document.getElementById("mostrar-mais");

        if (infoAdicional.style.display === "none") {
            infoAdicional.style.display = "block";
            botaoMostrarMais.textContent = "Mostrar Menos";
        } else {
            infoAdicional.style.display = "none";
            botaoMostrarMais.textContent = "Mostrar Mais";
        }
    }
</script>

</body>
</center>
</html>
