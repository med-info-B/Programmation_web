<?php
    require("auth/EtreAuthentifie.php");
    require("db_config.php");
    $title = 'Suprimer un type de groupe';
    include("header.php");
?>
    <?php
        if(isset($_GET['a'])) {
            try 
            {
	           $bdd = new PDO($dsn, $username, $password);
            }
            catch(Exception $e)
            {
                die('Erreur : '.$e->getMessage());
            }
            }
            $donne=$_GET['a'];
            $sql = "SELECT gtid FROM gtypes 
                    WHERE gtid ='$donne' AND gtid NOT IN ( SELECT gtid FROM groupes)";
             
            $reponse1=$bdd->prepare($sql);
            $reponse1->execute();
            $donne = $reponse1->fetch();
            if(isset($donne['gtid']))
            {   $var = $donne['gtid'];
                $sql1 = "DELETE FROM gtypes WHERE gtid='$var'";
                $reponse1=$bdd->prepare($sql1);
                $reponse1->execute();
                header('Location: liste_typegroupe.php');
            }
            else
            {
                echo '<p class="center">vous pouvez pas supprimer ! il est utilisé </p>';
                echo '<p class="center"><a href="liste_typegroupe.php"> Revenir à la page précédente </a></p>';
            }
    include("footer.php");
    ?>
    
