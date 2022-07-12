<?php
session_start();

$nome = isset($_SERVER["Nome"]) ? " - " + $_SESSION["Nome"] : "";

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="libs/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css" />
    <!-- <link rel="stylesheet" href="css/estilo.css"> -->

    <title>Finanças<?php echo $nome ?></title>
</head>

<body>

    <h1 class="h3 mb-3 fw-normal position-absolute top-0 start-50 translate-middle-x">Sistema Financeiro</h1>
    <form class="formulario" method="POST" action="./scripts/login.php">
    <div class="card position-absolute top-50 start-50 translate-middle" style="width: 500px;">
        <img src="img/fundo_login.jpg" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Login</h5>
        </div>
        <div class="card-body">
            <div class="input-group mb-3">
                <span class="input-group-text" id="user">@</span>
                <input type="text" class="form-control" id="email" name="email" placeholder="E-mail" aria-label="Username" aria-describedby="user">
                <span class="input-group-text" id="pass">*</span>
                <input type="password" class="form-control" id="password" name="password" placeholder="Senha" aria-label="Password" aria-describedby="pass">
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Entrar</button>
            <p class="text-center">Não tem cadastro? <a  href="cadastrar.html">Clique aqui.</a></p>
        </div>
    </div>
    </form>

    <!-- <div id="principal">
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

    </div> -->
</body>

</html>