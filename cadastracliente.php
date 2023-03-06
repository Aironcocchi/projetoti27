<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $clinome = $POST['Nome'];
    $Clientesenha = $POST['Clientesenha'];
    $CPF = $POST['CPF'];
    $cidade = $POST['cidade'];
    $TELL = $POST['TELL'];
    $numcasa = $POST['numcasa'];
    $datanascimento = $POST['datanascimento'];
    $clienteativo = $POST['ativo'];
    $logradouro = $POST['logradouro'];

    include("conectadb.php");
    $sql = "SELECT COUNT(cli_id) FROM clientes WHERE cli_nome = 'clinome' AND $Clientesenha";
    $resultado = mysqli_query($link,$sql);
    while ($tbl = mysqli_fetch_array($resultado)) {
    $cont = $tbl[0];
}
if ($cont == 1) {
    echo "<script>window.alert('USUARIO A CADASTRADO!!');</script>";
} else {
    $sql = "INSERT INTO clientes (cli_id,cli_cpf,cli_nome,cli_datanasc,cli_telefone,cli_logradouro,cli_numero,cli_cidade,cli_ativo,cli_senha)VALUES($clinome,$Clientesenha,$CPF,$cidade,$TELL, $numcasa,$datanascimento,$clienteativo,$logradouro)";
    mysqli_query($link, $sql);
    header("location:listausuario.php");
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cadastrar Clientes</title>
    <link rel="stylesheet" href="newestilo.css">
</head>
<body>
<a href="homesistema.html"><input type="button" id="menuhome" value="HOME SISTEMA" ></a>
<div>
    <form action="cadastracliente.php" method="post">
        <label>NOME</label>
        <input type="text" name="Nome" required>
        <br><br>
        <label>CPF</label>
        <input type="number" name="CPF" required>
        <br><br>
        <label>SENHA DE ACESSO</label>
        <input type="password" name="Clientesenha" required>
        <br><br>
        <label>DATA DE NASCIMENTO</label>
        <input type="number" name="datanascimento" required>
        <br><br>
        <label>TELEFONE</label>
        <input type="password" name="TELL" required>
        <br><br>
        <label>LOGRADOURO</label>
        <input type="text" name="logradouro" required>
        <br><br>
        <label>NUMERO</label>
        <input type="number" name="numcasa" required>
        <br><br>
        <label>CIDADE</label>
        <input type="text" name="cidade" required>
        <br><br>
        <input type="submit" value="CADASTRAR">
    </form>
</div>
</body>
</html>