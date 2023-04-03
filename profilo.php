<?php
include "navbar.php";

$id_utente = $_SESSION['id_utente'];
$username = $_GET['username'];
$query = "SELECT * FROM utenti WHERE username = $username";
if ($result_account = $conn->query($query)) {
  while ($row = $result_account->fetch_assoc()) {

    $id_profilo = $row['id_utente'];
if(isset($_POST['segui'])){
     $data = date("d/m/20y h:i:sa");
    $sql_follow = "INSERT INTO follower (id_utente, id_profilo, data) VALUES ($id_utente, $id_profilo, '$data')";
    $result_follow = mysqli_query($conn, $sql_follow);
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
<b>';
// Query per contare i record nella tabella
$sql_follower = "SELECT COUNT(*) AS total FROM follower WHERE id_profilo = $id_profilo";
$result_follower = $conn->query($sql_follower);

if ($result_follower->num_rows > 0) {
    // Stampa il risultato
    $row_follower = $result_follower->fetch_assoc();
    echo $row_follower["total"]; 
} else {
    echo "0";
}
echo ' follower</b>
</div>
<div class="col">
<b> 0 seguiti </b>
</div>
<div class="col">
<b> 10 spottaggi </b>
</div>
</div>
<center>
<div class="pb-4"></div>';
$sql_tasto = "SELECT FROM follower WHERE id_profilo = $id_profilo";
if ($result_tasto = $conn->query($sql_tasto)) {
  while ($row_tasto = $result_tasto->fetch_assoc()) {
      $id_utente2 = $row_tasto['id_utente'];
     if($id_utente2 == $id_utente){
         
echo 'già segui';
     } else {
echo '<form action="'; echo $_SERVER['REQUEST_URI']; echo '" method="POST">
<input type="submit" name="segui" class="btn btn-outline-success btn-pill" style="width: 10rem" value="+ SEGUI">
</form>';
}
}
}

echo '</center>


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
?>