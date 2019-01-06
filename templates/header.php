<?php 
ob_start();
session_start();
require_once 'templates/include.php';
require_once 'funcion.php'; 
require_once 'config.php'; 
if(!isset($_SESSION['logged_in'])){
	header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="muni">
    <title>Unc3ns0r3d | BETA</title>
	<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
 	</head>
 	<body>

    <!-- Static navbar -->
	<div role="navigation" class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" data-toggle="collapse"
					data-target=".navbar-collapse" class="navbar-toggle collapsed">
					<span class="sr-only">Toggle navigation</span> <span
						class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
			</div>
			<?php $uri = end( explode("/",$_SERVER['REQUEST_URI'])); ?>
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<li <?php if($uri == 'home.php') echo "class='active'"; ?>><a href="home.php">Inicio</a></li>
					<li <?php if($uri == '#') echo "class='active'"; ?>><a href="#">Contacto</a>
					<li <?php if($uri == '#') echo "class='active'"; ?>><a href="../reportes.php">Reportes</a>	
					</li>
					</ul>
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a href="#" data-toggle="dropdown" class="dropdown-toggle">
							Hola,  
							
						<?php if($_SESSION['logged_in']) { ?>
							<?php echo $_SESSION['name']; ?>
							<span class="caret"></span>
						</a>
						<ul role="menu" class="dropdown-menu">
							<li> <a href="info.php">Mi cuenta</a> </li>
							<li> <a href="account.php">Editar</a> </li>
							<li class="divider"></li>
							<li> <a href="logout.php">Salir</a> </li>
						</ul>
						<?php } ?>
					</li>
					
				</ul>
			</div>
			<!--/.nav-collapse -->
		</div>
	</div>