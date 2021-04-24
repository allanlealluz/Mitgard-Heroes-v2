<?php
session_start();
if(isset($_SESSION['id_user']) || isset($_SESSION['id_master'])){
   
}else{
     header('location:Entrar.php');
}
$id_personagem = $_GET['id_personagem'];

?>
<!DOCTYPE html>


<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="icon.jfif">
        <title>Mitgard_Heroes</title>
        <link rel="stylesheet" href="CSS/formularios.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    </head>
    <body>
        
        <form method="POST" class='p-3 mb-2 bg-danger'>
            <h2>Arena</h2>
            <input type="number" name="arena"  max="10" class="form-control">
            <h2>Mundo</h2>
            <input type="number" name="mundo" max="10" class="form-control">
             <h2>Chefe</h2>
             <input type="number" name="chefe" max="10" class="form-control">
             <input type="submit" class='btn btn-warning'>
        </form>
        
        <?php
         require_once 'Funcoes.php';
       $con = new Funcoes("localhost", 'mitgard', 'root','', 'utf8');
        if(isset($_POST['arena'])){
            $arena = htmlentities(addslashes($_POST['arena']));
            $mundo = htmlentities(addslashes($_POST['mundo']));
            $chefe = htmlentities(addslashes($_POST['chefe']));
            if(isset($_SESSION['id_user'])){
            $con->Votar($_SESSION['id_user'], $arena, $mundo, $chefe, $id_personagem);
            }elseif ($_SESSION['id_master']) {
            $con->Votar($_SESSION['id_master'], $arena, $mundo, $chefe, $id_personagem);
    }
            header('location:index.php');
        }
        ?>
    </body>
</html>
