<?php
include 'conexao.php';

if(isset($_POST['menu_submit']))
{
	$descricao = $_POST['descricao'];
	$icone = $_POST['icone'];
	$menu_pai = $_POST['menu_id'];
	$status = 'S';

	if( $descricao != '' )
	{
		$requisicao = "SELECT ORDEM AS ORDEM FROM MENUS WHERE ID_MENU = '$menu_pai'";
		$result = mysqli_query($con,$requisicao);

		$insertqry="INSERT INTO `MENUS`( `ID_MENU_PAI`, `DESC`, `ICONE`, `ATIVO`, `ORDEM`) VALUES ('$menu_pai','$descricao','$icone','$status','$ordem')";
		$insertres = mysqli_query($con,$insertqry);
		
	}
}
// echo '<script>alert(" Menu Criado com Sucesso. ");
// 		window.location="cadastrar_menu.php";
// </script>';
?>