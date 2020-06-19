<?php 



   function dbConnect(){
    $hostname = "localhost";
    $dbname = "stage";
    $username = "root";
    $password = "123456";
    $dsn = "mysql:host=$hostname;dbname=$dbname;charset=utf8";
    try{
        $db = new PDO($dsn, $username, $password);
        return $db;
    }
    catch(Exception $e){
        die('Erreur : '.$e->getMessage());
    }
   }

   function setDataCompte($log, $pwd)
   {   
       $pass_hash= password_hash($pwd, PASSWORD_DEFAULT);
       $db = dbConnect();    
       $sql  = "INSERT INTO users(logine,mdp)  VALUE(?, ?)";
       $compt = $db -> prepare($sql);
       $ajout = $compt -> execute(array($log, $pass_hash));
       return $ajout;
   }

   function lastKey(){
    $db = dbConnect();
    $reponse = $db->prepare("SELECT uid FROM users ORDER BY uid DESC LIMIT 1");
    $reponse->execute(array());
    if($donne = $reponse -> fetch())
        return $donne['uid'];
    }
        
   

    

 


?>

 






       