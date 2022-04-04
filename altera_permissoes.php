<?php
include 'conexao.php';

if(isset($_POST['permissionsubmit']))
{
$user_id=$_POST['user_id'];
	if($user_id!='')
	{
		
		foreach ($_POST['user_permission'] as $key => $value) {
			$user_permission = $_POST['user_permission'][$key];
			$submenu_id = $_POST['submenu_id'][$key];

			$insertqry = "UPDATE `FONTE_USUARIO` SET PERMISSAO = '$user_permission' 
			WHERE ID_USUARIO = '$user_id'
			AND ID_ = '$submenu_id'";
			
			$insertres=mysqli_query($con,$insertqry);
		}
	}
}
echo '<script>alert("Permissões Alteradas com Sucesso.");
		window.location="index.php";
</script>';
?>