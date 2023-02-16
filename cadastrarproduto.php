<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
// criacao de variaveis 
$pro_nome = $_POST['nomepro'];//esse campo mostra de onde vai puxar o valor da var
$pro_descricao = $_POST['descricao'];
$pro_quantidade = $_POST['quantidade'];
$pro_preco = $_POST['preco'];
include("conectadb.php");//conexao com o banco de dados
//verificando se os campo preenchidos sao existentes
$sql = "SELECT COUNT(pro_id) FROM produto WHERE  pro_nome = '$pro_nome'  AND pro_descricao = '$pro_descricao' AND
pro_quantidade = '$pro_quantidade' AND pro_preco = '$pro_preco'";
 $resultado = mysqli_query($link, $sql);//comando para fazer alteracoes o banco de dados
 while ($tbl = mysqli_fetch_array($resultado)) {
    $cont = $tbl[0];
}
if ($cont == 1) {
    echo "<script>window.alert('PRODUTO CADASTRADO!!');</script>";
} else {
    $sql = "INSERT INTO produto (pro_nome,pro_descricao,pro_quantidade,pro_preco)VALUES('$pro_nome','$pro_descricao','$pro_quantidade','$pro_preco')";
    mysqli_query($link, $sql);
    header("location:listaprodutos.php");
}
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Cadastra produto</title>
</head>
<body>
<div>
<a href="homesistema.html"><input type="button" id="menuhome" value="HOME SISTEMA" ></a>
    <form action="cadastrarproduto.php" method="POST">
    <h1>Cadastra produto</h1>
    <br><br>
    <input type="text" name="nomepro" id="pro_nome" placeholder="Nome do Produto" required>
    <br>
    <br>
    <input type="text" name="descricao" id="pro_descricao" placeholder="Descricao do produto" required>
    <br><br>
    <input type="text" name="quantidade" id="pro_quantidade" placeholder="Quantidade do produto" required>
    <br><br>
    <input type="text" name="preco" id="pro_preco" placeholder="Preco do produto" required>
    <br><br>
    <input type="submit" name="cadastrar" id="cadastrar" value="cadastrar">
    </div>
    </form>
    <style>
        hr{
            width: 180px;
            background-color: black;
            position: relative;
        }
    </style>
</body>
</html>