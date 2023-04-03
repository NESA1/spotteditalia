<?php
include "navbar.php";
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5(trim($_POST['password']));
    $password2 = md5(trim($_POST['conferma_password']));
    $ip = $_SERVER['REMOTE_ADDR'];
	function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
    $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
    }
    $token = md5(trim(generateRandomString()));
    $data_account = date("d/m/20y h:i:sa");

   if($password == $password2){
echo '';   
} else {
    echo '<div class="alert alert-danger" role="alert">
    Le password che hai inserito non corrispondono <a href="https://spotteditalia.eu/login" class="alert-link">Riprova</a>
  </div>';
    exit;
}

    $sql_controllo_credenziali = "SELECT * FROM utenti WHERE email='$email' or username='$username'";
    $result_controllo_credenziali = mysqli_query($conn, $sql_controllo_credenziali);
    if (!$result_controllo_credenziali) {
    die("Errore nella query: " . mysqli_error($conn));
}
    if (!$result_controllo_credenziali->num_rows > 0) {
            $sql = "INSERT INTO utenti (username, email, password, data_creazione, ip, lingua, token, nuovo) VALUES ('$username', '$email', '$password', '$data_account', '$ip', 'it', '$token', 1)";
            $result = mysqli_query($conn, $sql);
            if($result){
             header('location: https://spotteditalia.eu/carica_immagine');
              $sql_login = "SELECT * FROM utenti WHERE email='$email' AND password='$password'";
                $result_login = mysqli_query($conn, $sql_login);
            if ($result_login->num_rows > 0) {
            $row = mysqli_fetch_assoc($result_login);
            $_SESSION['id_utente'] = $row['id_utente'];
            $_SESSION['img'] = 1;
  die("Errore nella query: " . mysqli_error($conn));
          }
        
            }
            else {
            echo '<div class="alert alert-danger" role="alert">
             <a href="https://spotteditalia.eu/login" class="alert-link">ERRORE</a>
          </div>';
            //die("Errore nella query: " . mysqli_error($conn));
            exit;  
            }
    } else {
            echo '<div class="alert alert-danger" role="alert">
             <a href="https://spotteditalia.eu/login" class="alert-link">Credenziali (email o username) già esistenti!</a>
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
var totalInputs = 4;

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
          btnAvanti.innerHTML = "Registrati";
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
  <form action="benvenuto.php" method="POST">
    <div id="input-container">
      <input type="text" name="username" id="input-1" class="form-control" placeholder="Username Instagram" required>
      <input type="email" name="email" id="input-2" class="form-control" placeholder="Email" style="display: none;" required>
      <input type="password" name="password" id="input-3" class="form-control" placeholder="Password" style="display: none;" required>
      <input type="password" name="conferma_password" id="input-4" class="form-control" placeholder="Conferma password" style="display: none;" required>
      <div class="pb-3"></div>
      <button type="button" onclick="showPrevInput()" class="btn btn-pill btn-danger">Indietro</button>
      <button type="button" id="btn-avanti" onclick="showNextInput()" class="btn btn-pill btn-light">Avanti</button>
    </div>
  </form>
</center>
<?php
include "footer.php";
?>
