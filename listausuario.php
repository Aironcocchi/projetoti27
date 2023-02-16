    <?php
    //abre conexao com o banco de dados
    include("conectadb.php");
//passa a instruçao para o banco de dados
//funçao da instruçao: LISTAR TODOS OS CONTEUDOS DA TABELA usuarios
    $sql = "SELECT * FROM usuarios";
    $resultado = mysqli_query($link, $sql);
    ?>
    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lista Usuario</title>
    </head>
    <body>
        <link rel="stylesheet" href="estilo.css">
        <a href="homesistema.html"><input type="button" id="menuhome" value="HOME SISTEMA"></a>
        <div class="container">
            <!-- <input type="radio" name="listadesativados" value="n"</? $check = ($tbl[3] == "n")? "checked":""?>LISTA DESATIVADOS<br> -->
            <table  border="1">
                <tr>
                    <th>NOME</th>
                    <th>ALTERAR DADOS</th>
                    <!-- <th>EXCLUIR USUARIO</th> -->
                    <th>ATIVO</th>
                </tr>
                <?php
                while ($tbl = mysqli_fetch_array($resultado)) {
                ?>
                    <tr>
                        <td><?= $tbl[1] ?></td> <!-- traz somente o nome para apresentar na tabela  -->
                        <!-- ao clicar no boto ele ja trara o id do usuario para a pagina do alterar -->
                        <td><a href="alterarusuario.php?id=<?=$tbl[0]?>"><input type="button" value="ALTERAR"></a></td>
                        <!-- ao clicar no botao ele ja trara o id do usuario para a pagina do excluir -->
                       <!-- <td><a href="excluirusuario.php?id=</?=$tbl[0]?>"><input type="button" value="EXCLUIR"></a></td>  -->
                       <td><?=$check = ($tbl[3] == "s")?"SIM":"NAO"?></td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </body>

    </html>