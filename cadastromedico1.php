<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cadastro</title>
 

    <style>

body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url(fundo1.jpg);
            background-repeat: no-repeat;
            background-size: cover;
        
        }

       

        form {

            max-width: 400px;

            width: 100%;

            padding: 30px;

            background-color: #ffffff;

            border-radius: 8px;

            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);

            box-sizing: border-box;
            
            position: center; 

            text-align: center;
        }

        input {

            width: calc(100% - 16px);

            padding: 10px;

            margin-bottom: 20px;

            box-sizing: border-box;

            border: 1px solid #ccc;

            border-radius: 4px;

        }

        button {

            background-color: #1565c0;

            color: #fff;

            padding: 10px 15px;

            border: none;

            border-radius: 4px;

            cursor: pointer;

            transition: background-color 0.3s;

        }

        button:hover {

            background-color: #003c8f;

        }

        p {

            margin-top: 10px;

        }

        p.error {

            color: red;

        }

        p.success {

            color: green;

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

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$obj_mysqli = new mysqli("127.0.0.1", "phpmyadmin", "aluno", "Medicos");

if ($obj_mysqli->connect_errno) {
echo "Ocorreu um erro na conexão com o banco de dados.";
exit;
}

mysqli_set_charset($obj_mysqli, 'utf8');

$erro = $sucesso = "";


// Validando a existência dos dados
if (isset($_POST["nome"]) && isset($_POST["email"]) && isset($_POST["senha"])) {
if (empty($_POST["nome"])) {
$erro = "Campo nome obrigatório";
} elseif (empty($_POST["email"])) {
$erro = "Campo e-mail obrigatório";
} elseif (empty($_POST["senha"])) {
$erro = "Campo senha obrigatório";
} else {
// Vamos realizar o cadastro ou alteração dos dados enviados.
$nome = $_POST["nome"];
$email = $_POST["email"];
$senha = $_POST["senha"];

$stmt = $obj_mysqli->prepare("INSERT INTO `Cliente` (`Nome`,`Email`,`Senha`) VALUES (?,?,?)");
$stmt->bind_param('sss', $nome, $email, $senha);

if (!$stmt->execute()) {
$erro = "Erro no SQL: " . $stmt->error;
} else {
$sucesso = "Dados cadastrados com sucesso!";
header("Location: tela_inicial.php");
}
}
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Cadastro</title>
</head>
<body>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<center><form action="<?=$_SERVER["PHP_SELF"]?>" method="POST">
<center><h2>Cadastro</h2></center>
<br>
Nome:<br/>
<input type="text" name="nome" placeholder="Qual seu nome?"><br/><br/>
E-mail:<br/>
<input type="email" name="email" placeholder="Qual seu e-mail?"><br/><br/>
Senha:<br/>
<input type="password" name="senha" placeholder="Qual sua senha?"><br/><br/>

<?php if(isset($erro)) { echo "<p style='color:red'>$erro</p>"; } ?>
<?php if(isset($sucesso)) { echo "<p style='color:green'>$sucesso</p>"; } ?>


<input type="hidden" value="-1" name="id">
<button type="submit" >Cadastrar</button>
<a href="logout.php" class="button" >Sair</a>
</form></center>

</body>

<script>


</script>
</html>