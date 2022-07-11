<?php
    mysqli_connect("lcpbq9az4jklobvq.cbetxkdyhwsb.us-east-1.rds.amazonaws.com",
    "rtecz2xfd4vlc1fm", "qy271l5uzj2a78qv", "vk14drj3tmp2hdan") or die(mysqli_error());
    echo "Connected to MySQL<br />";

    session_start();

    $nome = isset($_SERVER["Nome"]) ? " - " + $_SESSION["Nome"] : "";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo.css">
    
    <title>Finanças<?php echo $nome ?></title>
</head>
<body>
   
    <div id="principal">
        <div class="recepcao">
            <h2>SEJA BEM-VINDO</h2>
        </div>

    
        <div class="login">
            <h2>login</h2>
            <form class="formulario" method="POST" action="./scripts/login.php">
               <label for="text">digite seu email:</label>
               <input type="email" name="email" id="email" placeholder="email@exemplo.com"><br>
               <label for="password">digite sua senha:</label>
               <input type="password" name="password" id="password" placeholder="*********"><br>
             
               <input type="radio" name="lembrar-me" value="lembrar-me">
               <label for="lembrar-me">lembrar-me</label><br>
            <div class="botoes">
               <input type="submit" value="Entrar">
               <h3>Cadastre-se</h3>
               <a href="cadastrar.html"><input type="button" value="Cadastrar"></a>
            </div>
            
            </form>
           
        </div>
      
     </div>
</body>
</html>