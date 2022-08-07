<?php



try {
    $pdo = new PDO('mysql:host=IP;dbname=cliente1','root','root');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }


// execução da query
$statement = $pdo->prepare("SELECT id_cliente, nome_razao, cpf_cnpj FROM cliente ORDER BY id_cliente");
$statement->execute();
$clients = $statement->fetchAll();

$table .= '<table class="table table-bordered">';

$table .= '<thead> 
            <tr>
                <th scope="col"> Código </th> 
                <th scope="col"> Nome</th> 
                <th scope="col"> CPF </th> 
            </tr>
            </thead>';
$table .= '<tbody>';
// laço de repetição para inclusão dos dados na tabela
foreach($clients as $client){
    //print_r($client[nome_razao]);
    $table .= '<tr>';
        $table .= "<td>$client[id_cliente]</td>";
        $table .= "<td>$client[nome_razao]</td>";
        $table .= "<td>$client[cpf_cnpj]</td>";
    $table .= '</tr>';
}

// fecahamento do html
$table .= '</tbody>';
$table .= '</table>';

// exibição na tela
//echo $table;
//################################################################################################################

try {
    $pdo = new PDO('mysql:host=IP;dbname=cliente2','root','root');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }


// execução da query
$statement = $pdo->prepare("SELECT id, nome, cpf_cnpj FROM sis_cliente ORDER BY id ASC");
$statement->execute();
$clients2 = $statement->fetchAll();

$table2 .= '<table class="table table-bordered">';

$table2 .= '<thead> 
            <tr>
                <th scope="col"> Código </th> 
                <th scope="col"> Nome</th> 
                <th scope="col"> CPF </th> 
            </tr>
            </thead>';
$table2 .= '<tbody>';
// laço de repetição para inclusão dos dados na tabela
foreach($clients2 as $client2){
    $table2 .= '<tr>';
        $table2 .= "<td>$client2[id]</td>";
        $table2 .= "<td>$client2[nome]</td>";
        $table2 .= "<td>$client2[cpf_cnpj]</td>";
    $table2 .= '</tr>';
}

// fecahamento do html
$table2 .= '</tbody>';
$table2 .= '</table>';

if ($client = $client2) {
    echo '<font color="green">'.$clients['id'];
}
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<div class= "container" style = "width: 100%; heigth: 100%;">
<div class="tabela" style="display: inline-block; width: 49%; heigth: 100%; color: blue;">
<p> Tabela1 </p>
<p> <?php echo $table ?> </p>
</div>

<div class="tabela" style= "display: inline-block; width: 49%; heigth: 100%; color: red;">
<p> Tabela2 </p>
<p> <?php echo $table2 ?> </p>
</div>
</div>