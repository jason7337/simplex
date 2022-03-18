<!DOCTYPE html>
<html lang="en">
<head>
  <title>Cabezera</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>
  /* Make the image fully responsive */
  .carousel-inner img {
    width: 100%;
    height: 100%;
  }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="index.php">Inicio</a>
    </li>
    <li class="nav-item">
      <a class="nav-link">|</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="https://www.google.com/">Manual de usuario</a>
    </li>
  </ul>
</nav>

<div id="demo" class="carousel slide" data-ride="carousel">
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  <div class="carousel-inner">
    <div style="text-align: center;" class="carousel-item active">
      <img src="finanzas3.jpg" alt="Los Angeles" style="height: 450px; width: 750px;">
      <div class="carousel-caption">
        <h1 style =  "color:#000"><b>Metodo Simplex</b></h1>
        <p style =  "color:#000">Resuelve problemas con el metodo simplex ahora</p>
      </div>   
    </div>
    <div style="text-align: center;" class="carousel-item">
    <img src="finanzas.jpg" alt="Los Angeles" style="height: 450px; width: 850px;">
      <div class="carousel-caption">
        <h3 style =  "color:#000"><b>Maximiza tus procesos</b></h3>
        <p style =  "color:#000">No hay como Maximizar la produccion en tu empreza</p>
      </div>   
    </div>
    <div style="text-align: center;" class="carousel-item">
    <img src="finanzas2.jpg" alt="Los Angeles" style="height: 450px; width: 750px;">
      <div class="carousel-caption">
        <h3 style =  "color:#000"><b>Minimiza tus costsos</b></h3>
        <p style =  "color:#000">Es muy bueno buscar Minimizar tus gastos y costos en tus negocios</p>
      </div>   
    </div>
  </div>
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>

</body>
</html>