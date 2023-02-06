<?php
//conexao com o banco de dados
include("conectadb.php");
//coleta de variaveis dos campos de texto HTML
//coleta de variaveis dos campos de texto html
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    $ativo = $_POST['ativo'];
    //instrucao de sql para atualizacao de usuario e senha 
    $sql = "UPDATE usuarios SET usu_senha = '$senha', usu_nome = '$nome', usu_ativo = '$ativo' WHERE usu_id = '$id'";
    mysqli_query($link, $sql);
    //direciona para a pagina listausuario
    header("location: listausuario.php");
    echo "<script>alert('USUARIO ALTERADO COM SUCESSO!!');</script>";
    exit();
}
#CAPTURAR ID VIA GET

//coletanto id via link(url) exemplo alterarusuario.php?id=2
$id = $_GET['id'];
$sql = "SELECT * FROM usuarios WHERE usu_id = $id";
$resultado = mysqli_query($link,$sql);
while ($tbl = mysqli_fetch_array($resultado)) {
    $nome = $tbl[1];
    $senha = $tbl[2];
    $ativo = $tbl[3];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>alternar usuarios</title>
    <link rel="stylesheet" href="estilo.css">
</head>        
<body>
    <div>
        <form action="alterarusuario.php" method="post">
        <input type="hidden" value="<?=$id?>" name="id" required>
        <label>NOME</label>
        <input type="text" name="nome" id="nome" value="<?=$nome?>" required> <!--coleta id e carrega a pagina de forma oculta -->
        <label>SENHA</label>
        <input type="password" name="senha" id= "senha" value="<?=$senha?>"required>
        <p></p>
        <label>status: <?=$check = ($ativo == 's')?"ATIVO":"INATIVO";?></label>
        <br>
        <input type="radio" name="ativo" value="s"> ATIVAR<br>
        <input type="radio" name="ativo" value="n"> DESATIVAR
        <input type="submit" value="SALVAR">
        </form>
    </div>
</body>
</html>