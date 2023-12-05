<?php
session_start();

// Conectar ao banco de dados (substitua com suas próprias credenciais)
$conexao = new mysqli("localhost", "phpmyadmin", "aluno", "agendamento");

// Verificar conexão
if ($conexao->connect_error) {
    die("Conexão falhou: " . $conexao->connect_error);
}

// Processar dados do formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $telefone = $_POST["telefone"]; 
    $servicos = $_POST["servicos"];
    $data = $_POST["datepicker"];
    $hora = $_POST["timepicker"];
    $dia_semana = $_POST["daypicker"];

    // Inserir dados no banco de dados usando prepared statement
    $stmt = $conexao->prepare("INSERT INTO agendamentos (nome, telefone, servicos, data_agendamento, hora_agendamento, dia_semana) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $nome, $telefone, $servicos, $data, $hora, $dia_semana);

    if ($stmt->execute()) {
        $_SESSION['msg'] = "Agendamento realizado com sucesso!";
        header("Location: telapaciente.php");
    } else {
        $_SESSION['msg'] = "Erro ao agendar: " . $conexao->error;
    }

    $stmt->close();
}



// Fechar a conexão
$conexao->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-datetimepicker.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <title>Sistema - Agendamento</title>
</head>
<body><center>
<div class="container-fluid">
    
    
    <form class="form-horizontal" action="agendamentos.php" method="POST">
        <h2> <strong> Agendamento </strong> </h2>
        <br>
        <div class="col-sm-3 col-sm-offset-3">
            <label>Nome</label>
            <input class="form-control" type="text" name="nome" placeholder="Digite seu nome" required>
        </div>
        <div class="col-sm-3">
            <label>Telefone</label>
            <input class="form-control" type="text" name="telefone" placeholder="Digite seu telefone" required>
        </div>
        <div class="col-sm-6 col-sm-offset-3">
            <label>Serviços</label>
            <select name="servicos" class="form-control">
                <option value="" selected=>Selecione um serviço</option>
                <option>‍Cardiologia</option>
                <option>‍Dermatologia</option>
                <option>Gastrenterologia</option>
                <option>Odontologia</option>
                <option>Pediatria</option>
                <option>Dermatologia</option>
                <option>Neurologia</option>
                <option>Oncologia</option>
                <option>Infectologia</option>
            </select>
        </div>
        <div class="col-sm-6 col-sm-offset-3"> 
            
            <label for="datepicker">Selecione a Data:</label>
            <input type="text" id="datepicker" name="datepicker" placeholder="Selecione a data">
            <br>
            <label for="timepicker">Selecione a Hora:</label>
            <input type="text" id="timepicker" name="timepicker" placeholder="Selecione a hora">
            
            <label for="daypicker">Selecione o Dia da Semana:</label>
            <select id="daypicker" name="daypicker">
                <option value="domingo">Domingo</option>
                <option value="segunda">Segunda-feira</option>
                <option value="terca">Terça-feira</option>
                <option value="quarta">Quarta-feira</option>
                <option value="quinta">Quinta-feira</option>
                <option value="sexta">Sexta-feira</option>
                <option value="sabado">Sábado</option>
            </select>

        </div>

        <!-- Movendo o botão de Agendar para dentro do formulário -->
        <div class="col-sm-offset-3 col-sm-6">
        
            <button type="submit" class="btn btn-success">Agendar</button>
        </div>
    </form>

    <div class="col-sm-6 col-sm-offset-3" id="div_conteudo"><!-- div onde será exibido o conteúdo-->
        <img id="loader" src="loader.gif" style="display:none;margin: 0 auto;">
    </div>
</div>
</center>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="js/bootstrap-datetimepicker.min.js"></script>
<script src="js/locales/bootstrap-datetimepicker.pt-BR.js"></script>
<script type="text/javascript">
    $(function () {
        // Configuração do seletor de data
        $("#datepicker").datepicker();

        // Configuração do seletor de hora
        $("#timepicker").timepicker({
            timeFormat: 'HH:mm',
            interval: 15,
            scrollbar: true
        });
    });
</script>
<style>
 body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-image: url(fundo1.jpg);
    background-repeat: no-repeat;
    background-size: cover;
    overflow: hidden;
    font-weight: bold

}

header {
    background-color: #27274B;
    color: #ffffff;
    padding: 20px;
}

h1 {
    margin: 20px;
    font-size: 36px;
    font-weight: bold
    
}

form {
    position: center;
    
    
    max-width: 800px;
    
    height: 600px;

    
      margin: 300px auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

label {
    display: block;
    margin-bottom: 10px;
    font-weight: bold;
}

input[type="text"], select {
    padding: 10px;
    width: 100%;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-bottom: 20px;
    box-sizing: border-box;
    font-size: 16px;
}

input[type="submit"] {
    background-color: #4BB16E;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
}

footer {
    background-color: #27274B;
    color: #ffffff;
    padding: 20px;
    text-align: center;
    font-size: 14px;
}

.impossivel {
    border: 1px solid;
}







.btn-success {
    background-color: #4169e1;
    color: #fff;
    font-size: 20px;
}

.btn-success:hover {
    background-color: #001f3f;
}

#div_conteudo {
    margin-top: 20px;
}

#loader {
    display: none;
    margin: 0 auto;
}


</style>
</body>
</html>
