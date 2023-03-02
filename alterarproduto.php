<?php
include("conectadb.php");
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $quantidade = $_POST['quantidade'];
    $preco = $_POST['preco'];
    $ativo = $_POST['ativo'];

    $sql = "UPDATE produto SET pro_nome = '$nome', pro_descricao = '$descricao', pro_quantidade = '$quantidade', pro_preco = '$preco', ativo = '$ativo' WHERE pro_id = $id";
    mysqli_query($link, $sql);

    header("Location: listaprodutos.php");
    echo"<script>window.alert('PRODUTO ALTERADO!');</script>";
}
$id = $_GET['id'];
$sql = "SELECT * FROM produto WHERE pro_id = '$id'";
$resultado = mysqli_query($link, $sql);
while($tbl = mysqli_fetch_array($resultado)){
    $nome = $tbl[1];
    $descricao = $tbl[2];
    $quantidade = $tbl[3];
    $preco = $tbl[4];
    $ativo = $tbl[5];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="newestilo.css">
    <title>ALTERAR PRODUTO</title>
</head>
<body>
    <div>
        <form action="alterarproduto.php" method="post">
            <input type="hidden" name="id" value="<?=$id?>">
            <label>NOME</label>
            <input type="text" name="nome", value="<?=$nome?>" required>
            <label>DESCRICAO</label>
            <input type="text" name="descricao", value="<?=$descricao?>" required>
            <label>QUANTIDADE</label>
            <input type="number" name="quantidade", value="<?=$quantidade?>" required>
            <label>PRECO</label>
            <input type="number" name="preco", value="<?=$preco?>" required>
            <br></br>
            <label>STATUS: <?=$check = ($ativo == 's')?"ATIVO":"INATIVO"?></label><br>
            <input type="radio" name="ativo" value="s" <?=$ativo == "s"?"checked":""?>>ATIVO<br>
            <input type="radio" name="ativo" value="n" <?=$ativo == "n"?"checked":""?>>INATIVO
            <input type="submit" value="SALVAR">
        </form>
    </div>
</body>
</html>