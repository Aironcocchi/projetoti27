    <?php
    #localiza pc com banco de dados do coputador
    $servidor = "localhost";
    #nome do banco 
    $banco = "projetoti27";
    #uusuario de acesso 
    $usuario = "admin";
    #senha do usuario
    $senha = "123";
    #link de acesso
    $link = mysqli_connect( $servidor, $usuario, $senha, $banco);
    ?>
