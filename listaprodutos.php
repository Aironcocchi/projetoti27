<?php
include("conectadb.php");
$sql = "SELECT * FROM produto";
$resultado = mysqli_query($link, $sql)
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="newestilo.css">
    <title>Lista produtos</title><!-- *produto* -->
</head>
<body>
    <div>
    <a href="homesistema.html"><input type="button" id="menuhome" value="HOME SISTEMA" ></a>
        <table border = "1">
            <tr>
            <th>Nome</th>
            <th>descricao</th>
            <th>Quantidade</th>
            <th>Preco</th>
            <th>Status</th>
            <th>alterar</th>
            </tr>
            <?php
            while($tbl = mysqli_fetch_array($resultado)){
                ?>
                <tr>
                    <td><?=$tbl[1]?></td>
                    <td><?=$tbl[2]?></td>
                    <td><?=$tbl[3]?></td>
                  <td>R$ <?= number_format($tbl[4],2,',','.')?></td><!--traz o valor apos 2 virgulas-->

                  <!-- <td><img src=""</td> -->
                  <td><?=$check=($tbl[5]=='s')?"SIM":"NAO"?></td> <!-- validando se o produto esta ativo -->
                    <td><a href="alterarproduto.php?id=<?=$tbl[0]?>"><input type="button" value="Alterar"></a></td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
</body>
</html>