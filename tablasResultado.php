<html>
<style>

body{
    background: linear-gradient(to right, #E0DC93 , #FFFF00)

}
</style>
    <head>
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
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        
        <div class="jumbotron">
            <div class="container">
                <h1 style="text-align: center">Tablas Simplex</h1>
            </div>
        </div>
        <div class="container">
        <?php


include_once "imprimirTabla.php";
include_once "simplex.php";

//ejecutar simplex
$objeto_simplex = new simplex();
$objeto_simplex->realizar_simplex();

    $tablas_solucion = $_SESSION['tablas_solucion'];
    $CjmZj_solucion = $_SESSION['CjmZj_solucion'];
    $Zj_solucion = $_SESSION['Zj_solucion'];

    imprimirTablas($tablas_solucion, $CjmZj_solucion, $Zj_solucion);

    $ultima_solucion = array_pop($tablas_solucion);
    //Validar si necesita solución entera 

    $solucion_entera = true; 
        for($i = 1; $i<count($ultima_solucion[0]); $i++){
            if (substr($ultima_solucion[0][$i]->variable,0,1) == "X" &&
                floor($ultima_solucion[1][$i]) != $ultima_solucion[1][$i]){
                $solucion_entera = false;
                break;
            }   
        }

        function imprimirTablas($tablas_solucion, $CjmZj_solucion, $Zj_solucion){
            $objeto_impresion = new imprimirTabla();

            for($i = 0; $i < count($tablas_solucion); $i++){
                echo $objeto_impresion->imprimirTablaSolucion($tablas_solucion[$i], $i+1, $Zj_solucion[$i], $CjmZj_solucion[$i]);
            }
        }
?>            
        </div>
        <footer style="background-color: #666666;">
            <?php
                require_once('Footer.php')
            ?>
        </footer>
    </body>
</html>
