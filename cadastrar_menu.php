<!DOCTYPE html>
<html>
<?php include 'cabecalho.php';?>
<body>
<?php include 'menu.php';?>

<div class="container">
	<hr>
	<div class="row">
		<div class="col-md-6">
			<h4>Lista de Menus</h4>
			<hr>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>ID</th>
						<th>Descrição</th>
						<th>SubMenu</th>
					</tr>
				</thead>
				<tbody>

						<?php
						include 'conexao.php';
						$menulistqry="SELECT * FROM MENUS WHERE ATIVO = 'S'";
						$menulistres=mysqli_query($con,$menulistqry);
						while ($menudata=mysqli_fetch_assoc($menulistres)) {
						?>
						<tr>
							<td><?php echo $menudata['ID_MENU'];?></td>
							<td><?php echo $menudata['DESC'];?></td>
							<td><?php echo $menudata['ID_MENU_PAI'] == 0 ? "Menu Pai" : "SubMenu - ID: " . $menudata['ID_MENU_PAI'];?></td>
							</tr>
						<?php } ?>
					
				</tbody>
			</table>
		</div>

		<div class="col-md-6">
			<h4>Adicionar Nova Menu</h4>
			<hr>

			<form method="post" action="adicionar_menu.php">
				<div class="form-group">
					<input type="text" name="descricao" placeholder="Descrição do Menu" class="form-control" />
				</div>
				<div class="form-group">
				<select class="form-control" name="menu_id">
					<option value="">Selecionar Menu</option>
					<option value="0">Menu Pai</option>
					<?php
					$menulistqry="SELECT * FROM MENUS WHERE ATIVO = 'S'";
					$menulistres=mysqli_query($con,$menulistqry);
					while ($menudata=mysqli_fetch_assoc($menulistres)) {
					?>
					<option value="<?php echo $menudata['ID_MENU'];?>"><?php echo $menudata['DESC'];?></option>
				<?php } ?>
				</select>
				</div>
				<div class="form-group">
					<input type="text" name="icone" placeholder="Ícone do Menu" class="form-control" />
				</div>
				<div class="form-group">
					<input name="menu_submit" class="btn btn-primary" type="submit" value="Adicionar"/>
				</div>
			</form>
			
		</div>
	</div>
</div>
<?php include 'dependencias.php';?>
</body>
</html>