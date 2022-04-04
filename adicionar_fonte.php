<?php
include 'conexao.php';

if(isset($_POST['submenu_submit']))
{
	$menu_id=$_POST['menu_id'];
	$submenu_name=$_POST['submenu_name'];
	$submenu_url=$_POST['submenu_url'];
	$status=$_POST['submenu_display'];

	if($submenu_name!='')
	{
		$insertqry="INSERT INTO `FONTES`( `ID_MENU`, `TITULO`, `FONTE`, `ATIVO`) VALUES ('$menu_id','$submenu_name','$submenu_url','$status')";
		$insertres=mysqli_query($con,$insertqry);

		$lastid=$con->insert_id;
	
	foreach ($_POST['department_id'] as $key => $value) {
		$department_id=$_POST['department_id'][$key];

		$verifica="SELECT COUNT(*) FROM MENU_GRUPO WHERE ID_GRUPO = '$department_id' AND ID_MENU = '$menu_id' AND ATIVO = 'S'";
		$verif=mysqli_query($con,$verifica);

		if($verif == '0'){
			$subdeptqry="INSERT INTO `MENU_GRUPO`( `ID_MENU`, `ID_GRUPO`, `ATIVO`) VALUES ('$menu_id','$department_id','$status')";
			$subdeptres=mysqli_query($con,$subdeptqry);
		}

		$menulistqry="SELECT ID_USUARIO FROM USUARIOS WHERE ID_GRUPO = '$department_id'";
		$menulistres=mysqli_query($con,$menulistqry);
		while ($id_usuario=mysqli_fetch_assoc($menulistres)) {
			$id_usuario = $id_usuario['ID_USUARIO'];

			$fonte = "INSERT INTO `FONTE_USUARIO`( `ID_FONTE`, `ID_USUARIO`, `PERMISSAO`) VALUES ('$lastid','$id_usuario','S')";
			$abcde=mysqli_query($con,$fonte);

			$verifica="SELECT COUNT(*) FROM MENU_USUARIO WHERE ID_USUARIO = '$id_usuario' AND ID_MENU = '$menu_id' AND ATIVO = 'S'";
			$verif=mysqli_query($con,$verifica);

			if($verif == '0'){
				$abc="INSERT INTO `MENU_USUARIO`( `ID_MENU`, `ID_USUARIO`, `ATIVO`) VALUES ('$menu_id','$id_usuario','S')";
				$abcd=mysqli_query($con,$abc);
			}
		}
	}
}
}
echo '<script>alert("Fonte Adicionado com sucesso.");
		window.location="cadastrar_fonte.php";
</script>';
?>