<!DOCTYPE html>


<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="icon.jfif">
       <link rel="stylesheet" href="CSS/formularios.css">
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <title>Mitgard_Heroes</title>
    </head>
    <body>
        <form method="POST" class='p-3 mb-2 bg-danger'>
            <h2>Cadastrar</h2>
            <input type="text" name="nome" class="form-control" placeholder="Nome">
            <input type="email" name="email" class="form-control" placeholder="Email">
            <input type="password" name="senha" minlength="8" class="form-control" placeholder="Senha">  
            <input type="submit" value="Cadastrar"  class='btn btn-warning'> 
        </form>
        <?php
        require_once 'Funcoes.php';
     $con = new Funcoes("localhost", 'mitgard', 'root','', 'utf8');
       if(isset($_POST['nome'])){
           $nome = htmlentities(addslashes($_POST['nome']));
           $email = htmlentities(addslashes($_POST['email']));
           $senha = htmlentities(addslashes($_POST['senha']));
           if(!empty($nome) && !empty($email) && !empty($senha)){
               $con->Cadastrar($nome, $email, $senha);
           }else{
               echo '<p>Preencha todos os Campos</p>';
           }
       }
        ?>
    </body>
</html>
