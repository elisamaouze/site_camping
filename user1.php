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
	<meta name="viewport" content="width=device-width, initial-scale=1.0">


<!--CSS Bootstrap-->

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
 

<title>types Mobilhome</title>
<link rel="stylesheet" type="text/css" href="fichiercss/user1.css" />


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

    
<h1>Les types de Mobilhome</h1>
<form method="get" action="user1.php">


Sélectionner une catégorie afin d'y afficher les détails  <select name="cbocat">

<!--Chargement des catégories-->

<?php
include 'connexionbdd.php';
$req = $conn->prepare("select idtyp, libtyp from typemobil");
$req->execute();
$leslignes = $req->fetchall();
foreach ($leslignes as $uneligne)
{
if (isset($_GET["cbocat"])==true && $_GET["cbocat"]==$uneligne['idtyp'])
{
	echo("<option value='$uneligne[idtyp]' selected>$uneligne[libtyp]</option>");
}
else
{
	echo("<option value='$uneligne[idtyp]' >$uneligne[libtyp]</option>");
}
}
$req->closeCursor();
?>


</select>

<!--Boutton-->
<input type="submit" name="afficher" value="Voir">

</form>
<br/>




<!--Affichage des informations selon la catégorie sélectionnée-->


<?php
if (isset($_GET["cbocat"])==true)
{


$req = $conn->prepare("select idtyp, libtyp, nbpers, descripcourte, descriplongue, tarifsemaine from typemobil where idtyp=:num");
$req->bindParam(':num', $_GET["cbocat"], PDO::PARAM_INT);

$req->execute();
$leslignes = $req->fetchall();
foreach ($leslignes as $uneligne)

{
	
  echo(" Le numéro du type est : " . $uneligne['idtyp'] . "<br/> Nom : " . 
     $uneligne['libtyp'] . "<br/>Le nombre de personne : " . $uneligne['nbpers'] . "<br/> Description : " . 
     $uneligne['descripcourte'] . "<br/>" . $uneligne['descriplongue'] . "<br/> Prix de la semaine: " . 
     $uneligne['tarifsemaine'] . "€ <br/> <br/>");


}
$req->closeCursor();


$req = $conn->prepare("select nomfichier from photo where idtyp=:num");
$req->bindParam(':num', $_GET["cbocat"], PDO::PARAM_INT);

$req->execute();
$leslignes = $req->fetchall();

foreach ($leslignes as $uneligne)
{

	echo(" <img src='photo/$uneligne[nomfichier]' width='250'> ");

}
$req->closeCursor();
}
$conn=null;

?>


</div>
</body>
</html>