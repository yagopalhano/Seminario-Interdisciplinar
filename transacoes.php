<?php
session_start();
$nome = $_SESSION["Nome"];
$id = $_SESSION["Id"];
$db = require_once("./scripts/dbConnection.php");
$serverHost = $_SERVER["HTTP_HOST"];
$query = "SELECT (Select SUM(Valor) from Transacoes WHERE Tipo_Transacao = 1) as Entradas, (Select SUM(Valor) from Transacoes WHERE Tipo_Transacao = 2) as Saidas, 
t.Id,
t.Descricao,
t.Data,
t.Valor,
tt.Descricao as Tipo
FROM 
Transacoes t
LEFT JOIN Tipo_Transacao tt on(tt.Id = t.Tipo_Transacao)
WHERE Id_Usuario = $id
AND Exibe = 1;";
$queryEntrada = "Select SUM(Valor) from Transacoes WHERE tipo_transacao = 1 AND Id_Usuario = $id"
$querySaida = "Select SUM(Valor) from Transacoes WHERE tipo_transacao = 2 AND Id_Usuario = $id"

$transacoes = mysqli_fetch_all($db->query($query), 1);
$entrada = mysqli_fetch_all($db->query($queryEntrada), 1);
$saida = mysqli_fetch_all($db->query($querySaida), 1);


?>

<!DOCTYPE html>
<html lang="ptbr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transações de <?php echo $nome ?> </title>

    <link rel="stylesheet" href="./libs/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css" />

    <script>
        async function teste(id) {
            var myInit = {
                method: "POST",
                body: JSON.stringify({
                    Id: id
                })
            }

            fetch("./scripts/excluitransacao.php", myInit)
                .then(res => {
                    if (res.status === 200) {             
                        document.location = "https://seminario-interdisciplinar.herokuapp.com/"                        
                    }
                })
                .catch(rej => console.log(rej));

        }
    </script>
</head>



<body>
<nav class="navbar navbar-expand-lg navbar-dark  bg-dark" aria-label="Eighth navbar example">
    <div class="container">
      <a class="navbar-brand" href="#">Sistema Financeiro</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      
        <div class="navbar-nav ml-auto">
			<div class="nav-item dropdown show">
				<a href="#" data-toggle="dropdown" class="nav-link  user-action" aria-expanded="true"><img src="./img/user.png" class="text-light" height="30px" alt="Avatar"> <?php echo $nome ?></a>				
			</div>
		</div>
        
        
      </div>
    </div>
  </nav>
    <div class="container">

        <header>
            <h1 class="text-center">Fluxo de Caixa</h1>
        </header>
        <form method="POST" action="./scripts/novatransacao.php">
        <div class="card" style="width: 100%; margin-bottom:8px ;">
        <div class="card-body">
            <h5 class="card-title">Insira uma nova transação</h5>
            <p class="card-text">
            <div class="row">
                <div class="col">
                    <input class="form-control" required id="descricao" name="descricao" type="text" placeholder="Descrição da transação">
                </div>
                <div class="col">

                    <div class="input-group">
                        <span class="input-group-text">R$</span>
                        <input class="form-control" required id="valor" name="valor" type="number" step="0.01" placeholder="Valor da transação">
                    </div>

                </div>
                <div class="col">
                    <select class="form-select" name="tipo" id="tipo" required>
                        <option value="1">Entrada</option>
                        <option value="2">Saída</option>
                    </select>
                </div>
                <div class="col">
                        <button class="btn btn-link p-0" type="submit"><i role="img" style="font-size: 25px" class="bi bi-plus-square-fill text-success"></i></i></button>

                    </div>
                <input type="number" value=<?php echo $id ?> name="id" id="id" hidden="TRUE" />
            </div>
            </p>
        </div>
        </div>
        </form>

        

        <?php
        if (!$transacoes) {
            echo "
        <p>
        Nenhuma Transação cadastrada!
        </p>";
        } else {
            echo "

            <div class='card' style='width: 100%;'>
        <div class='card-body'>
            <h5 class='card-title'>Resumo de transações </h5>
            <h6 class='card-subtitle mb-2 text-muted'>Card subtitle</h6>
            <p class='card-text'>

            


        <table class='table  table-striped'>
            <thead>
                <tr>
                    <td>Id</id>
                    <td>Descrição</td>
                    <td>Valor</td>
                    <td>Data</td>
                    <td>Tipo</td>
                    <td>Deletar</td>
                </tr>
            </thead>
            <tbody>";
            foreach ($transacoes as $transacao) {
                echo "
                        <tr>
                        <th scrope='row'>$transacao[Id]</th>
                        <td>$transacao[Descricao]</td>
                        <td>R$$transacao[Valor]</td>
                        <td>$transacao[Data]</td>
                        <td>$transacao[Tipo]</td>
                        <td><input type='button' class='btn btn-danger' value='Excluir' onclick='teste($transacao[Id])'/></td>
                        </tr>
                        ";
            }

            echo "</tbody>";
            $saldo = floatval($entrada['valor'] - $saida['valor']);
            echo
            "<tfooter>
                    <tr>
                    <td>Saldo:</td>
                    <td>R$ $saldo</td>
                    <td>ID: $id</td>
                    </tr>
                    </tfooter>
                    </p>
                </div>
                </div>
                    
                    ";
        }
        ?>


        </table>

    </div>
    <script src="./libs/bootstrap/js/bootstrap.min.js"></script>
    
</body>

</html>