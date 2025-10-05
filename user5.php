<?php
session_start();
//vérifie si l'utilisateur est connecté sinon il sera redirigé vers la page de connexion
if(!$_SESSION['id_client'])
  {
    header('Location: index.php');
  }  

?>

<!doctype html>
<html lang="fr">
<head>
<meta charset="utf-8">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


<link rel="stylesheet" type="text/css" href="fichiercss/user5.css" />


</head>
<body>




<!--Menu-->
<nav class="navbar navbar-dark bg-dark ">
  <div class="container-fluid">
    <a class="navbar-brand" href="user1.php">Le camping de Mâcon</a>
    
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">

      <span class="navbar-toggler-icon"></span>
    </button>


    <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">

      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Espace personnel</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>

      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="user1.php">Voir les mobilhomes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="user2.php">Voir les disponibilités</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="user5.php">Réserver</a>
          </li>
         
         
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Compte
            </a>
            <ul class="dropdown-menu dropdown-menu-dark">
             
              <li><a class="dropdown-item" href="user6.php">Historique</a></li>
              <li>
                <li><a class="dropdown-item" href="user3.php">Créer un autre compte</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="deconnexion.php">Se déconnecter</a></li>
            </ul>
          </li>
        </ul>
        <form class="d-flex mt-3" role="search">
          
        
        </form>
      </div>
    </div>
  </div>
</nav>
  <div class="container-xxl bd-gutter mt-5 my-md-4 bd-layout">


<!--Commencement de la page-->
	

<p class="text-center"> <h1>Réservation </h1> </p>
<form method="get" action="user5.php">

	<!--Liste déroulante-->

 <select class="form-select" id="floatingSelectGrid" name="typemobilhome">
        <option selected>Types</option>



<?php
include 'connexionbdd.php';
$req = $conn->prepare("SELECT idtyp, libtyp from Typemobil "); 
$req->execute();
$leslignes = $req->fetchall();
foreach ($leslignes as $uneligne)
{//affiche les types
echo("<option value='$uneligne[idtyp]'> $uneligne[libtyp]  ");
}
$req->closeCursor();

?>
<br/>
</select>


<!--Calendrier-->
Date de début : <input type="date" name="date" /><br/>
<br/>

<input type="submit" name="btndeb" value="Voir" />
</form>

<!--Affichage des mobilhomes-->
<form>
<?php
if (isset($_GET["btndeb"])==true)
{
	$_SESSION["datedebut"]=$_GET["date"]; 
	// on veut afficher les mobilhomes disponibles (id nom)
	//pour le type et la date choisie par l'utilisateur dans le <form> ci-dessus
		//dans mon jeu d'essaie, ajouter le même type de 12 à 14 à la même date 
	$req=$conn->prepare("select idmob, nom, numemp 
						  from mobilhome
						  where idmob NOT IN  ( select idmob from reservation
	                                       		where datedebut=:date )
	                      and idtyp=:idtyp ");

	$req->bindParam(':date', $_GET["date"], PDO::PARAM_STR);
	$req->bindParam(':idtyp', $_GET["typemobilhome"], PDO::PARAM_STR);
	$req->execute();
	$leslignes = $req->fetchall();
	foreach ($leslignes as $uneligne)
	{	
		echo(" <br/>");
		echo("<input type=\"radio\" name=\"rdonom\" value=\"$uneligne[idmob]\" />  $uneligne[nom] <br/>");

	}
	$req->closeCursor();
}

?>



       <!-- il y a une date cachée -->
<input type="hidden" name="date" value="<?php if (isset($_GET["date"])) echo($_GET["date"])?>">

<?php
if (isset($_GET["btndeb"]))
{
?>


<br/>

<div class="checkbox-wrapper">
  <input id="terms-checkbox-37" name="regleon" type="checkbox" value = 1>
  <label class="terms-label" for="terms-checkbox-37">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 200 200" class="checkbox-svg">
      <mask fill="white" id="path-1-inside-1_476_5-37">
        <rect height="200" width="200"></rect>
      </mask>
      <rect mask="url(#path-1-inside-1_476_5-37)" stroke-width="40" class="checkbox-box" height="200" width="200"></rect>
      <path stroke-width="15" d="M52 111.018L76.9867 136L149 64" class="checkbox-tick"></path>
    </svg>
    <span class="label-text">Réglée</span>
  </label>
</div>


<br/>

<button class="btn btn-outline-success" type="submit" name="btnajouter" value="Ajouter">Ajouter</button>






<?php 

} 



?>

<br/>
<br/>

</form>




<?php
if (isset($_GET["btnajouter"])==true)
{
	//Ajouter ma réservation
	$dateres=date("Y-m-d");
	//on calcule la date de fin
	$dateDepartTimestamp = strtotime($_SESSION["datedebut"]);
	$datefin= date('Y-m-d', strtotime('+7 day', $dateDepartTimestamp)); 

		//Vérifie l'existence du regleon
		if (isset($_GET["regleon"])==true)
		{
			$valeur = 1;
		}

		else
		{
			$valeur = 0;
		}
//recap
	echo("Récapitulatif :<br>
			date de début : $_SESSION[datedebut]<br>
		 date de fin : $datefin<br> 
			Numéro du mobilhome :  $_GET[rdonom]<br>
			Numéro du client : $_SESSION[id_client]<br> 
			Date de réservation : $dateres<br>
		Réglée : $valeur <br>");

	include 'connexionbdd.php';
	$req = $conn->prepare("insert into reservation(dateres,datedebut, datefin, regleon, idmob,idcli)
	values (:datres, :deb, :fin, :regleon, :idmob ,:idcli)");

	$req->bindParam(':datres', $dateres, PDO::PARAM_STR);
	$req->bindParam(':deb', $_SESSION["datedebut"], PDO::PARAM_STR);
	$req->bindParam(':fin', $datefin, PDO::PARAM_STR);
	$req->bindParam(':regleon', $valeur, PDO::PARAM_INT);
	$req->bindParam(':idmob', $_GET["rdonom"], PDO::PARAM_STR);
	$req->bindParam(':idcli', $_SESSION["id_client"], PDO::PARAM_STR);


	$rep = $req->execute();
		
	if ($rep == true)

	echo("Ajout effectué dans votre compte client<br/>");

	else

	echo("Echec, ajout non effectué<br/>");

	$conn=null;
}

?>



</body>
</html>