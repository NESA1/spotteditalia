<?php
include "navbar.php";

$id_utente = $_SESSION['id_utente'];
if(isset($_POST['submit'])){
// Percorso in cui salvare le foto caricate
$target_dir = "profili/";
// Percorso completo del file caricato
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
$target_file1 = $target_dir . basename($token);
$target_file2 = $target_dir . basename($_FILES["photo2"]["name"]);
$target_file3 = $target_dir . basename($_FILES["photo3"]["name"]);
$img_1 = "$target_file1"; 
$img_2 = "$target_file2"; 
$img_3 = "$target_file3"; 

// Variabile che tiene traccia del numero di foto caricate
$count = 0;

// Array di estensioni consentite
$allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');

if (isset($_FILES["photo1"]) && $_FILES["photo1"]["error"] == 0) {
    $count++;
    $file_extension = strtolower(pathinfo($target_file1, PATHINFO_EXTENSION));
    if (in_array($file_extension, $allowed_extensions)) {
        move_uploaded_file($_FILES["photo1"]["tmp_name"], $target_file1);
       $sql = "UPDATE utenti SET img_1 = '$img_1' WHERE id_utente = $id_utente";
       $result = mysqli_query($conn, $sql);
    } else {
        echo "<script>Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Prima immagine mancante',
            showConfirmButton: false,
            timer: 1500
          })</script>";
    }
}
if (isset($_FILES["photo2"]) && $_FILES["photo2"]["error"] == 0) {
    $count++;
    $file_extension = strtolower(pathinfo($target_file2, PATHINFO_EXTENSION));
    if (in_array($file_extension, $allowed_extensions)) {
        move_uploaded_file($_FILES["photo2"]["tmp_name"], $target_file2);
        $sql2 = "UPDATE utenti SET img_2 = '$img_2' WHERE id_utente = $id_utente";
        $result2 = mysqli_query($conn, $sql2);
    } else {
        echo "<script>Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Seconda immagine mancante',
            showConfirmButton: false,
            timer: 1500
          })</script>";
    }
}
if (isset($_FILES["photo3"]) && $_FILES["photo3"]["error"] == 0) {
    $count++;
    $file_extension = strtolower(pathinfo($target_file3, PATHINFO_EXTENSION));
    if (in_array($file_extension, $allowed_extensions)) {
        move_uploaded_file($_FILES["photo3"]["tmp_name"], $target_file3);
        $sql3 = "UPDATE utenti SET img_3 = '$img_3' WHERE id_utente = $id_utente";
        $result3 = mysqli_query($conn, $sql3);
    } else {
        echo "<script>Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Terza immagine mancante',
            showConfirmButton: false,
            timer: 1500
          })</script>";
    }
}

if ($count == 0) {
    echo "<p>Nessuna foto caricata.</p>";
}
}
?>
<script>
    $(document).ready(function() {
        $("#file-input").change(function() {
            readURL(this);
        });
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#image-preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<form method="post" action="carica_immagine.php" enctype="multipart/form-data">
    <div class="col-md-6 pl-0">
        <h6 class="text-muted mb-3">Prima foto</h6>
        <fieldset>
            <div class="custom-file w-100">
                <input type="file" accept="image/png, image/gif, image/jpeg, image/jpg" class="custom-file-input" id="photo1" name="photo1" required>
                <label class="custom-file-label" for="customFile">Choose file...</label>
            </div>
        </fieldset>
    </div>
    <div class="pb-4"></div>
    <div class="col-md-6 pl-0">
        <h6 class="text-muted mb-3">Seconda foto</h6>
        <fieldset>
            <div class="custom-file w-100">
                <input type="file" accept="image/png, image/gif, image/jpeg, image/jpg" class="custom-file-input" id="photo2" name="photo2" required>
                <label class="custom-file-label" for="customFile">Choose file...</label>
            </div>
        </fieldset>
    </div>
    <div class="pb-4"></div>
    <div class="col-md-6 pl-0">
        <h6 class="text-muted mb-3">Terza foto</h6>
        <fieldset>
            <div class="custom-file w-100">
                <input type="file" accept="image/png, image/gif, image/jpeg, image/jpg" class="custom-file-input" id="photo3" name="photo3" required>
                <label class="custom-file-label" for="customFile">Choose file...</label>
            </div>
        </fieldset>
    </div>
    <div class="pb-4"></div>
    <button type="submit" class="btn btn-success" name="submit">Carica foto</button>
</form>

<?php
include "footer.php"
?>