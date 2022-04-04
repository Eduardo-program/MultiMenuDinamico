<?php

// CHUMBADO USUARIO --------
$USUARIO = 'eduardo.garcia';
$ID_USER_SYS = '1';
$ID_USER_GROUP_SYS = '1';
// -------------------------

$con = mysqli_connect('localhost',
                    'root',
                    '',
                    'menu_');

if(mysqli_connect_errno())
{
	echo 'Erro ao conectar '.mysqli_connect_error();
}

?>