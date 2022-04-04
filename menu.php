<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<title>Menu Dinâmico MultiLevel</title>

<script type="text/javascript">
/// some script

// jquery ready start
$(document).ready(function() {
	// jQuery code

	//////////////////////// Prevent closing from click inside dropdown
    $(document).on('click', '.dropdown-menu', function (e) {
      e.stopPropagation();
    });

    // make it as accordion for smaller screens
    if ($(window).width() < 992) {
	  	$('.dropdown-menu a').click(function(e){
	  		e.preventDefault();
	        if($(this).next('.submenu').length){
	        	$(this).next('.submenu').toggle();
	        }
	        $('.dropdown').on('hide.bs.dropdown', function () {
			   $(this).find('.submenu').hide();
			})
	  	});
	}
	
}); // jquery end
</script>

<style type="text/css">
	@media (min-width: 992px){
		.dropdown-menu .dropdown-toggle:after{
			border-top: .3em solid transparent;
		    border-right: 0;
		    border-bottom: .3em solid transparent;
		    border-left: .3em solid;
		}

		.dropdown-menu .dropdown-menu{
			margin-left:0; margin-right: 0;
		}

		.dropdown-menu li{
			position: relative;
		}
		.nav-item .submenu{ 
			display: none;
			position: absolute;
			left:100%; top:-7px;
		}
		.nav-item .submenu-left{ 
			right:100%; left:auto;
		}

		.dropdown-menu > li:hover{ background-color: #f1f1f1 }
		.dropdown-menu > li:hover > .submenu{
			display: block;
		}
	}
</style>
</head>

<body class="bg-light">

<!-- ========================= SECTION CONTENT ========================= -->

<div class="container">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">

  <a class="navbar-brand" href="index.php">Menu Dinâmico</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="main_nav">

<ul class="navbar-nav">
	<li class="nav-item active"> <a class="nav-link" href="index.php">Home </a> </li>
	<li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">  Configurações  </a>
	    <ul class="dropdown-menu">
		  <li><a class="dropdown-item" href="cadastrar_menu.php"> Adicionar Menu </a></li>
		  <li><a class="dropdown-item" href="cadastrar_fonte.php"> Adicionar Fonte </a>
		  <li><a class="dropdown-item" href="permissoes_usuarios.php"> Permissões </a></li>
	    </ul>
	</li>

	<?php
	require "conexao.php";

	$query = " SELECT MENUS.* FROM MENUS 
	INNER JOIN MENU_GRUPO ON MENU_GRUPO.ID_MENU = MENUS.ID_MENU
	WHERE MENUS.ID_MENU_PAI = 0 
	AND MENUS.ATIVO = 'S'
	AND MENU_GRUPO.ID_GRUPO = '$ID_USER_GROUP_SYS'";

	$resultado = mysqli_query($con,$query);

	while($menudata = mysqli_fetch_assoc($resultado)){
		$desc_pai = $menudata['DESC'];
		$icone_pai = $menudata['ICONE'];
		$menu_pai = $menudata['ID_MENU'];

		?>
	<li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"> <?php echo $desc_pai ?> </a>
	    <ul class="dropdown-menu">
			<?php
				$queryy = " SELECT * FROM MENUS 
				WHERE ID_MENU_PAI = '$menu_pai' 
				AND ATIVO = 'S'";
			
				$resultadoo = mysqli_query($con,$queryy);

				if($resultadoo){
					while($menudataa = mysqli_fetch_assoc($resultadoo)){
					?>
						<li><a class="dropdown-item dropdown-toggle" href="#"> <?php echo $menudataa['DESC'] ?> </a>
		  	 				<ul class="submenu dropdown-menu">
								   <?php
								   
								   ?>
							</ul>
		  				</li>
					<?php
					}
				}
			?>
		</ul>
	</li>
		<?php


	}

	?>


	<!-- <li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">  More items  </a>
	    <ul class="dropdown-menu">
		  <li><a class="dropdown-item" href="#"> Dropdown item 1 </a></li>
		  <li><a class="dropdown-item dropdown-toggle" href="#"> Dropdown item 2 </a>
		  	 <ul class="submenu dropdown-menu">
			    <li><a class="dropdown-item" href="">Submenu item 1</a></li>
			    <li><a class="dropdown-item" href="">Submenu item 2</a></li>
			    <li><a class="dropdown-item" href="">Submenu item 3</a></li>
			 </ul>
		  </li>
		  <li><a class="dropdown-item dropdown-toggle" href="#"> Dropdown item 3 </a>
		  	 <ul class="submenu dropdown-menu">
			    <li><a class="dropdown-item" href="">Another submenu 1</a></li>
			    <li><a class="dropdown-item" href="">Another submenu 2</a></li>
			    <li><a class="dropdown-item" href="">Another submenu 3</a></li>
			    <li><a class="dropdown-item" href="">Another submenu 4</a></li>
			 </ul>
		  </li>
		  <li><a class="dropdown-item dropdown-toggle" href="#"> Dropdown item 4 </a>
		  	 <ul class="submenu dropdown-menu">
			    <li><a class="dropdown-item" href="">Another submenu 1</a></li>
			    <li><a class="dropdown-item" href="">Another submenu 2</a></li>
			    <li><a class="dropdown-item" href="">Another submenu 3</a></li>
			    <li><a class="dropdown-item" href="">Another submenu 4</a></li>
			 </ul>
		  </li>
		  <li><a class="dropdown-item" href="#"> Dropdown item 4 </a></li>
		  <li><a class="dropdown-item" href="#"> Dropdown item 5 </a></li>
	    </ul>
	</li> -->
</ul>


  </div> <!-- navbar-collapse.// -->

</nav>

</div><!-- container //  -->

</body>
</html>