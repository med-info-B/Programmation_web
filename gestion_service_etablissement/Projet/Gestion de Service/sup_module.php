<?php
    require("auth/EtreAuthentifie.php");
    require("db_config.php");
    $title = 'Suprimer un module';
    include("header.php");
?>
    <?php
        if(isset($_GET['idA'])) {
            try 
            {
	           $bdd = new PDO($dsn, $username, $password);
            }
            catch(Exception $e)
            {
                die('Erreur : '.$e->getMessage());
            }
            }
            $donne=$_GET['idA'];
             
            $sql1 = "DELETE FROM modules WHERE mid='$donne'";
            $reponse1=$bdd->prepare($sql1);
            $reponse1->execute();
            header('Location: liste_module.php');
    include("footer.php");
    ?>
    
