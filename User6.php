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

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Historique</title>
        <link rel="stylesheet" type="text/css" href="styles.css" />
        <link rel="stylesheet" type="text/css" href="fichiercss/compact.css" />
        <link rel="icon" type="image/ico" href="icons8-fruit-du-dragon-96.ico" sizes="32x32"/>
        <script src="code.js"></script>
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
        <form method="post" action="user6.php">
            <h1>Historique des réservations</h1>
            <table>
                
            

            <?php
            try
            {
                include 'connexionbdd.php';
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                if(isset($_SESSION['id_client'])) 
                {   //récupération du compte client
                    $id_client = $_SESSION['id_client'];

            
                    $stmt = $conn->prepare("SELECT r.*, m.nom AS nom_mobilhome, tm.libtyp AS type_mobilhome
                                            FROM reservation AS r
                                            INNER JOIN mobilhome AS m ON r.idmob = m.idmob
                                            INNER JOIN typemobil AS tm ON m.idtyp = tm.idtyp
                                            WHERE r.idcli = :id_client
                                            ORDER BY r.datedebut DESC
                                            ");
                    $stmt->bindParam(':id_client', $id_client);
                    $stmt->execute();
                    $reservations = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    if(count($reservations) > 0) 
                    {
                        ?> <!--Tableau-->
                        <thead>
                    <tr>
                        <th>Numéro de réservation</th>
                        <th>Date de réservation</th>
                        <th>Date de début</th>
                        <th>Date de fin</th>
                        <th>Nom du mobil-home</th>
                        <th>Type de mobil-home</th>
                        <th>Pré paiement</th>
                    </tr>
                </thead>
                <?php
                        foreach($reservations as $reservation) 
                        {   
                            //affichage des réservations
                            echo "<tbody>";
                            echo "<tr>";
                            echo "<td>{$reservation['idres']}</td>";
                            echo "<td>{$reservation['dateres']}</td>";
                            echo "<td>{$reservation['datedebut']}</td>";
                            echo "<td>{$reservation['datefin']}</td>";
                            echo "<td>{$reservation['nom_mobilhome']}</td>";
                            echo "<td>{$reservation['type_mobilhome']}</td>";
                            echo "<td>{$reservation['regleon']}</td>";
                            echo "</tr>";
                            echo "</tbody>";
                            }
                            
                    }
                    else
                    {
                        echo "<tbody>";
                        echo "<tr><td colspan='7'>Aucune réservation trouvée. </br> <a href = user5.php> Réserver </a> </td></tr>";
                        echo "</tbody>";
                    } 
                }
                else 
                {
                    echo "<tbody>";
                    echo "<tr><td colspan='7'>Vous devez être connecté pour accéder à cette page.</td></tr>";
                    echo "</tbody>";
                }
            }
            catch(PDOException $e)
            {
                echo "<tbody>";
                echo "<tr><td colspan='7'>ERREUR " . $e->getMessage() . "</td></tr>";
                echo "</tbody>";
            }
            ?>
        </table>
        </form>
    </body>
</html>