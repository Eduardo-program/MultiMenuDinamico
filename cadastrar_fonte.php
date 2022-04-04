<!DOCTYPE html>
<html>
<?php include 'cabecalho.php';?>
<body>
<?php include 'menu.php';?>
<?php include 'conexao.php';?>

<div class="container">
<hr>
<div class="row">
<div class="col-md-6">
<h4>Lista de Fontes Cadastrados</h4>
<hr>
<div class="table-responsive">
<table class="table table-bordered">
				<thead>
					<tr>
						<th>ID</th>
						<th>Menu</th>
						<th>Título</th>
						<th>Fonte</th>
					</tr>
				</thead>
				<tbody>
						<?php
						include 'conexao.php';
						$menulistqry="SELECT FONTES.*, MENUS.DESC FROM FONTES 
						INNER JOIN MENUS ON MENUS.ID_MENU = FONTES.ID_MENU 
						WHERE FONTES.ATIVO = 'S' ORDER BY MENUS.DESC";
						$menulistres=mysqli_query($con,$menulistqry);
						while ($menudata=mysqli_fetch_assoc($menulistres)) {
						?>
						<tr>
							<td><?php echo $menudata['ID_FONTE'];?></td>
							<td><?php echo $menudata['DESC'];?></td>
							<td><?php echo $menudata['TITULO'];?></td>
							<td><?php echo $menudata['FONTE'];?></td>
						</tr>
						<?php
						}
						?>
					
				</tbody>
			</table>
</div>
</div>

<div class="col-md-6">
<h4>Adicionar Fontes</h4>
<hr>
	<form method="post" action="adicionar_fonte.php">
	<div class="form-group">
		<select class="form-control" name="menu_id">
			<option value="">Selecionar Menu</option>
			<?php
			$menulistqry="SELECT * FROM MENUS WHERE ATIVO = 'S' ORDER BY ID_MENU, ID_MENU_PAI";
			$menulistres=mysqli_query($con,$menulistqry);
			while ($menudata=mysqli_fetch_assoc($menulistres)) {
			?>
			<option value="<?php echo $menudata['ID_MENU'];?>"><?php echo $menudata['DESC'];?></option>
		<?php } ?>
		</select>
	</div>

	<div class="form-group">
	<input type="text" name="submenu_name" placeholder="Título Fonte" class="form-control" />
	</div>

	<div class="form-group">
	<input type="text" name="submenu_url" placeholder="Fonte" class="form-control" />
	</div>

	<div class="form-group">
		<select class="form-control" name="submenu_display">
			<option value="">Selecione se está Ativo</option>
			<option value="S">Ativo</option>
			<option value="N">Desativado</option>
		</select>
	</div>

	<div class="form-group">
	<a>Grupos de Usuário:</a>
		<select class="form-control" name="department_id[]" multiple>
			<?php
			$deptlistqry="SELECT * FROM GRUPOS";
			$deptlistres=mysqli_query($con,$deptlistqry);
			while ($deptdata=mysqli_fetch_assoc($deptlistres)) {
			?>
			<option value="<?php echo $deptdata['ID_GRUPO'];?>"><?php echo $deptdata['DESC'];?></option>
		<?php } ?>
		</select>
	</div>
	
	<div class="form-group">
	<input name="submenu_submit" class="btn btn-primary" type="submit" value="Adicionar"/>
	</div>
	</form>
</div>
</div>
</div>
<?php include 'dependencias.php';?>
</body>
</html>