<?php 
include("includes/user4.php");
?>
<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <!--CSS Bootstrap-->

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


        <title>Se connecter</title>
        <link rel="stylesheet" type="text/css" href="fichiercss/user4.css" />
        
    </head>
    <body>

        <header>
           
        </header>
        <form method="post" action="user4.php">

            

            

            <?php
            $host = 'localhost';
            $dbname = 'campingmaouzeteixeiramacedo';
            $username = 'root'; 
            $password = '';




            //déconnexion
            try
            { //deconnexion
                if(isset($_POST['deconnexion']))
                {
                    unset($_SESSION['id_client']);
                   
                }



                $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["e_mail"]) && isset($_POST["mot_de_passe"])) 
                {
                    $email = $_POST['e_mail'];
                    $mot_de_passe = $_POST['mot_de_passe'];

                    $stmt = $conn->prepare("SELECT * FROM client WHERE mail = :email AND motpasse = :mot_de_passe");
                    $stmt->bindParam(':email', $email);
                    $stmt->bindParam(':mot_de_passe', $mot_de_passe);
                    $stmt->execute();
                    $client = $stmt->fetch(PDO::FETCH_ASSOC);

                    if (isset($client))
                    {
                        //connexion validé $client contient les infos du compte client connecté


                        $_SESSION['id_client']=$client['idcli'];

                        ?>
                         <section id="main2">
                            <div class="titleBox">
                             <form>
                        <?php  


                        //message de bienvenu
                        echo("<h2>C'est un plaisir de vous voir " . $client['nomcli'] . " </h2>");
                            echo "<h5>A propos de vous</h5>";

                        echo("<p>Vous êtes le client n°{$_SESSION['id_client']}</p>");      

                        

                        
                        echo "<p>Adresse: " . $client['adresse'] . "</p>";
                        echo "<p>Ville: " . $client['ville'] . "</p>";
                        echo "<p>Téléphone: " . $client['telephone'] . "</p>";
                        echo "<p> E-mail: " . $client['mail'] . "</p>";

                        ?>

                        <br/>

                            <a href="user1.php" class="button-name" name = continuer>Continuer</a>

                            <br/>



                            <a href="deconnexion.php" class="button-name" name = deconnexion>Déconnexion </a>


                        </form>
                        </div>
                         </section>

                    <?php

                        


                    }
                   

                }



                if(isset($_SESSION["id_client"]))
                {
   
                    ?>
                         
                        </br>
                        </br>
                        </br>
                        </br>




                                





                         <?php
                }
              




               else
               { 

                ?>
                
                  
                <!--Formulaire de connexion-->
                    <section id="main">
                    <div class="titleBox">
                        <form>
                            <h1>Connectez-vous</h1>
                            </div>
                                Mail :

                                <div class="wave-group">
                                    <input id="mail" name="e_mail" required type="text" class="input">
                                    <span class="bar"></span>
                                  </div>
                                  <br/>
                                 Mot de passe : 
                                 <div class="wave-group">
                                    <input id="mot_de_passe" name="mot_de_passe" required type="text" class="input">
                                    <span class="bar"></span>
                                  </div>
                         
                                 <input type='submit' class='btn btn-outline-success' name='btnvalider' value='Se connecter'>

                                    <div class="switchPage">
                                         <p>vous n'avez pas de compte ?</p>
                                          <a href="user3.php">Inscrivez-vous</a>
                                    </div>

                         </form>

                    </section>
            


               <?php     
                }
            }
            catch (PDOException $e) 
            {
                echo "Erreur: " . $e->getMessage();
            }

            ?>
        </form>
    </body>
</html>
