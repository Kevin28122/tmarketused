<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TMarketUsed Principal</title>
  <link rel="stylesheet" href="Views/Css/subasta.css">
  <body>
    <!-- Encabezado -->
    <header>
      <a><img src="Views/Img/Logo_TMarketUsed.png" alt="Logo Izquierdo" class="logo-left"></a>
      <h1 class="header-title">TMarketUsed</h1>
      <nav>
        <ul>
          <li><a href="../tmarketused/Index.html">Inicio</a></li>
          <li><a href="../tmarketused/catalago.php">Catalogo</a></li>
          <li><a href="../tmarketused/ayuda.php">Ayuda</a></li>
          <li>Subasta</li>
        </ul>
      </nav>
      <a href="registro.html" ><img src="Views/Img/User.jpeg" alt="Logo Derecho" class="logo-right" ></a>
    </header>
  
    <br>
<!-- Subasta -->
  <!-- ... -->
  <div class="container-title">
    <h2>Silla Gamer</h2>
  </div>
  <main>
    <div class="container-img">
      <img src="Views/Img/silla gammer.jpg" alt="imagen-producto">
    </div>
    <div class="container-info-product">
      <div class="container-price">
        <span>Se ofrece 1.878.000</span>
        <i class="fa-regular fa-chevron-right"></i>
      </div>
      <div class="container-details-product">
        <div class="from-group">
          <label for="colour">Color</label>
          <select name="colour" id="colour">
            <option disabled selected value="">Escoje una opción</option>
            <option value="blanco">Azul</option>
            <option value="según edición">Rojo</option>
            <option value="según edición">Verde</option>
          </select>
        </div>
        <div class="from-group">
          <label for="forma-pago">Forma de pago</label>
          <select name="forma-pago" id="forma-pago">
            <option disabled selected value="">Escoje una opción</option>
            <option value="Master-card">Master-card</option>
            <option value="Visa">Visa</option>
            <option value="paypal">Paypal</option>
            <option value="efectivo">Efectivo</option>
          </select>
        </div>
        <div class="from-group">
          <div class="inputedit">
            <label for="Inputnumbers1" class="form-label">Ingrese un precio mayor a los 1.878.000</label>
            <input type="number" class="form-control" id="Inputnumbers1" aria-describedby="numbersHelp">
          </div>
        </div>
        <button class="btn-clean">LIMPIAR</button>
        <button class="btn-clean">OFERTAR</button>
      </div>

      <div class="card-container">
        <div class="card-textoinfo">
          <h3>Descripción</h3>
          <p>Silla Gamer Reclinable marca El experto ofrece 1.589.000</p>
        </div>
      </div>
      



    </div>
  </main>
  
        <br>
        
 <!-- footer -->
  <!-- ... -->

    <footer class="footer">
        <div class="container">
          <div class="footer-row">
            <div class="footer-links">
              <h4>Compañia</h4>
              <ul>
                <li><a href="#">Nosotros</a></li>
                <li><a href="#">Nuestros servicios</a></li>
                <li><a href="#">Politica de privacidad</a></li>
                <li><a href="#">Afiliate</a></li>
              </ul>
            </div>
            <div class="footer-links">
              <h4>Ayuda</h4>
              <ul>
                <li><a href="#">Preguntas</a></li>
                <li><a href="#">Compras</a></li>
                <li><a href="#">Envios</a></li>
                <li><a href="#">Estatus de orden</a></li>
                <li><a href="#">Pago</a></li>
              </ul>
            </div>
            <div class="footer-links">
              <h4>Tienda</h4>
              <ul>
                <li><a href="#">Computadores</a></li>
                <li><a href="#">Consolas</a></li>
                <li><a href="#">Audifonos</a></li>
                <li><a href="#">Monitores</a></li>
              </ul>
            </div>
            <div class="footer-links">
              <h4>Siguenos</h4>
              <div class="social-link">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-linkedin"></i></a>
              </div>
            </div>
          </div>
        </div>
      </footer>

</body>
</html>
