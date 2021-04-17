<?php 
  include ("../../config/databases.php");
  //include ("../../models/ExpedienteModel.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!---BOOSTRAP------->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="../includes/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <script src="https://kit.fontawesome.com/6d0034a111.js" crossorigin="anonymous"></script>
    
<body >
<nav class="navbar navbar-dark bg-dark">
 <a href="index.php" class="navbar-brand">Crea un Expediente</a>
 <a href="../inicio/index.php" class="navbar-brand">inicio</a>
</nav>

<div class="container p-5 h-150 " style="width: 40rem;">
    <div class="col-md-7">
    <form>
    <div align="center"><img src="../images/user.png" width="50" height="50"></div>
  <div class="mb-6">
  
    <label for="exampleInputEmail1" class="form-label">Usuario:</label>
    <input type="text" class="form-control" name="usuario" placeholder="Usuario">
   </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" nama="password" placeholder="Password">
  </div>
 
  <div align="center">
  <button type="submit" class="btn btn-primary" >Sign in</button></div>
</form>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/c658240a4e.js" crossorigin="anonymous"></script>
</body>
</html>