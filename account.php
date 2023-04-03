<?php
include "navbar.php";
if(isset($_SESSION['id_utente'])){
    echo '';
} else {
    header('location: https://spotteditalia.eu/login');
}
$id_utente = $_SESSION['id_utente'];
$query = "SELECT * FROM utenti WHERE id_utente = $id_utente";
if ($result_account = $conn->query($query)) {
  while ($row = $result_account->fetch_assoc()) {
if(isset($_POST['modifica'])){
    $username = $_POST['username'];

    $sql_controllo_credenziali = "SELECT * FROM utenti WHERE username='$username'";
    $result_controllo_credenziali = mysqli_query($conn, $sql_controllo_credenziali);
    if (!$result_controllo_credenziali) {
    die("Errore nella query: " . mysqli_error($conn));
}
    if (!$result_controllo_credenziali->num_rows > 0) {
$modifica = "UPDATE utenti SET username = '$username' WHERE id_utente = $id_utente";
$result_modifica = mysqli_query($conn, $modifica);
header('location: https://spotteditalia.eu/account');
} else {
     echo '<div class="alert alert-danger" role="alert">
    L\'username che vuoi utilizzare è già in uso
  </div>';
}
}

    $img1 = $row['img_1'];
    echo '<style>

    .row {
  display: flex;
  flex-wrap: wrap;
}

.col-sm-4 {
  flex: 1;
}
.modal{
  height: 100vh;
  width: 100vw;
  object-fit: cover;
  background-color: rgba(0, 0, 0, 0.6);

}
img {
  max-width: 854px;
  max-height: 480px;
  object-fit: 10;
  border-width: 10rem !important;
}
body{
  color: var(--light) !important; 
}
</style>
<script>
function username(){
    Swal.fire({
  title: \'<strong style="color: var(--dark) !important">Modifica il tuo username di <u>INSTAGRAM</u></strong>\',
      icon: \'success\',
  html:
    \'<form action="account" method="POST"> \' +
    \'<input type="text" name="username" class="form-control" placeholder="Modifica username di instagram">\' +
    \' <div class="pb-4"></div> \' +
    \' <input type="submit" name="modifica" class="btn btn-success value="Modifica"> \' +
    \' <style> .swal2-confirm{ display: none !important}</style> \' +
    \'</form>\',
  showCloseButton: true,
  showCancelButton: false,
  focusConfirm: false,
 
})
}
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<div class="modal" id="myModal">
  <div class="modal-dialog">
        <button type="button" class="close" data-dismiss="modal" aria-label="Chiudi">
          <span aria-hidden="true">&times;</span>
        </button>
     
      <div class="modal-body">
      <div class="pb-4"></div>
      <div class="pb-4"></div>
      <div class="pb-4"></div>
      <div class="pb-4"></div>
      <div class="pb-4"></div>
      <center>
      <img src="' . $row['img_1'] . '" alt="Immagine 1" class="rounded border border-white" style=" transform: scale(1.5);">
      </center>

      </div>
  
</div>
</div>
<div class="modal" id="myModal2">
  <div class="modal-dialog">
        <button type="button" class="close" data-dismiss="modal" aria-label="Chiudi">
          <span aria-hidden="true">&times;</span>
        </button>
     
      <div class="modal-body">
      <div class="pb-4"></div>
      <div class="pb-4"></div>
      <div class="pb-4"></div>
      <div class="pb-4"></div>
      <div class="pb-4"></div>
      <center>
      <img src="' . $row['img_2'] . '" alt="Immagine 1" class="rounded border border-white" style=" transform: scale(1.5);">
      </center>

      </div>
  
</div>
</div>
<div class="modal" id="myModal3">
  <div class="modal-dialog">
        <button type="button" class="close" data-dismiss="modal" aria-label="Chiudi">
          <span aria-hidden="true">&times;</span>
        </button>
     
      <div class="modal-body">
      <div class="pb-4"></div>
      <div class="pb-4"></div>
      <div class="pb-4"></div>
      <div class="pb-4"></div>
      <div class="pb-4"></div>
      <center>
      <img src="' . $row['img_3'] . '" alt="Immagine 1" class="rounded border border-white" style=" transform: scale(1.5);">
      </center>

      </div>
  
</div>
</div>
<div class="row">
<h2>' . $row['username'] . '</h2><div class="ml-3"></div><h5><span class="badge bg-primary">NUOVO</span></h5>
</div>
<div class="row">
<div class="d-flex justify-content-between">
<div class="col-4">
<a data-toggle="modal" data-target="#myModal">
   
<img src="' . $row['img_1'] . '" alt="Immagine 1" class="img-fluid rounded border border-white border-5">
</a>
    </div>
  <div class="col-sm-4">
  <a data-toggle="modal" data-target="#myModal2">
    <img src="' . $row['img_2'] . '" alt="Immagine 2" class="img-fluid rounded border border-white border-5">
    </a>
  </div>
  <div class="col-sm-4">
  <a data-toggle="modal" data-target="#myModal3">
    <img src="' . $row['img_3'] . '" alt="Immagine 3" class="img-fluid rounded border border-white border-5">
  </a>
    </div>
  </div>
  </div>
  <div class="pb-4"></div>
<div class="row">
<div class="col">
<b> 104 follower </b>
</div>
<div class="col">
<b> 0 seguiti </b>
</div>
<div class="col">
<b> 10 spottaggi </b>
</div>
</div>
<center>
<div class="pb-4"></div>
<div class="dropdown">
  <button class="btn btn-outline-primary btn-pill dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
   Modifica account
  </button>
  <ul class="dropdown-menu">
    <li class="dropdown-item" onclick="username()">Modifica username</li>
    <li><a class="dropdown-item" href="https://spotteditalia.eu/cambia_immagine">Cambia immagini di profilo</a></li>
    <li><a class="dropdown-item" href="#">Something else here</a></li>
  </ul>
</div>
</center>


<style>
  #image {
    max-width: 100%;
  }

  .preview {
    width: 100%;
    height: 0;
    padding-bottom: 56.25%; /* Rapporto di aspetto 9:16 */
    background-color: #eee;
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    margin-top: 20px;
  }
</style>';
  }
  $result_account->free();
}

include "footer.php";
