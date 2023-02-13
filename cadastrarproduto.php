<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
// criacao de variaveis 
$nomeprodt = $_POST['nomepro'];//esse campo mostra de onde vai puxar o valor da var
$idpro = $_POST['idpro'];
$descricao = $_POST['descricao'];
$quantid = $_POST['quantidade'];
$preco = $_POST['preco'];
include("conectadb.php");//conexao com o banco de dados
//verificando se os campo preenchidos sao existentes
$sql = "SELECT COUNT(idpro) FROM produto WHERE nomepro = '$nomeprodt' AND idpro = 'idpro' AND descricao = 'descricao' AND
quantidade = '$quantid' AND preco = '$preco'";
 $resultado = mysqli_query($link, $sql);//comando para fazer alteracoes o banco de dados
 while ($tbl = mysqli_fetch_array($resultado)) {
    $cont = $tbl[0];
}
if ($cont == 1) {
    echo "<script>window.alert('PRODUTO CADASTRADO!!');</script>";
} else {
    $sql = "INSERT INTO usuarios (nomepro,idpro,descricao,quantidade,preco,)VALUES('$nomeprodt','$idpro','$descricao','$quantid','$preco')";
    mysqli_query($link, $sql);
    header("location:listausuario.php");
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
    <form>
    <h1>Cadastra produto</h1>
    <a href="homesistema.html"><input type="button" id="menuhome" value="HOME SISTEMA" ></a>
    <br><br>
    <input type="text" name="nomepro" id="nomepro" placeholder="Nome do Produto" required>
    <br>
    <br>
    <input type="text" name="descricao" id="descricao" placeholder="Descricao do produto" required>
    <br><br>
    <input type="text" name="quantidade" id="quantidade" placeholder="Quantidade do produto" required>
    <br><br>
    <input type="text" name="preco" id="preco" placeholder="Preco do produto" required>
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