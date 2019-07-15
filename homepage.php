
<html>
<?php include('modalBienvenida.php'); ?>
<main class="py-4 tarjetaPrincipal">
<div class="container">
  <div class="row">
    <div class="col-sm-12">
        <div id="carouselExampleControls" class="carousel slide car" data-ride="carousel">
          <div class="carousel-inner">

            <div class="carousel-item active">
              <img class="d-block img-fluid " src="img/miko2019.jpg" alt="First slide">
            </div>

            <div class="carousel-item">
              <img class="d-block img-fluid" src="img/2.jpg" alt="Second slide">
            </div>

            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>

            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>

          </div>
        </div>
      </div>
  </div>
</div>
    </main>
      <footer class="main-footer">
        <div class="foot-service">
          <i class="fas fa-truck"></i>
          <h4>Envíos gratis</h4>
          <p>Envíos gratis en las compras superiores a $2000.</p>
        </div>
        <div class="foot-service">
          <i class="fas fa-store-alt"></i>
          <h4>Pick up store</h4>
          <p>Compra online y retirá tu compra por nuestro local.</p>
        </div>
        <div class="foot-service">
          <i class="fas fa-undo-alt"></i>
          <h4>Cambios gratis</h4>
          <p>Tenés 30 días para realizar cambios.</p>
        
        </div>
  		</footer>
      </html>

<script>
  $(document).ready(function(){
    <?php
      if($_SESSION['registrado'] === true){
        echo "$('#gracias').modal('show');";
        $_SESSION['registrado'] = false;
      }
    ?>
  });
</script>