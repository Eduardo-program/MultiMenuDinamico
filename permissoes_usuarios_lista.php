<!DOCTYPE html>
<html>
<?php include 'cabecalho.php';
include 'conexao.php';

$user_id = $_POST['user_id'];

?>
<body>
<?php include 'menu.php';?>

<div class="container">
	<hr>
<div class="row">
<div class="col-md-12">
<h4>User Regras</h4>
<hr>
<form method="post" action="altera_permissoes.php">
<input type="hidden" name="user_id" value="<?php echo $user_id;?>">
<table class="table">
<thead>
<tr>
<th>Fonte</th>
<th>Permissão</th>
</tr>
</thead>
<tbody>
<?php

$menuqry="SELECT FONTES.TITULO AS FONTE_DESC, FONTE_USUARIO.ID_ AS ID__FONTE, FONTE_USUARIO.PERMISSAO AS PERMISSAO
		FROM FONTE_USUARIO
		INNER JOIN FONTES ON FONTES.ID_FONTE = FONTE_USUARIO.ID_FONTE 
		WHERE FONTE_USUARIO.ID_USUARIO = '$user_id'";


$menures=mysqli_query($con,$menuqry);
while ($menudata=mysqli_fetch_assoc($menures)) {
?>

<input type="hidden" name="submenu_id[]" value="<?php echo $submenuid=$menudata['ID__FONTE'];?>">
<tr>
	<td><?php echo $menudata['FONTE_DESC'];?></td>
	<td>
		<select name="user_permission[]" class="form-control">
			<option value="<?php echo $menudata['PERMISSAO'];?>"><?php echo $menudata['PERMISSAO'] == 'S' ? "Liberado" : "Bloqueado";?></option>
			<?php if($menudata['PERMISSAO'] == 'S'){ ?>
			<option value="N">Bloquear</option>
			<?php }else{ ?>
			<option value="S">Liberar</option>
			<?php } ?>
		</select>
	</td>
</tr>
<?php
}
?>
</tbody>
</table>
<input type="submit" name="permissionsubmit" class="btn btn-primary" value="Alterar Permissões">
</form>
</div>
</div>
</div>
<?php include 'dependencias.php';?>
</body>
</html>