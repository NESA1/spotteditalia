</div>
<!-- Aggiungi questo link per caricare la libreria jQuery UI -->
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<!-- boostrapp versione 5 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

<!-- Aggiungi questo script alla fine della tua pagina HTML -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
  $(document).ready(function() {
    // Aggiungi lo zoom all'immagine con la classe "zoomable"
    $(".zoomable").draggable().resizable({
      aspectRatio: true,
      containment: "parent"
    });

    // Quando l'utente fa clic sull'immagine, la ingrandisce
    $(".zoomable").on("click", function() {
      $(this).css("z-index", "9999").css("position", "absolute").css("top", "0").css("left", "0");
    });

    // Quando l'utente fa clic sulla X, l'immagine torna alla dimensione originale
    $(".close-zoom").on("click", function() {
      $(".zoomable").css("z-index", "1").css("position", "static");
    });
  });
</script>
<div class="pb-4"></div>
<div class="pb-4"></div>
</body>

</html>