<?php 

session_start();
include './config.php';
if ($_SESSION[loggued_on_user] === "")
		$user = "guest";
	else
		$user = $_SESSION[loggued_on_user];
	if (!$_SESSION[$user][panier])
		$_SESSION[$user][panier] = array();
	if (!$_SESSION[$user][table])
		$_SESSION[$user][table] = array();

if ($_SESSION['db'] == NULL)
{
	$_SESSION['db'] = 1;
	include 'install.php';
}
?>
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
					<a href="view.php?category=marque&value=all&table=catalog">Marques &rsaquo;</a>
					<ul>
						<?php
							$db = mysqli_connect($mysqli_host, $mysqli_user, $mysqli_pass, $mysqli_db, $mysqli_port);; 
							$sql = 'SELECT *' . ' FROM ' . '`catalog`'; 
							$req = mysqli_query($db, $sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysqli_error($db));
							while ($data = mysqli_fetch_row($req))
							{
								$array[] = $data[1];
							}
							$array =array_unique($array, SORT_STRING);
							foreach ($array as $key => $value) {
								echo '<a href="view.php?category=marque&value=' . $value . '&table=catalog"><li>'.$value.'</li></a>';
							}
						?>
					</ul>
				</li>
			</ul><br />
			<ul class="classe" id="menu">
				<li>
					<a href="view.php?category=marque&value=all&table=catalog">Ann&eacute;es  &rsaquo;</a>
					<ul id="year">
						<?php
							$db = mysqli_connect($mysqli_host, $mysqli_user, $mysqli_pass, $mysqli_db, $mysqli_port);; 
							$sql = 'SELECT *' . ' FROM ' . '`catalog`'; 
							$req = mysqli_query($db, $sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysqli_error($db));
							while ($data = mysqli_fetch_row($req))
							{
								$years[] = $data[6];
							}
							$years = array_unique($years, SORT_STRING);
							foreach ($years as $key => $value) {
								echo '<a href="view.php?category=date&value='.$value.'&table=catalog"><li>- '.$value.' -</li></a>';
							}
						?>
						
					</ul>
				</li>
			</ul><br />
			<ul class="classe" id="menu">
				<li>
					<a href="view.php?category=marque&value=all&table=catalog">Cylindr&eacute;es &rsaquo;</a>
					<ul id="year">
						<?php
							$db = mysqli_connect($mysqli_host, $mysqli_user, $mysqli_pass, $mysqli_db, $mysqli_port);; 
							$sql = 'SELECT *' . ' FROM ' . '`catalog`'; 
							$req = mysqli_query($db, $sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysqli_error($db));
							while ($data = mysqli_fetch_row($req))
							{
								$cc[] = $data[5];
							}
							$cc = array_unique($cc, SORT_NUMERIC);
							sort($cc);
							foreach ($cc as $key => $value) {
								echo '<a href="view.php?category=cylindree&value='.$value.'&table=catalog"><li>- '.$value.' -</li></a>';
							}
						?>
					</ul>
				</li>
			</ul><br /><br />
			<div class="blocs">Accessoires:</div><br /><br />
			<ul class="classe" id="menu">
				<li>
					<a href="view.php?table=casque&category=marque&value=all">Casques &rsaquo;</a>
					<ul>
						<?php
							$db = mysqli_connect($mysqli_host, $mysqli_user, $mysqli_pass, $mysqli_db, $mysqli_port);; 
							$sql = 'SELECT *' . ' FROM ' . '`casque`'; 
							$req = mysqli_query($db, $sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysqli_error($db));
							while ($data = mysqli_fetch_row($req))
							{
								$casque[] = $data[1];
							}
							$casque = array_unique($casque, SORT_STRING);
							foreach ($casque as $key => $value) {
								echo '<a href="view.php?category=marque&value='.$value.'&table=casque"><li>'.$value.'</li></a>';
							}
						?>
					</ul>
				</li>
			</ul><br />
			<ul class="classe" id="menu">
				<li>
					<a href="view.php?table=equipement&category=type&value=all">Equipements &rsaquo;</a>
					<ul>
						<?php
							$db = mysqli_connect($mysqli_host, $mysqli_user, $mysqli_pass, $mysqli_db, $mysqli_port);; 
							$sql = 'SELECT *' . ' FROM ' . '`equipement`'; 
							$req = mysqli_query($db, $sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysqli_error($db));
							while ($data = mysqli_fetch_row($req))
							{
								$type[] = $data[2];
							}
							$type = array_unique($type, SORT_STRING);
							foreach ($type as $key => $value) {
								echo '<a href="view.php?category=marque&value='.$value.'&table=equipement"><li>'.$value.'</li></a>';
							}
						?>
					</ul>
				</li>
			</ul><br /><br />
<?php

$db = mysqli_connect($mysqli_host, $mysqli_user, $mysqli_pass, $mysqli_db, $mysqli_port);; 
$sql = 'SELECT *' . ' FROM ' . '`users`';
$req = mysqli_query($db, $sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysqli_error($db));

while($data = mysqli_fetch_row($req))
{
	if ($data[0] === $user && $data[3] == 3)
	{
?>
			<div class="blocs">Admin:</div><br />
			<ul class="classe" id="menu">
				<li><a href="stock.php">Manage Stock</a>
					<ul>
						<a href="stock.php?action=set"><li>Add</li></a>
						<a href="stock.php?action=del"><li>Delete</li></a>
						<a href="stock.php?action=update"><li>Update</li></a>
					</ul>
				</li> 
			</ul><br />
<?php
	}
}		
?>
		</div>
		<div class="rightmodule">
<?php
if ($user == "guest")
{
?>
			<form action="login.php" method="POST" class="log">
			Identifiant: <br /><input type="text" name="login" value="" placeholder="Identifiant" class="sub"><br />
			Mot de passe: <br /><input type="password" name="passwd" value="" placeholder="Mot de passe" class="sub"><br /><br />
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
				<p class="hello"><?php echo $user;?></p>
				<p class="hello">Vous &ecirc;tes connect&eacute;</p>
				<form action="logout.php" method="POST">
					<input type="submit" name="submit" value="Logout" class="sub">
				</form>
				<form action="account.html" method="POST">
					<input type="submit" name="submit" value="Modification compte" class="delete">
				</form>
			</div><br /><br />
<?php } ?>
			<div class="log"><br />
				<a href="panier.php" class="panier">Mon panier</a><p>Total des achats:</p>
				<input readonly type="text" name="total" value= '<?php
					$i = 0;
					$total = 0;
					while ($_SESSION[$user][table][$i] && $_SESSION[$user][panier][$i]) {
						$sql = 'SELECT *' . ' FROM ' . $_SESSION[$user][table][$i] . ' WHERE' . '`id`' . '=' . $_SESSION[$user][panier][$i];
						$req = mysqli_query($db, $sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysqli_error($db));
						$data = mysqli_fetch_row($req);
						if ($_SESSION[$user][table][$i] === "catalog")
							$total += $data[3];
						else
							$total += $data[4]; 
						$i++;
					}echo $total . "$ ";
					echo $i . " articles";?>' 
					class="achat">
			</div>
		</div>
	</body>
</html>
