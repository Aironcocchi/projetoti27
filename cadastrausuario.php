<?php
 //coletas as variaveis do name do html e abre a conexao com banco de dados
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    //conexao com o banco de dados 
    include("conectadb.php");
    //verificar usuario existente
    //select count verifica se usuario esta existente
    $sql = "SELECT COUNT(usu_id) FROM usuarios WHERE usu_nome = '$nome' AND usu_senha = '$senha'";
    $resultado = mysqli_query($link, $sql);
    while ($tbl = mysqli_fetch_array($resultado)) {
        $cont = $tbl[0];
    }
   //verificacao visual se usuario existe ou nao 
    if ($cont == 1) {
        echo "<script>window.alert('USUARIO A CADASTRADO!!');</script>";
    } else {
        $sql = "INSERT INTO usuarios (usu_nome,usu_senha,usu_ativo)VALUES('$nome','$senha','n')";
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
    <link rel="stylesheet" href="newestilo.css">
    <title>CADASTRAR USUARIO</title>
</head>
<body>
    <a href="homesistema.html"><input type="button" id="menuhome" value="HOME SISTEMA" ></a>
        <div>
            <script>
                function mostrarsenha() {
                    var tipo = document.getElementByID("senha");
                    if (tipo == "password") {
                        tipo.type = "text";
                    } 
                    else 
                    {
                        tipo.type = "password";
                    }
                }
            </script>
            <form action="cadastrausuario.php" method="POST">
                <h1>CADASTRO DE USUARIOS</h1>
                <input type="text" name="nome" id="nome" placeholder="nome" required>
                <!-- required exige que o campo esteja preenchido -->
                <p></p>
                <input type="password" name="senha" id="senha" placeholder="senha">
                <p></p>
                <input type="submit" name="cadastrar" value="CADASTRAR">
            </form>
        </div>
</body>

</html>