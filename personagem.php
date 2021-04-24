<!DOCTYPE html>


<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
       <link rel="icon" href="icon.jfif">
       <link rel="stylesheet" href="CSS/personagens.css">
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <title>Mitgard_Heroes</title>
    </head>
    <body class="p-3 mb-2 bg-dark">
        <div class="p-3 mb-2 bg-danger" id="otpo">
<?php require_once 'Funcoes.php';
        $con = new Funcoes("localhost", 'mitgard', 'root','', 'utf8');
        $id = $_GET['id_personagem'];
        $dados = $con->BuscarPersonagemPorID($id);
        
        foreach ($dados as $v){
            ?><h2 ><?php echo $v['nome']; ?></h2><?php
            ?><h2 >Vida:<?php echo $v['vida']; ?></h2><?php
            ?><h2>Defesa:<?php echo $v['defesa']; ?></h2><?php
            ?><h2>Armadura:<?php echo $v['armadura']; ?></h2> </div> <div class="p-3 mb-2 bg-danger" id='parte-baixo'><?php
            ?><img src="imagens/<?php echo $v['banner'] ?>"> 
              <h3><?php echo $v['descricao']; ?></h3>
            <h4>Ataque Normal: <?php echo $v['hab1'] ?></h4>
            <h4>Especial: <?php echo $v['hab2'] ?></h4>
            <h4>Passiva 1: <?php echo $v['hab3'] ?></h4>
            <h4>Passiva 2: <?php echo $v['hab4'] ?></h4>
            <h4>Passiva 3: <?php echo $v['hab5'] ?></h4></div>
       <?php }
           ?> 
    </body>
</html>
