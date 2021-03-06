<html>
    
    
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="MiseEnPage.css" />
        <title>Projet Web</title>
        <p class="logo"><img src="logo.png" alt="LOGO ENSC" /></p>
        <h2>Site web pour la création, la gestion et le partage de projets des différents modules de l'ENSC.</h2>
    </head>
    
    
    <body>
        <nav>
            </br>
            <ul id="menu">
                <li><a href="Projets.php">Projets</a>
                        <ul>
                                <li><a href="Projets.php">Liste des projets</a></li>
                                <li><a href="AjoutProjet.php">Ajouter un projet</a></li>
                                <li><a href="ModificationProjet.php">Modifier un projet</a></li>
                                <li><a href="PostulerProjet.php">Postuler à un pojet</a></li>
                        </ul>
                </li>
                <li><a href="Informations.php">Informations / Liens</a>
                        <ul>
                                <li><a href="Informations.php">Informations et liens généraux</a></li>
                        </ul>
                </li>
                <li><a href="Modules.php">Modules</a>
                        <ul>
                                <li><a href="Modules.php">Liste des modules</a></li>
                        </ul>
                </li>
                <!--<li><a href="Enseignants.php">Enseignants</a>
                        <ul>
                                <li><a href="Enseignants.php">Liste des enseignants</a></li>
                        </ul>
                </li>-->
                <li><a href="Annuaire.php">Annuaire</a>
                        <ul>
                                <li><a href="Enseignants.php">Enseignants</a></li>
                                <li><a href="Etudiants.php">Etudiants</a></li>
                                <li><a href="Clients.php">Clients</a></li>
                                <li><a href="Contact.php">Contact administrateur</a></li>
                        </ul>
                </li>
                <li><a href="Profil.php">Mon profil</a>
                        <ul>
                                <li><a href="Profil.php">Modifications de vos informations personnelles</a></li>
                        </ul>
                </li>
                <li><a href="Connexion.php">Connexion / Inscription</a>
                        <ul>
                                <li><a href="Connexion.php">Connexion</a></li>
                                <li><a href="Inscription.php">Inscription</a></li>
                        </ul>
                </li>
            </ul>
        </nav>

        
        
        <section>
        </br></br>
        
        
        <?php

require("connect.php");

session_start();

$EleveSupp = $_POST['elevSupp'];
$lg2 = count($EleveSupp);
echo ' Vous avez supprimé :'.$lg2.' élèves: ';
for ($c = 0; $c < $lg2; $c++) {
    $EleveASupprimer = "SELECT Nom, Prenom FROM personnel WHERE IDPersonnel='$EleveSupp[$c]'";
    $req6 = mysqli_query($BDD, $EleveASupprimer)or die('Erreur SQL !<br>' . $EleveASupprimer . '<br>' . mysql_error());
    $data4 = mysqli_fetch_array($req6);

    $suppression = "DELETE FROM est WHERE IDPersonnel='$EleveSupp[$c]'";
    $suppression2 = "DELETE FROM personnel WHERE Nom='".$data4['Nom']."'";// essayer '$EleveSupp[$c]'
    $req7=mysqli_query($BDD,$suppression)or die('Erreur SQL!<br>' . $suppression . '<br>' . mysql_error());
    $req8=mysqli_query($BDD,$suppression2)or die('Erreur SQL!<br>' . $suppression2 . '<br>' . mysql_error());
echo $data4['Nom']." ".$data4['Prenom'].'<br>';
}
unset($_SESSION['eleve']);
echo '<a href="GestionEleve.php">Retour à la gestion</a>';
        ?>


            </br></br></br></br></br></br></br></br></br></br></br></br></br></br>
        </section>


        <footer>

            <p>Copyright ??? - Tous droits réservés - 
            <a href="Contact.php">Me contacter !</a></p>

        </footer>
            
        </form>
            
    </body>
</html>
