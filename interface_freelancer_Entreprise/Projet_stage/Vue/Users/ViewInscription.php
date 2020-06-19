<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style>
       #bodyIn{
          width : 50%;
          margin-top : 23px;
          height:   40%;
          border : solid;
          

        }
       #inputZip{
        width : 13em;
       }

  
    </style>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  </head>
  <body>
     <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item">
        <a class="nav-link active"  href="../index.php"  > Home </a>
      </li>
    </ul>
    <div class="container-fluid" id = "bodyIn">
      <form method="POST" >
       <div class="form-row">
          <div class="form-group col-md-6">
            <label for="login"> Login </label>
            <input type="text" name = "Login" class="form-control" id="login">
          </div>
       </div>
       <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputPassword4"> Mot de passe </label>
          <input type="password" name = "passWord1" class="form-control" id="inputPassword4">
        </div>
        </div>
        <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputPassword4"> confirmation </label>
          <input type="password" name = "passWord2" class="form-control" id="inputPassword4">
        </div>
        </div>
        <div class="form-row">
       <div class="form-group col-md-6">
        <label for="prenom"> Prénom </label>
        <input type="text" name ="prenom" class="form-control" id="prenom" placeholder="exp : Mohammed or jean ...">
       </div>
       </div>
       <div class="form-row">
       <div class="form-group col-md-6">
        <label for="non"> Nom </label>
        <input type="text" name="nom" class="form-control" id="non" placeholder="your family name ">
       </div>
       </div>
       <div class="form-row">
       <div class="form-group col-md-6">
        <label for="tel"> Telle  </label>
        <input type="tel" name="tel" class="form-control" id="tel" placeholder=" exp : 07 XX XX XX XX">
       </div>
       </div>
       <div class="form-row">
       <div class="form-group col-md-19">
        <label for="inputState"> Statue </label>
          <select id="inputState" name = "statu" class="form-control">
            <option selected> </option>
              <option> Auto-entrepneur </option>
              <option> ... </option>
            </select>
       </div>
       </div>
       <div class="form-row">
       <div class="form-group col-md-6">
        <label for="adresse"> Address  </label>
        <input type="text" name = "adresse" class="form-control" id="adresse" placeholder=" exp : 46 rue de la ferme">
       </div>
        <div class="form-row">
       <div class="form-group col-md-19">
        <label for="pays">Pays</label>
          <select id="pays"  name ="pays" class="form-control">
            <option selected>Pays...</option>
              <option>France </option>
              <option> Maroc </option>
            </select>
       </div>
       </div>
       <div class="form-group col-md-2">
        <label for="ville"> Ville </label>
        <input type="text" name ="ville" class="form-control" id="ville"   placeholder=" 94210 or commune">
       </div>
       </div>
      <button type="submit" class="btn btn-primary"> Valider </button>
    </form>    
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <?php include("../Vue/footer.php"); ?>