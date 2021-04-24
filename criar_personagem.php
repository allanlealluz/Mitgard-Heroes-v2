<!DOCTYPE html>


<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="icon.jfif">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <title>Mitgard_Heroes</title>
        <link rel="stylesheet" href="CSS/criar.css">
    </head>
    <body>
        
        <form method="POST" enctype="multipart/form-data" class='p-3 mb-2 bg-danger'>
            <h1>Criador de Personagens</h1>
            <h2>Nome</h2> 
            <input type="text" name="nome" class="form-control"> 
            <h2>Descrição</h2>
            <textarea name="descricao" class="form-control"></textarea>
            <h2>Habilidade 1</h2>
            <input type="text" name="hab1" class="form-control"> 
            <h2>Habilidade 2</h2>
            <input type="text" name="hab2" class="form-control"> 
            <h2>Habilidade 3</h2>
            <input type="text" name="hab3" class="form-control"> 
             <h2>Habilidade 4</h2>
            <input type="text" name="hab4" class="form-control">
             <h2>Habilidade 5</h2>
            <input type="text" name="hab5" class="form-control">
            <h2>Vida</h2>
            <input type="text" name="vida" class="form-control"> 
            <h2>Defesa</h2>
            <input type="text" name="defesa" class="form-control"> 
            <h2>Armadura</h2> 
            <input type="text" name="armadura" class="form-control"> 
            <h2>Foto</h2>
            <input type="file" name="foto" class="form-control"> 
            <h2>Banner</h2>
            <input type="file" name="banner" class="form-control">
            <input type="submit" class='btn btn-warning' > 
        </form>
        <?php
     
       
        if(isset($_POST['nome'])){
            
            $nome = htmlentities(addslashes($_POST['nome']));
            $descricao = htmlentities(addslashes($_POST['descricao']));
            $hab1 = htmlentities(addslashes($_POST['hab1'])); 
            $hab2 = htmlentities(addslashes($_POST['hab2'])); 
            $hab3 = htmlentities(addslashes($_POST['hab3'])); 
            $hab4 = htmlentities(addslashes($_POST['hab4'])); 
            $hab5 = htmlentities(addslashes($_POST['hab5'])); 
            $vida = htmlentities(addslashes($_POST['vida'])); 
            $defesa = htmlentities(addslashes($_POST['defesa'])); 
            $armadura = htmlentities(addslashes($_POST['armadura'])); 
            if(isset($_FILES['foto'])){
                $nome_arquivo = rand(1,999).$_FILES['foto']['name'];
                move_uploaded_file($_FILES['foto']['tmp_name'], "imagens/".$nome_arquivo);             
               }
               if(isset($_FILES['banner'])){
                 $nome_banner = rand(1,999).$_FILES['banner']['name'];
                move_uploaded_file($_FILES['banner']['tmp_name'], "imagens/".$nome_banner);             
               }  
               if(!empty($_FILES['foto']) || !empty($_FILES['banner'])){
                    require_once 'Funcoes.php';
        $con = new Funcoes("localhost", 'mitgard', 'root','', 'utf8');
        $con->InserirPersonagem($nome, $descricao, $hab1, $hab2, $hab3, $hab4, $hab5,$vida,$defesa,$armadura, $nome_arquivo, $nome_banner);
        header('location:index.php');
            }
        }
        ?>
    </body>
</html>
