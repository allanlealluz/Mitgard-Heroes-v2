<?php
require_once 'Funcoes.php';
$func = new Funcoes("localhost", 'mitgard', 'root','', 'utf8');
$nome = $_GET['persona'];
$retorno = $func->BuscarPersonagensPorNome($nome);
$json = json_encode($retorno);
echo $json;