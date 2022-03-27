<?php
session_start();

require_once 'Funcoes.php';
$con = new Funcoes("localhost", 'mitgard', 'root','', 'utf8');
$dados = $con->BuscarPersonagens();
?>
<!DOCTYPE html>


<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=0.5">
        <link rel="icon" href="icon.jfif">
        <title>Mitgard_Heroes</title>
        <link rel="stylesheet" href="CSS/index.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    </head>
    <body>    
    <div id="topo-pagina">
        <form method="POST">
            <h6 id="buscar">Buscar</h6>
            <input type="text" name="buscar" id="buscar"> 

        </form>
        <a href="Cadastrar.php">Cadastre-se</a>
        <?php if (isset($_SESSION['id_user']) || isset($_SESSION['id_master'])) { ?>
            <a href="sair.php">Sair</a>
        <?php } else {
            ?> <a href="Entrar.php">Logar</a><?php }
        ?> 

        <?php if (isset($_SESSION['id_master'])) {
            ?> <a href="criar_personagem.php">Criar</a> <?php
        } else {
            
        }
        
        ?>
            <a href="Auxiliar_de_batalha.php">Auxiliar de Batalha</a>
            <a href="teste_sugestao_instatenea.php">Teste sugestão</a>
    </div>
        
    <a href="index.php?buscar_melhores"><span><i class="fab fa-ethereum red"></i></span></a>

    <?php if (isset($_GET['buscar_melhores']) && !isset($_POST['buscar'])) {
        ?><a href="index.php"><span><i class="fas fa-arrow-left"></i></span></a> <?php ?>

        
        <table class="table table-striped ">
            <thead class="thead-dark">
            <tr id="topo">
                 <th scope="col"></th>
                    <th scope="col">Nome</th>
                    <th scope="col">PVP</th>
                    <th scope="col">Mundo</th>
                    <th scope="col">Chefe</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
            </tr> </thead> <?php
            $ava = $con->BuscarPersonagensPorAvaliacao();
            foreach ($ava as $v) {
                ?> <tr>
                    <td id="s"><img src="imagens/<?php echo $v['nome_imagem'] ?>" id="imagem"></td>
                    <td><?php echo $v['nome'] ?></td><?php
                ?><td maxlength="2"><?php
                        $p = substr($v['avaliacao'], 0, 4);
                        echo $p;
                        ?></td>
                    <td><?php
                        $s = substr($v['mun'], 0, 4);
                        echo $s;
                        ?></td>
                    <td><?php
                        $t = substr($v['che'], 0, 4);
                        echo $t;
                        ?></td> 
                    <td><a href="votar.php?id_personagem=<?php echo $v['id']; ?>">Votar</a></td>
                    <td><a href="personagem.php?id_personagem=<?php echo $v['id']; ?>">Ver</a></td></tr> <?php }
                    ?> </table>  <?php
    } else {
        if (isset($_POST['buscar']) && isset($_GET['buscar_melhores'])) {
            ?><a href="index.php"><span><i class="fas fa-arrow-left"></i></span></a> <?php
                $buscar = addslashes(ucwords($_POST['buscar']));
                $dao = $con->BuscarPersonagensPorNome($buscar);
                if (empty($dao) || $con->BuscarPersonagensPorNome($buscar) == false) {
                    echo "<h5>Não foi possivel encontrar</h5>";
                }
                ?><table class="table table-striped">
                <tr id="topo" onmouseenter="mudar()" onmouseout="voltar()">
                    <thead class="thead-dark">
                    <th scope="col"></th>
                    <th scope="col">Nome</th>
                    <th scope="col">PVP</th>
                    <th scope="col">Mundo</th>
                    <th scope="col">Chefe</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
            </tr> </thead><?php
                foreach ($dao as $v) {
                    ?> <tr>
                        <td id="s"><img src="imagens/<?php echo $v['nome_imagem'] ?>" id="imagem"></td>
                        <td><?php echo $v['nome'] ?></td><?php ?><td maxlength="2"><?php
                            $p = substr($v['avaliacao'], 0, 4);
                            echo $p;
                            ?></td>
                        <td><?php
                            $s = substr($v['mun'], 0, 4);
                            echo $s;
                            ?></td>
                        <td><?php
                            $t = substr($v['che'], 0, 4);
                            echo $t;
                            ?></td> 
                        <td><a href="votar.php?id_personagem=<?php echo $v['id']; ?>">Votar</a></td>
                        <td><a href="personagem.php?id_personagem=<?php echo $v['id']; ?>">Ver</a></td></tr> <?php
                }
            }
            ?> </table>  <?php
        }


        if (isset($_POST['buscar']) && !isset($_GET['buscar_melhores'])) {
            ?><a href="index.php"><i class="fas fa-arrow-left"></i></a> <?php
            $buscar = addslashes(ucwords($_POST['buscar']));
            $dado = $con->BuscarPersonagensPorNome($buscar);
            if (empty($dado) || $con->BuscarPersonagensPorNome($buscar) == false) {
                echo "<h5>Não foi possivel encontrar</h5>";
            }else{
            ?><table class="table table-striped">
                <thead class="thead-dark">
            <tr id="topo" onmouseenter="mudar()" onmouseout="voltar()">
                <th scope="col"></th>
                    <th scope="col">Nome</th>
                    <th scope="col">PVP</th>
                    <th scope="col">Mundo</th>
                    <th scope="col">Chefe</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
            </tr> </thead><?php
            foreach ($dado as $v) {
                ?> <tr>
                    <td id="s"><img src="imagens/<?php echo $v['nome_imagem'] ?> " id="imagem"></td>
                    <td><?php echo $v['nome'] ?></td><?php ?><td maxlength="2"><?php
                        $p = substr($v['avaliacao'], 0, 4);
                        echo $p;
                        ?></td>
                    <td><?php
                        $s = substr($v['mun'], 0, 4);
                        echo $s;
                        ?></td>
                    <td><?php
                        $t = substr($v['che'], 0, 4);
                        echo $t;
                        ?></td> 
                    <td><a href="votar.php?id_personagem=<?php echo $v['id']; ?>">Votar</a></td>
                    <td><a href="personagem.php?id_personagem=<?php echo $v['id']; ?>">Ver</a></td> <?php }
            ?> </table> <?php } } elseif (!isset($_GET['buscar_melhores'])) { ?>
    

  
        
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>        
                    <th scope="col"></th>
                    <th scope="col">Nome</th>
                    <th scope="col">PVP</th>
                    <th scope="col">Mundo</th>
                    <th scope="col">Chefe</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>


                <tr>
                    <?php
                    foreach ($dados as $v) {
                        ?><tr>
                        <td id="s"><img src="imagens/<?php echo $v['nome_imagem'] ?>" id="imagem"></td>
                        <td><?php echo $v['nome'] ?></td><?php ?><td maxlength="2"><?php
                            $p = substr($v['avaliacao'], 0, 4);
                            echo $p;
                            ?></td>
                        <td><?php
                            $s = substr($v['mun'], 0, 4);
                            echo $s;
                            ?></td>
                        <td><?php
                            $t = substr($v['che'], 0, 4);
                            echo $t;
                            ?></td> 
                        <td><a href="votar.php?id_personagem=<?php echo $v['id']; ?>">Votar</a></td>
                        <td><a href="personagem.php?id_personagem=<?php echo $v['id']; ?>">Ver</a></td></tr> 
                <?php } ?>
                </th>
            </tbody>
        </table>
        <script>
            function mudar() {
                var tr = document.getElementById('topo');
                tr.style.background = 'red';
            }
            function voltar() {
                var tr = document.getElementById('topo');
                tr.style.background = 'gray !important';
            }
           
           
           
var imagem = document.getElementsByTagName('img');
 console.log(imagem)
if(imagem.width > 100){
    alert(`Ìmagem errada`)
}
            
    </script>
        <?php
    }
    ?>
</body>
</html>
