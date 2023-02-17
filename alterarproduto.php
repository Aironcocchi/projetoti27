<?php
include("conectadb.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   $id = $_POST['id'];
   $pro_nome = $_POST['pro_nome'];
   $pro_preco = $_POST['pro_preco'];
   $ativo = $_POST['ativo'];
    $sql = "UPDATE usuarios SET pro_nome = '$pro_nome', pro_preco = '$pro_preco', ativo = '$ativo' WHERE id = '$id'";
    mysqli_query($link, $sql);
    //direciona para a pagina listausuario
    header("location: listausuario.php");
    echo "<script>alert('USUARIO ALTERADO COM SUCESSO!!');</script>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Produto</title>
</head>
<body>
    <h1>Alterar Produto</h1>
</body>
</html>