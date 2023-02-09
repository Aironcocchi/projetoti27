    <?php
    //CAPTURA DE VARIAVEIS UTILIZANDO O METODO POST
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $nome = $_POST['nome'];//captura variavel que esta no name="html"
        $password = $_POST['password'];//captura variavel que esta no name "password" html
        include("conectadb.php");//include que chama a conexao com o banco dados
        #consulta sql para verificar o usuario cadastrado 
        //instruçao de comunicaçao com o banco de dados 
        $sql = "SELECT COUNT(USU_id) FROM usuarios WHERE usu_nome = '$nome' AND usu_senha = '$password' AND usu_ativo='s'";
        //coleta o valor da consulta e cria um array para armazenar
        $resultado = mysqli_query($link,$sql);
        while($tbl = mysqli_fetch_array($resultado)){
            $cont = $tbl[0];//armazena o valor na coluna, no caso [0]
        }
        //verifica se o resultado do cont é 0 ou 1
        // verifica se a senha esta correta
        if($cont == 1){
            header("location: homesistema.html");//se usuario e senha corretos, va para o homesistema
        }
        else{
    echo"<script>window.alert('USUARIO OU SENHA INVALIDOS!');</SCRIPT>";//se incorreto apresenta o erro
        }
    }    
    ?>
    <!DOCTYPE html>
    <html lang="PT-BR">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>LOGIN USUARIOS</title>
        <link rel="stylesheet" href="../projetoti27/stylecadastra.css">
    </head>
    <body>
<div class = "container">
    <!-- script para digitar a senha  -->
    <script>
        function mostrarsenha(){
            var tipo = document.getElementByID("senha");
            if(tipo == "password"){
                tipo.type = "text";
            }
            else{
                tipo.type = "password";
            }
        }
    </script>
    <!-- fim do script -->
    <form action = "login.php" method = "POST">
        <h1>LOGIN DE USUARIO</h1>
        <input type = "text" name ="nome" id="nome" placeholder= "nome">
        <br>
        <input id="password" name="password" type = "password" placeholder = "senha">
        <!-- abaixo esta a funçao onclick chamando a funçao de javascript "mostrarsenha" -->
        <img id ="olinho" onclick="mostrarsenha()" src="assets/eye.svg">
        <br>
        <input type="submit" name="login" value="LOGIN">

</div>        
    </body>
    </html>