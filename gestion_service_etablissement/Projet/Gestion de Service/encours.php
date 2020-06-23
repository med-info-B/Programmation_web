<?php
    require("auth/EtreAuthentifie.php");
    $title = 'Accueil';
    include("header.php");
?> 
    <a href="<?= $pathFor['logout'] ?>" title="Logout">Deconnexion</a></br>
     <p class="center"> En cours de construction !</p>
<?php
   include("footer.php");
?>