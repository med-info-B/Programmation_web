<?php
       $title = 'home';
       include("header.php");

?>
<div class="badge badge-primary text-wrap" id ="text">
  Ici, </br>recrutez vos freelances
& trouvez vos prochaines missions
</div>
<div class="container-fluid" id="searsh" >
 <div class="row" >
  <div = "col-lg-3">
   <div class="input-group" >
    <input type="text" class="form-control" aria-label="Text input with dropdown button">
     <div class="input-group-append">
      <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Vous recherchez</button>
       <div class="dropdown-menu">
        <a class="dropdown-item" href="#"> Une Mission </a>
        <a class="dropdown-item" href="#"> Un freelance</a>
       </div>
  	 </div>
	</div>
  </div>
 </div>
</div>




<?php include("footer.php"); ?>