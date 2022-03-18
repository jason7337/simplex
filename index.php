<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Metodo Simplex</title>
    </head>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@200&display=swap" rel="stylesheet">
    <body>
    <header style="background-color: #000;">
        <?php
            require_once('Header.php')
        ?>
    </header>
    <div class="container-fluid  " id="simplex" style="display: inline-block;margin-left: 5px ;
     margin-top:10px; margin-left:350px justify-content-center">

        <div class="jumbotron text-center">
        <h1>Proyecto desarrollado en PHP</h1>
        <p>Metodos de optimizacion 2021</p> 
        </div>
        
        <div style="margin-top:60px;" class="container">
        <div class="row">
            <div class="col-sm-4">
            <h3>Paso 1</h3>
            <p>Ingresar el numero de variables de la funcion objetivo y el numero de restricciones...</p>
            
            </div>
            <div class="col-sm-4">
            <h3>Paso 2</h3>
            <p>Ingresar las variables de la funcion objetivo y crear las restricciones...</p>
            
            </div>
            <div class="col-sm-4">
            <h3>Paso 3</h3>        
            <p>Pasar a obtener los resultados y las iteraciones de la funcion objetivo...</p>
            
            </div>
        </div>
        </div>

        <div style="margin-top:60px;" class="jumbotron text-center">
        <h1>Llena los campos</h1>
            <div class="row">
                <div class="col"></div>
                <div class="col"><h4 style="text-align:center;">Variables:</h4></div>
                <div style="text-align: center;" class="col"><input style="height: 35px; width: 150px; margin-top:10px; font-size: 25px" type="number" id="num_variables" min="1" max="10" /></div>
                <div class="col"></div>
            </div>

            <div class="row">
                <div class="col"></div>
                <div class="col"><h4 style="text-align:center;">Restricciones:</h4></div>
                <div style="text-align: center;" class="col"><input style="height: 35px; width: 150px; margin-top:10px; font-size: 25px" type="number" id="num_restricciones" min="1" max="100" /></div>
                <div class="col"></div>
            </div>
        </div>

        <div style="text-align: center; margin-top:60px;" class="text-center"><button style="background-color: #003366; height: 45px; width: 150px;" class="btn btn-primary btn-lg" onclick="crearCampos()">Seguir</button><hr></div>

        <form action="llenarTabla.php" method="post">
                <div id="llenar_datos_simplex" style="text-align: center; display: none; margin-top:60px;" class="jumbotron text-center">
                    <label  class="mt-5" style="font-size: 25px">Funcion Objetivo:</label>
                    <select name="tipo" class="form-select"  style="font-size: 25px">
                        <option> </option>
                        <option value="max">Maximizar</option>
                        <option value="min">Minimizar</option>
                    </select>
                    <br><br>
                    <label style="font-size: 25px">Función objetivo:</label>
                    <div id="funcion_objetivo" style="font-size: 25px"></div>
                        <br>
                        <br>
                    <label style="font-size: 25px">Restricciones:</label><br>
                    <div id="restricciones" style="font-size: 25px"></div>
                    <div class="text-center">
                    <input style="text-align: center; margin-top:60px; background-color: #003366; height: 45px; width: 150px;" class="btn btn-primary btn-lg" type="submit" id="calcular" value="Calcular"/>
                    </div>
                </div>
                <div style="margin-top:60px;" class="container"></div>
        </form>
                
        </div>

        </div>
            
        </div>
        <footer style="background-color: #666666;">
            <?php
                require_once('Footer.php')
            ?>
        </footer>
    </body>
    <script>
        function display_simplex(){
            $("#simplex").css("display", "inline-block");
            $("#hungaro").css("display", "none");
        }
        
        function display_hungaro(){
            $("#simplex").css("display", "none");
            $("#hungaro").css("display", "block");
            $("#llenar_datos_hungaro").css("display", "none");
        }
        
        function crearCamposHungaro(){
            
            $("#tabla_hungaro").html("");
            var num_variables_hungaro = parseInt($("#num_variables_hungaro").val());
            
            var tabla_hungaro = "";
            for(var i = 0; i<num_variables_hungaro; i++){
                for(var j = 0; j<num_variables_hungaro; j++){
                    tabla_hungaro += "<input style='height: 30px; width: 60px;' type='number' name='valor_hungaro"+i+j+"' />";
                }
                tabla_hungaro+= "<br>";
            }
            
            $("#llenar_datos_hungaro").css("display", "block");
            $("#llenar_datos_hungaro").append("<input type='hidden' name='num_variables' value='"+num_variables_hungaro+"'/>");
            $("#tabla_hungaro").append(tabla_hungaro);
            
        }
        
        function crearCampos(){
            $("#llenar_datos_simplex").css("display", "block");
            $("#llenar_datos_hungaro").css("display", "none");
            $("#funcion_objetivo").html("");
            $("#restricciones").html("");
            var num_variables = parseInt($("#num_variables").val());
            var num_restricciones = parseInt($("#num_restricciones").val());

            var num1  = document.getElementById("num_variables").value;
            var num2 =  document.getElementById("num_restricciones").value;
            
            var funcion_objetivo = "";
            var restricciones = "";

           

            if(num1 ==null ||num1.length==0 || num2  ==null ||  num2.length==0){
                alert("no  debe de  estar los campos  vacios"); 
                document.location = "index.php";
            }else{
                
                for(var i = 0; i<num_variables; i++){
                var num = i+1;
                funcion_objetivo += "<input style='height: 30px; width: 60px;' type='number' name='valor_variable"+i+"' /> X"+num;
                if(i < num_variables-1)
                    funcion_objetivo += "+ ";
                else
                    funcion_objetivo += "<br>";
            }
            for(var i = 0; i<num_restricciones; i++){
                for(var j = 0; j<num_variables; j++){
                    var num = j+1;
                    
                    restricciones += "<input style='height: 30px; width: 60px;' type='number' name='valor_restriccion"+i+j+"' /> X"+num+" ";
                    if(j < num_variables-1)
                        restricciones += "+ ";
                        
                    else
                        restricciones += "<select style='height: 30px; width: 60px;' name='comparador"+i+"'>"+
                            "<option value='menor_igual'><=</option>"+
                            "<option value='mayor_igual'>>=</option>"+
                            "<option value='igual'>=</option>"+
                                "</select> <input style='height: 30px; width: 60px;' type='number' name='resultado_restriccion"+i+"' /><br>";
                    
                    }
            }

            
            
            
            $("#funcion_objetivo").append(funcion_objetivo);
            $("#restricciones").append(restricciones);
            $("#tabla").css("display","block");
           
            $("#restricciones").append("<input type='hidden' name='num_restricciones' value='"+num_restricciones+"' />");
            $("#restricciones").append("<input type='hidden' name='num_variables' value='"+num_variables+"' />");
           
        }
}
    </script>
    
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    
    
   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script>
         $(document).ready(function(){
            $(".jumbotron").css("margin-bottom", "0px");
        });
        </script>
</html>