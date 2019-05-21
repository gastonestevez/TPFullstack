<?php include 'include/head.php'?>
<body>
<?php include 'include/navegacion.php'?>

 <section class="general" id="Seccionregistrarse">
  <div class="registro">
      <img src="img/img_2929.jpg" alt="logo">

      <div class="titulos">
        <h2>Mi cuenta en <strong>BIGFASHION</strong></h2>
        <h3>Registrate</h3>
        <h4>y enterate de nuestras novedades y Ofertas!</h4>
      </div>

        <form class="formRegistro"  action="success.php" method="post">
          <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputNombre">Nombre</label>
                <input id="nombre" type="text" class="form-control" name="nombre" placeholder="Ingresa tu nombre">
              </div>
              <div class="form-group col-md-6">
                <label for="inputApellido">Apellido</label>
                <input id="apellido" type="text" class="form-control" name="apellido" placeholder="Ingresa tu Apellido">
              </div>
          </div>
          <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputEmail">E-mail</label>
                <input id="mail" type="email" name="mail" class="form-control" placeholder="Ingresa tu e-mail">
              </div>
              <div class="form-group col-md-6">
                <label for="inputUsuario">Usuario</label>
                <input id="nombre" type="text" class="form-control" name="usuario" placeholder="Ingresa tu usuario">
              </div>
          </div>
              <div class="form-group">
                <label for="inputCumple">Fecha de nacimiento</label>
                <input id="fechanacimiento" type="date" name="fechanacimiento" class="form-control" >
              </div>
              <div class="form-group">
              <label for="inputProvincia">Provincia</label>
                <select class="form-control" name="provincia" id="provincia">
                  <option value="" >Selecciona tu provincia</option>
                  <option value="Buenos Aires">Bs. As.</option>
                  <option value="Catamarca">Catamarca</option>
                  <option value="Chaco">Chaco</option>
                  <option value="Chubut">Chubut</option>
                  <option value="Cordoba">Cordoba</option>
                  <option value="Corrientes">Corrientes</option>
                  <option value="Entre Rios">Entre Rios</option>
                  <option value="Formosa">Formosa</option>
                  <option value="Jujuy">Jujuy</option>
                  <option value="La Pampa">La Pampa</option>
                  <option value="La Rioja">La Rioja</option>
                  <option value="Mendoza">Mendoza</option>
                  <option value="Misiones">Misiones</option>
                  <option value="Neuquen">Neuquen</option>
                  <option value="Rio Negro">Rio Negro</option>
                  <option value="Salta">Salta</option>
                  <option value="San Juan">San Juan</option>
                  <option value="San Luis">San Luis</option>
                  <option value="Santa Cruz">Santa Cruz</option>
                  <option value="Santa Fe">Santa Fe</option>
                  <option value="Sgo. del Estero">Sgo. del Estero</option>
                  <option value="Tierra del Fuego">Tierra del Fuego</option>
                  <option value="Tucuman">Tucuman</option>
                </select>
              </div>
              <label for="avatarImagen">Carga tu avatar</label>
              
              <div class="custom-file">
              
              <input class="custom-file-input" type="file" id="customFile">
              <label class="custom-file-label" for="customFile"></label>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputPassword">Contraseña</label>
                  <input id="pass" class="form-control" type="password" name="pass" value>
                </div>
                <div class="form-group col-md-6">
                  <label>Ingresa tu contraseña nuevamente</label>
                  <input id="passconf" class="form-control" type="password" name="passconf" value>
                </div>
              </div>
              <div class="form-check">
                <input type="checkbox" class="form-check-input" name="novedades" value="">
                <label for="novedades" class="form-check-label">Aceptas términos y condicoines de <strong>BIG FASHION</strong>? </label>
              </div>
                <button class="btn btn-dark d-block mx-auto mt-4 " type="submit" name="resgistro">Registrarme</button>
        </form>
    </div>
  </div>
</section>
</body>

<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>