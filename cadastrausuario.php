<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    include("conectadb.php");

    //verificar usuario existente
    $sql = "SELECT COUNT(usu_id) FROM usuarios WHERE usu_nome = '$nome' AND usu_senha = '$senha'";
    $resultado = mysqli_query($link, $sql);
    while ($tbl = mysqli_fetch_array($resultado)) {
        $cont = $tbl[0];
    }
    if ($cont == 1) {
        echo "<script>window.alert('USUARIO OU SENHA INCORRETOS');</script>";
    } else {
        $sql = "INSERT INTO usuarios (usu_nome,usu_senha)VALUES('$nome','$senha')";
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
    <link rel="stylesheet" href="./estilo.css">
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
                <input type="text" name="nome" id="nome" placeholder="nome">
                <p></p>
                <input type="password" name="senha" id="senha" placeholder="senha">
                <p></p>
                <input type="submit" name="cadastrar" value="CADASTRAR">
            </form>
        </div>
</body>

</html>