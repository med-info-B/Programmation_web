<?php 
  
     require_once('../Vue/Users/ViewInscription.php');
     if((!empty($_POST['Login'])) && (!empty($_POST['passWord1'])) && (!empty($_POST['prenom']))
     || (!empty($_POST['nom'])) && (!empty($_POST['statu'])) && (!empty($_POST['adresse'])) 
        (!empty($_POST['pays'])) && (!empty($_POST['ville']))){
            if($_POST['passWord1'] == $_POST['passWord2']){
              require('../Model/model.php');
             $cond =   setDataCompte($_POST['Login'],$_POST['passWord1']);
             if($cond == false){
               // include('../Vue/Users/ViewInscription.php');
             }
            else {
                include('../Vue/Users/Freelancers/ViewHome.php');
            }
                
             
        }
        }

?>

    