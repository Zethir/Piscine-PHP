<?php
session_start();
include './config.php';
if ($_GET[submit] == "Add Bike") 
{
	$db = mysqli_connect($mysqli_host, $mysqli_user, $mysqli_pass, $mysqli_db, $mysqli_port);
	
	$marque = $_GET[marque];
	$modele = $_GET[modele];
	$price = $_GET[price];
	$img = $_GET[img];
	$cylindree = $_GET[cylindree];
	$dateuh = $_GET[date];
	$sql = "INSERT INTO `catalog`(`marque`, `modele`, `price`, `img`, `cylindree`, `date`, `stock`) VALUES( '".$marque."', '".$modele."', '".$price."', '".$img."', '".$cylindree."', '".$dateuh."', '1')";

	$req = mysqli_query($db, $sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysqli_error($db)); 
	echo 'Operation reussie: retour a l acceuil';
	echo '<META HTTP-EQUIV=REFRESH CONTENT="2;index.php">';
}

else if ($_GET[submit] == "Add Helmet" || $_GET[submit] == "Add Accessories")
{
	if ($_GET[submit] == "Add Helmet")
		$table = "casque";
	else if ($_GET[submit] == "Add Accessories")
		$table = "equipement";
	$db = mysqli_connect($mysqli_host, $mysqli_user, $mysqli_pass, $mysqli_db, $mysqli_port);
	$sql = "INSERT INTO `".$table."`(`marque`, `type`, `modele`, `price`, `img`, `taille`, `stock`) VALUES( '".$_GET[marque]."', '".$_GET[type]."', '".$_GET[modele]."', '".$_GET[price]."', '".$_GET[img]."', '".$_GET[taille]."', '1')";
	$req = mysqli_query($db, $sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysqli_error($db)); 
	echo 'Operation reussie: retour a l acceuil';
	echo '<META HTTP-EQUIV=REFRESH CONTENT="2;index.php">';
}

else if ($_GET['submit'] == "Add User")
{
	$db = mysqli_connect($mysqli_host, $mysqli_user, $mysqli_pass, $mysqli_db, $mysqli_port);
	$sql = "INSERT INTO `users`(`username`,`password`, `name`, `classe`) VALUES ('".$_GET['pseudo']."','".$_GET['passwd']."', '".$_GET['name']."', '".$_GET['classe']."')";
	$req = mysqli_query($db, $sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysqli_error($db)); 
	echo 'Operation reussie: retour a l acceuil';
	echo '<META HTTP-EQUIV=REFRESH CONTENT="2;index.php">';
}

else if ($_GET[submit] === "Delete the Bike") 
{
	$db = mysqli_connect($mysqli_host, $mysqli_user, $mysqli_pass, $mysqli_db, $mysqli_port);

	$sql = "DELETE FROM `catalog` WHERE `modele` = '".$_GET[modele]."' AND `marque` = '".$_GET[marque]."' AND `price` = '".$_GET[price]."' AND `cylindree` = '".$_GET[cylindree]."' AND `date` = '".$_GET[date]."'";

	$req = mysqli_query($db, $sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysqli_error($db));
	echo 'Operation reussie: retour a l acceuil';
	echo '<META HTTP-EQUIV=REFRESH CONTENT="2;index.php">';
}

else if ($_GET[submit] === "Delete User") 
{
	$db = mysqli_connect($mysqli_host, $mysqli_user, $mysqli_pass, $mysqli_db, $mysqli_port);

	$sql = "DELETE FROM `users` WHERE `username` = '".$_GET['pseudo']."'";

	$req = mysqli_query($db, $sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysqli_error($db));
	echo 'Operation reussie: retour a l acceuil';
	echo '<META HTTP-EQUIV=REFRESH CONTENT="2;index.php">';
}

else if ($_GET[submit] === "Delete Helmet" || $_GET[submit] == "Delete Accessories") 
{
	if ($_GET[submit] == "Delete Helmet")
		$table = "casque";
	else if ($_GET[submit] == "Delete Accessories") 
		$table = "equipement";

	$db = mysqli_connect($mysqli_host, $mysqli_user, $mysqli_pass, $mysqli_db, $mysqli_port);

	$sql = "DELETE FROM `".$table."` WHERE `modele` = '".$_GET[modele]."' AND `marque` = '".$_GET[marque]."' AND `price` = '".$_GET[price]."' AND `type` = '".$_GET[type]."' AND `taille` = '".$_GET[taille]."'";

	$req = mysqli_query($db, $sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysqli_error($db));
	echo 'Operation reussie: retour a l acceuil';
	echo '<META HTTP-EQUIV=REFRESH CONTENT="2;index.php">';
}


else if ($_GET[submit] === "Update Bike")
{
	$db = mysqli_connect($mysqli_host, $mysqli_user, $mysqli_pass, $mysqli_db, $mysqli_port);

	$sql = "Update `catalog` SET `stock`= '".$_GET[stock]."' AND `price` = '".$_GET[price]."' WHERE `modele` = '".$_GET[modele]."' AND `marque` = '".$_GET[marque]."' AND  `cylindree` = '".$_GET[cylindree]."' AND `date` = '".$_GET[date]."'";

	$req = mysqli_query($db, $sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysqli_error($db)); 
	echo 'Operation reussie: retour a l acceuil';
	echo '<META HTTP-EQUIV=REFRESH CONTENT="2;index.php">';
}

else if ($_GET[submit] === "Update User")
{
	$db = mysqli_connect($mysqli_host, $mysqli_user, $mysqli_pass, $mysqli_db, $mysqli_port);

	$sql = "Update `users` SET `username`= '".$_GET[pseudo]."' AND `name`='".$_GET[name]."' AND `classe`='".$_GET[classe]."' WHERE `username`='".$_GET[oldlog]."'";

	$req = mysqli_query($db, $sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysqli_error($db)); 
	echo 'Operation reussie: retour a l acceuil';
	echo '<META HTTP-EQUIV=REFRESH CONTENT="2;index.php">';
}

else if ($_GET[submit] == "Update Helmet" || $_GET[submit] == "Update Accessories")
{
	if ($_GET[submit] == "Udpate Helmet")
		$table = "casque";
	else
		$table = "equipement";
	$db = mysqli_connect($mysqli_host, $mysqli_user, $mysqli_pass, $mysqli_db, $mysqli_port);

	$sql = "Update `".$table."` SET `stock`= '".$_GET[stock]."' AND `price` = '".$_GET[price]."' WHERE `modele` = '".$_GET[modele]."' AND `marque` = '".$_GET[marque]."' AND  `taille` = '".$_GET[taille]."' ";

	$req = mysqli_query($db, $sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysqli_error($db)); 
	echo 'Operation reussie: retour a l acceuil';
	echo '<META HTTP-EQUIV=REFRESH CONTENT="2;index.php">';
}

@mysqli_close($db);
?>
<html>
<head>
	<title>Edit Stock</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<a href="index.php"><div class="banner">Motorhead</div></a>
<div class="adminpage">
<?php
$db = mysqli_connect('localhost', 'root', 'root', 'mnshp'); 

$sql = " SELECT * FROM `users` WHERE `username` = '".$_SESSION[loggued_on_user]."' ";

$req = mysqli_query($db, $sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysqli_error($db));

$data = mysqli_fetch_row($req);
if ($data[3] != 3)
{
	echo "You don't have the right to be here!\n";
	echo '<META HTTP-EQUIV=REFRESH CONTENT="2;index.php">';		
}
else if ($_GET[action] === "set") {
	echo '
		<table>
		<td class="admincapsule">
		<p>Add Bike</p>
		<form method="GET" action="stock.php"> 
		<input class="textform" type="text" name="marque" value="" placeholder="Marque"><br />
		<input class="textform"type="text" name="modele" value="" placeholder="Modele"><br />
		<input class="textform" type="text" name="price" value="" placeholder="Prix"><br />
		<input class="textform" type="text" name="img" value="" placeholder="Lien de l image"><br />
		<input class="textform" type="text" name="cylindree" value="" placeholder="Cylindree"><br />
		<input class="textform" type="text" name="date" value="" placeholder="Date de sortie"><br /><br />
		<input class="sub" type="submit" name="submit" value="Add Bike"/><br />
		</form>
		</td>
		<td class="admincapsule">
		<p>Add Helmet</p>
		<form method="GET" action="stock.php">
		<input class="textform" type="text" name="marque" value="" placeholder="Marque"><br />
		<input class="textform" type="text" name="modele" value="" placeholder="Modele"><br />
		<input class="textform" type="text" name="type" value="" placeholder="Type"><br />
		<input class="textform" type="text" name="img" value="" placeholder="Lien de l image"><br />
		<input class="textform" type="text" name="taille" value="" placeholder="Taille"><br />
		<input class="textform" type="text" name="price" value="" placeholder="Prix"><br /><br />
		<input class="sub" type="submit" name="submit" value="Add Helmet"/><br />
		</form>
		</td>
		<td class="admincapsule">
		<p>Add Accessories</p>
		<form method="GET" action="stock.php">
		<input class="textform" type="text" name="marque" value="" placeholder="Marque"><br />
		<input class="textform" type="text" name="modele" value="" placeholder="Modele"><br />
		<input class="textform" type="text" name="type" value="" placeholder="Type"><br />
		<input class="textform" type="text" name="img" value="" placeholder="Lien de l image"><br />
		<input class="textform" type="text" name="taille" value="" placeholder="Taille"><br />
		<input class="textform" type="text" name="price" value="" placeholder="Prix"><br /><br />
		<input class="sub" type="submit" name="submit" value="Add Accessories"/><br />
		</form>
		</td>
		<td class="admincapsule">
		<p>Add User</p>
		<form method="GET" action="stock.php">
		<input class="textform" type="text" name="pseudo" value="" placeholder="Identifiant"><br />
		<input class="textform" type="text" name="passwd" value="" placeholder="Mot de passe"><br />
		<input class="textform" type="text" name="name" value="" placeholder="Nom et Pr&eacute;nom"><br /><br />
		<input class="textform" type="text" name="classe" value="" placeholder="Classe"><br /><br />
		<input class="sub" type="submit" name="submit" value="Add User"/><br />
		</form>
		</td>
		</table>';
}
else if($_GET[action] === "del")
{
	echo '
		<table>
		<td class="admincapsule">
		<p>Delete Bike</p>
		<form method="GET" action="stock.php">
		<input class="textform" type="text" name="marque" value="" placeholder="Marque"><br />
		<input class="textform" type="text" name="modele" value="" placeholder="Modele"><br />
		<input class="textform" type="text" name="price" value="" placeholder="Prix"><br />
		<input class="textform" type="text" name="cylindree" value="" placeholder="Cylindree"><br />
		<input class="textform" type="text" name="date" value="" placeholder="Date de sortie"><br /><br />
		<input class="sub"type="submit" name="submit" value="Delete the Bike"/>	
		</form>
		</td>
		<td class="admincapsule">
		<p>Delete Helmet</p>
		<form method="GET" action="stock.php">
		<input class="textform" type="text" name="marque" value="" placeholder="Marque"><br />
		<input class="textform" type="text" name="modele" value="" placeholder="Modele"><br />
		<input class="textform" type="text" name="type" value="" placeholder="Type"><br />
		<input class="textform" type="text" name="taille" value="" placeholder="Taille"><br />
		<input class="textform" type="text" name="price" value="" placeholder="Prix"><br /><br />
		<input class="sub" type="submit" name="submit" value="Delete Helmet"/><br />
		</form>
		</td>
		<td class="admincapsule">
		<p>Delete Accessories</p>
		<form method="GET" action="stock.php">
		<input class="textform" type="text" name="marque" value="" placeholder="Marque"><br />
		<input class="textform" type="text" name="modele" value="" placeholder="Modele"><br />
		<input class="textform" type="text" name="type" value="" placeholder="Type"><br />
		<input class="textform" type="text" name="taille" value="" placeholder="Taille"><br />
		<input class="textform" type="text" name="price" value="" placeholder="Prix"><br /><br />
		<input class="sub" type="submit" name="submit" value="Delete Accessories"/><br />
		</form>
		</td>
		<td class="admincapsule">
		<p>Delete User</p>
		<form method="GET" action="stock.php">
		<input class="textform" type="text" name="pseudo" value="" placeholder="Identifiant"><br />
		<input class="sub" type="submit" name="submit" value="Delete User"/><br />
		</form>
		</td>
		</table>';
}
else if ($_GET[action] === "update")
{
	echo '
		<table>
		<td class="admincapsule">
		<p>Update Bike</p>
		<form method="GET" action="stock.php"> 
		<input class="textform" type="text" name="marque" value="" placeholder="Marque"><br />
		<input class="textform" type="text" name="modele" value="" placeholder="Modele"><br />
		<input class="textform" type="text" name="cylindree" value="" placeholder="Cylindree"><br />
		<input class="textform" type="text" name="date" value="" placeholder="Date de sortie"><br />
		<input class="textform" type="text" name="price" value="" placeholder="Nouveau Prix"><br />
		<input class="textform" type="text" name="stock" value="" placeholder="Nouveau Stock"><br /><br />
		<input class="sub" type="submit" name="submit" value="Update Bike"/><br />
		</form>
		</td>
		<td class="admincapsule">
		<p>Update Helmet</p>
		<form method="GET" action="stock.php"> 
		<input class="textform" type="text" name="marque" value="" placeholder="Marque"><br />
		<input class="textform" type="text" name="modele" value="" placeholder="Modele"><br />
		<input class="textform" type="text" name="taille" value="" placeholder="Taille"><br />
		<input class="textform" type="text" name="price" value="" placeholder="Nouveau Prix"><br />
		<input class="textform" type="text" name="stock" value="" placeholder="Nouveau Stock"><br /><br />
		<input class="sub" type="submit" name="submit" value="Update Helmet"/><br />
		</form>
		</td>
		<td class="admincapsule">
		<p>Update Accessories</p>
		<form method="GET" action="stock.php"> 
		<input class="textform" type="text" name="marque" value="" placeholder="Marque"><br />
		<input class="textform" type="text" name="modele" value="" placeholder="Modele"><br />
		<input class="textform" type="text" name="taille" value="" placeholder="Taille"><br />
		<input class="textform" type="text" name="price" value="" placeholder="Nouveau Prix"><br />
		<input class="textform" type="text" name="stock" value="" placeholder="Nouveau Stock"><br /><br />
		<input class="sub" type="submit" name="submit" value="Update Accessories"/><br />
		</form>
		</td>
		<td class="admincapsule">
		<p>Update User</p>
		<form method="GET" action="stock.php">
		<input class="textform" type="text" name="oldlog" value="" placeholder="Ancien Identifiant"><br />
		<input class="textform" type="text" name="pseudo" value="" placeholder="Identifiant"><br />
		<input class="textform" type="text" name="name" value="" placeholder="Nom et Pr&eacute;nom"><br /><br />
		<input class="textform" type="text" name="classe" value="" placeholder="Classe"><br /><br />
		<input class="sub" type="submit" name="submit" value="Update User"/><br />
		</form>
		</td>
		</table>';
}
?>
</div>
</body>
</html>
