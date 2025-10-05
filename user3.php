<!doctype html>
<html lang="fr">
<head>
<meta charset="utf-8">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  <link rel="stylesheet" type="text/css" href="fichiercss/user3.css" />

<title>compte client</title>


</head>
<body>

  <section id="main">
            <div class="titleBox">
				<h1>Créer un compte</h1>
			</div>

				<form method="get" action="user3.php">
 					<br/>

				
					Nom : <div class="wave-group">
  								<input id="nom_input" name="nom" required type="text" class="input">
 									<span class="bar"></span>
  							</div>


						<!-- <input type="text" id="nom_input" name="nom" required> <br/> -->
					


					Adresse : <div class="wave-group">
  								<input id="adr" name="adresse" required type="text" class="input">
 									<span class="bar"></span>
  							</div>

  							<!--<input type="text" id="adr" name="adresse" required> <br/> -->
					

					Code Postal : <div class="wave-group">
  								<input id="cp" name="cp" required type="text" class="input">
 									<span class="bar"></span>
  							</div>


							<!-- <input type="text" id="cp" name="cp" required> <br/> -->
					

					Ville :	 <div class="wave-group">
  								<input id="ville" name="ville" required type="text" class="input">
 									<span class="bar"></span>
  							</div>




					<!--<input type="text" id="ville" name="ville" required> <br/>-->
					

					Téléphone : <div class="wave-group">
  								<input id="tel" name="tel" required type="text" class="input">
 									<span class="bar"></span>
  							</div>





					 <!--<input type="text" id="tel" name="tel" required> <br/>-->
					

					 
					Mail : <div class="wave-group">
  								<input id="mail" name="mail" required type="text" class="input">
 									<span class="bar"></span>
  							</div>





					 <!-- <input type="text" id="mail" name="mail" required> <br/> -->
					
            					

					Mot de passe : <div class="wave-group">
  								<input id="mdp" name="mdp" required type="text" class="input">
 									<span class="bar"></span>
  							</div>
					
					<button type="submit" class="btn btn-outline-success" name="ajoutercli" value="Enregistrer">S'inscrire</button>
					<div class="switchPage">
                		<p>vous avez déjà un compte ?</p>
                		<a href="deconnexion.php">connectez-vous</a>
          			</div>

				</form>

	</section>


<?php
//------- Action Insert ------------------------------
if (isset($_GET["ajoutercli"])==true)

{
include 'connexionbdd.php';
$req = $conn->prepare("insert into client(nomcli, adresse, cp, ville, telephone, mail, motpasse)
values (:nom, :adr, :cp, :ville, :tel, :mail, :mdp)"); 


$req->bindParam(':nom',$_GET["nom"], PDO::PARAM_STR);
$req->bindParam(':adr', $_GET["adresse"], PDO::PARAM_STR);
$req->bindParam(':cp', $_GET["cp"], PDO::PARAM_STR);
$req->bindParam(':ville', $_GET["ville"], PDO::PARAM_STR);
$req->bindParam(':tel', $_GET["tel"], PDO::PARAM_STR);
$req->bindParam(':mail', $_GET["mail"], PDO::PARAM_STR);
$req->bindParam(':mdp', $_GET["mdp"], PDO::PARAM_STR);

$numder = $conn->lastInsertId() ;

$rep = $req->execute();

if ($rep == true)
	{
		echo("Votre compte a été crée avec succès");
		
	}

$conn=null;

//redirection vers la page de connexion 
header('Location: index.php');

}




?>

</body>
</html>