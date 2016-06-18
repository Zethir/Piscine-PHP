<?php session_start();?>
<html>
	<head>
		<title>Motorhead</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<a href="index.php"><div class="banner">Motorhead</div></a>
		<div class="leftmodule">
			<div class="blocs">Moto:</div><br /><br />
			<ul id="menu" class="classe">
				<li>
					<a href="#">Marques &rsaquo;</a>
					<ul>
						<a href="#"><li>Yamaha</li></a>
						<a href="#"><li>Guzzi</li></a>
						<a href="#"><li>Kawasaki</li></a>
						<a href="#"><li>Suzuki</li></a>
						<a href="#"><li>Ducati</li></a>
						<a href="#"><li>Bmw</li></a>
						<a href="#"><li>Triumph</li></a>
					</ul>
				</li>
			</ul><br />
			<ul class="classe" id="menu">
				<li>
					<a href="#">Ann&eacute;es  &rsaquo;</a>
					<ul id="year">
						<a href="#"><li>- 2009 -</li></a>
						<a href="#"><li>- 2010 -</li></a>
						<a href="#"><li>- 2012 -</li></a>
						<a href="#"><li>- 2014 -</li></a>
						<a href="#"><li>- 2015 -</li></a>
					</ul>
				</li>
			</ul><br />
			<ul class="classe" id="menu">
				<li>
					<a href="#:\">Cylindr&eacute;es &rsaquo;</a>
					<ul id="year">
						<a href="#"><li>600cc</li></a>
						<a href="#"><li>750cc</li></a>
						<a href="#"><li>900cc</li></a>
						<a href="#"><li>1200cc</li></a>
					</ul>
				</li>
			</ul><br /><br />
			<div class="blocs">Accessoires:</div><br /><br />
			<ul class="classe" id="menu">
				<li>
					<a href="#">Casques &rsaquo;</a>
					<ul>
						<a href="#"><li>Bell</li></a>
						<a href="#"><li>Premier</li></a>
						<a href="#"><li>Hjc</li></a>
						<a href="#"><li>Shoei</li></a>
					</ul>
				</li>
			</ul><br />
			<ul class="classe" id="menu">
				<li>
					<a href="#">Equipements &rsaquo;</a>
					<ul>
						<a href="#"><li>Blouson</li></a>
						<a href="#"><li>Bottes</li></a>
						<a href="#"><li>Gants</li></a>
					</ul>
				</li>
			</ul><br /><br />
		</div>
		<div class="rightmodule">
<?php
if ($_GET['msg'] != 'login')
{
?>
			<form action="login.php" method="POST" class="log">
			Identifiant: <br /><input type="text" name="login" value="" placeholder="Identifiant" class="sub"><br />
			Mot de passe: <br /><input type="password" name ="passwd" value="" placeholder="Mot de passe" class="sub"><br /><br />
			<input type="submit" name="submit" value="Connexion" class="sub">
			</form>
			<div class="modif">
				<a href="create.html" class="ident">S'inscrire</a><br /><p>Ou</p>
				<a href="modif.html" class="ident">Modifier son mot de passe</a><br />
			</div>
<?php } 
else {
?>
			<div class="connect">
				<p class="hello">Bonjour<p/>
				<p class="hello"><?php echo $_SESSION['loggued_on_user'];?></p>
				<p class="hello">Vous &ecirc;tes connect&eacute;</p>
				<form action="logout.php" method="POST">
					<input type="submit" name="submit" value="Logout" class="sub">
				</form>
			</div><br /><br />
<?php } ?>
			<div class="log"><br />
				<a href="#" class="panier">Mon panier</a><p>Total des achats:</p>
				<input readonly type="text" name="total" value="12.5&#8364;" class="achat">
			</div>
		</div>
	</body>
</html>
