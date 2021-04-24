<?php
session_start();
unset($_SESSION['id_user']);
unset($_SESSION['id_master']);
header('location:Entrar.php');
