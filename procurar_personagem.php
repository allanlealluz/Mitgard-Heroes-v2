<?php
require_once 'Funcoes.php';
if(!isset($_GET['id'])){
$func = new Funcoes("localhost", 'mitgard', 'root','', 'utf8');
$retorno = $func->BuscarPersonagens();
$json = json_encode($retorno);
echo $json;
}
if(isset($_GET['id'])){
    $func = new Funcoes("localhost", 'mitgard', 'root','', 'utf8');
   $retorno2 = $func->BuscarPersonagemPorID($_GET['id']);
$json2 = json_encode($retorno2);
echo $json2; 
}
