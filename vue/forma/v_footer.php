</main>

<footer class="page-footer">
  <div class="container">
    <div class="row">
      <div class="col l6 s12">
        <h5 class="white-text">Forma</h5>
      </div>
    </div>
  </div>
  <div class="footer-copyright">
    <div class="container">
      Forma Cas M2L © 2014
      <a class="grey-text text-lighten-4 right" href="download/FormaAdministration.rar">Panel d'administration</a>
    </div>
  </div>
</footer>
</div>
<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<script>
$(document).ready(function(){
  // Activate the side menu
  $(".button-collapse").sideNav();
});

$(document).ready(function(){
  $('.parallax').parallax();
});

$(document).ready(function(){
  // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
  $('.modal-trigger').leanModal();
});
</script>
