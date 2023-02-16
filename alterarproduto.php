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