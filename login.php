<?php
include "navbar.php";
if (isset($_POST['submit'])) {
  $email = $_POST['email'];
  $password = md5($_POST['password']);
  $ip = $_SERVER['REMOTE_ADDR'];
  $sql = "SELECT * FROM utenti WHERE email='$email' AND password='$password'";
  $result = mysqli_query($conn, $sql);
  if ($result->num_rows > 0) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['id_utente'] = $row['id_utente'];
    //$id_utente = $_SESSION['id_utente'];
    //$query = "UPDATE utenti SET ip = $ip WHERE id_utente = $id_utente";
    //$result2 = mysqli_query($conn, $query);

    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">×</span>
</button>
<i class="fa fa-check"></i>
<strong>Yay!</strong> Hai effettuato il login al tuo account!
</div>';
  } else {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">×</span>
    </button>
    <i class="fa fa-wrong"></i>
    <strong>Oh no!</strong> Credenziali errate!
  </div>';
  }
}
?>

<style>
  #input-container input {
    opacity: 1;
    transition: opacity 0.5s ease-out, transform 0.5s ease-out;
  }

  #input-container input.hide {
    opacity: 0;
    transform: translateX(100%);
  }
</style>

<script>
  var currentInput = 1;
  var totalInputs = 2;


  function showPrevInput() {
    var inputContainer = document.getElementById("input-container");
    var currentInputEl = document.getElementById("input-" + currentInput);
    var prevInputEl = document.getElementById("input-" + (currentInput - 1));
    if (currentInput > 1) {
      currentInputEl.classList.add("hide");
      setTimeout(function() {
        currentInputEl.style.display = "none";
        currentInputEl.classList.remove("hide");
        prevInputEl.style.display = "block";
        currentInput = currentInput - 1;
        var btnAvanti = document.getElementById("btn-avanti");
        btnAvanti.innerHTML = "Avanti";
        btnAvanti.classList.remove("btn-success");
        btnAvanti.classList.add("btn-light");
        btnAvanti.setAttribute("type", "button");
      }, 500);
    }
  }

  function showNextInput() {
    var inputContainer = document.getElementById("input-container");
    var currentInputEl = document.getElementById("input-" + currentInput);
    var nextInputEl = document.getElementById("input-" + (currentInput + 1));
    var btnAvanti = document.getElementById("btn-avanti");
    if (currentInput <= totalInputs) {
      currentInputEl.classList.add("hide");
      setTimeout(function() {
        currentInputEl.style.display = "none";
        currentInputEl.classList.remove("hide");
        if (nextInputEl) {
          nextInputEl.style.display = "block";
          currentInput = currentInput + 1;
          if (currentInput === totalInputs) {
            btnAvanti.innerHTML = "Accedi";
            btnAvanti.classList.remove("btn-light");
            btnAvanti.classList.add("btn-success");
            btnAvanti.setAttribute("type", "submit");
            btnAvanti.setAttribute("name", "submit");
          }
        } else {
          currentInput = 1;
          inputContainer.firstElementChild.style.display = "block";
          btnAvanti.innerHTML = "Avanti";
          btnAvanti.classList.remove("btn-success");
          btnAvanti.classList.add("btn-light");
          btnAvanti.setAttribute("type", "button");

        }
      }, 500);
    }
  }
</script>

<center>
  <form action="login.php" method="POST">
    <div id="input-container">
      <input type="email" name="email" id="input-1" class="form-control" placeholder="Email" required>
      <input type="password" name="password" id="input-2" class="form-control" placeholder="Password" onkeyup="showLastChar()" style="display: none;" required>
      <div class="pb-3"></div>
      <button type="button" onclick="showPrevInput()" class="btn btn-pill btn-danger">Indietro</button>
      <button type="button" id="btn-avanti" onclick="showNextInput()" class="btn btn-pill btn-light">Avanti</button>
    </div>
    <hr>
    <p>Sei non hai un account,</p><a href="benvenuto.php"><b>creane uno!</b></a>
  </form>
</center>

<?php
include "footer.php";
?>