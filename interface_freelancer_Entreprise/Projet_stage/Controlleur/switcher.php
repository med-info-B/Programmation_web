<?php
      require("../auth/EtreAuthentifie.php");  
             
    switch( $idm->getRole()){
        case 'admin' :       include('../Vue/Users/header.php');
        break;
        case 'user'  :       include('../Vue/Users/header.php');
        break;
        default :  echo "klkj"; 
        break;
    }
// ?>

