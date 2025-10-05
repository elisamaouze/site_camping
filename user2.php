<?php
session_start();
//vérifie si l'utilisateur est connecté sinon il sera redirigé vers la page de connexion
if(!$_SESSION['id_client'])
  {
    header('Location: index.php');
  }  

?>


<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <!--CSS Bootstrap-->

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


        <title>Disponibilité</title>
        
        
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


      

        <form method="post" action="user2.php">
            <h1>La disponibilité des mobil-homes</h1>
            <input type='date' id='datedebut' name='date_de_debut'>

           

             
             <input type='submit' name='btnvalider' value='Valider'>
             <br />
             <br />
        </form>
        <div class='mobil-home-list'>
        

        <?php
        if (isset($_POST["btnvalider"]))
        {
            try 
            {
                include 'connexionbdd.php';
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                // Récupérer la date sélectionnée
                $selectedDate = $_POST['date_de_debut'];
                // Requête SQL pour récupérer les mobil-homes disponibles à la date sélectionnée
                $stmt = $conn->prepare("SELECT m.idmob, m.nom, m.numemp, tm.libtyp 
                                        FROM mobilhome AS m 
                                        INNER JOIN typemobil AS tm ON m.idtyp = tm.idtyp 
                                        WHERE m.idmob NOT IN (SELECT r.idmob 
                                        FROM reservation AS r 
                                        WHERE :selected_date BETWEEN r.datedebut AND r.datefin
                                            )
                                        ");
                $stmt->bindParam(':selected_date', $selectedDate);
                $stmt->execute();
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                // Affichage des mobil-homes disponibles
                foreach($results as $row)
                {
                    echo("<p> | {$row['nom']} - {$row['numemp']} - {$row['libtyp']}</p>");
                }

            } 

            catch(PDOException $e) 
            {
                echo "Erreur: " . $e->getMessage();
            }
        }
        ?>


               
        </div> 
    </body>
</html>