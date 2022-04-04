<!DOCTYPE html>
<html>
<?php include 'cabecalho.php';?>
<body>
<?php include 'menu.php';?>

<div class="container">
	<hr>
	<div class="row">
		<div class="col-md-12">
			<h4>Permissões de Usuários</h4>
			<hr>
			<form method="post" action="permissoes_usuarios_lista.php">
				<div class="form-group">
					<label>Selecione o Usuário</label>
					<select class="form-control" name="user_id" required>
						<option value="">Selecione</option>
						<?php
						include 'conexao.php';
						$userlistqry="SELECT * FROM USUARIOS";
						$userlistres=mysqli_query($con,$userlistqry);
						while ($userdata=mysqli_fetch_assoc($userlistres)) {
						?>
						<option value="<?php echo $userdata['ID_USUARIO'];?>"><?php echo $userdata['USUARIO'];?></option>
					<?php } ?>
					</select>
				</div>
				<div class="form-group">
					<input type="submit" name="permission_update" class="btn btn-primary">
				</div>
			</form>
		</div>
	</div>
</div>

<?php include 'dependencias.php';?>
</body>
</html>