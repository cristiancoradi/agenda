<!DOCTYPE html>
<html lang="en">
<head>
        <title>Altas Redes</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--Bootstrap-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <!--Font Awesome-->
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
        <!--Hojas de Estilo Personal-->
        <link rel="stylesheet" type="text/css" href="css\style.css">

    </head>
<body>

<?php
    
    //Conexión al servidor y la BD mediante un archivo externo que proporciona la cadena de conexión
    require_once("conexionremota.php");

    //Si se presiona en el boton enviar
    if(isset($_POST['enviar']))
    {

            //Asigna a variales los valores de los campos de formularios  

            $idContacto=$_POST['idContacto'];
            $nombreRed=$_POST['nombreRed'];
            $enlaceRed=$_POST['enlaceRed'];



            //(SQL) Instruccion SQL Alta

            $consulta = "INSERT INTO redes ";
            $consulta .= "(idContacto, nombreRed, enlaceRed) ";
            $consulta .= "VALUES('$idContacto','$nombreRed','$enlaceRed') ";

            //Para que PHP envíe una consulta SQL hacia el gestor de MySQL (PHP)
            $datos= mysqli_query ($conn, $consulta);
                

            
            //Vuelta al listado
            echo "<SCRIPT type='text/javascript' language='JavaScript'> window.location = 'agenda-listado.php'; </SCRIPT>";	
           
    }

    else {
        $idContacto=$_GET['idContacto'];
    }

    mysqli_close($conn);

?>

    <!-- BARRA DE NAVEGACION -->
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <a class="navbar-brand" href="index.html">AGENDA
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="agenda-listado.php">Home</a>
                </li>                
                <li class="nav-item">
                    <a class="nav-link active" href="agenda-alta.php">Alta</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- Comienza el Contenedor Principal -->
    <div class="container">
        
        <div class="row">
            <div class="col-12">
            <br>
            <h1>Alta Red</h1>
            </div>
        </div>

        <hr><br>

        <form action="agenda-alta-redes.php" method="POST" name="agenda-alta-redes">

            <div class="form-group row">
                <div class="col-8 offset-2">
                    <label for="nombreRed">nombre de la Red</label>
                    <input type="text" class="form-control" id="nombreRed" name="nombreRed" placeholder="Nombre de la red" required="true">
                </div>
            </div>        

            <div class="form-group row">
                <div class="col-8 offset-2">
                    <label for="enlaceRed">enlace a la Red</label>
                    <input type="text" class="form-control" id="enlaceRed" name="enlaceRed" placeholder="URL de la red" required="true">
                </div>
            </div>

            <hr>
            <br>
            <div class="form-group row">
                <div class="col-8 offset-2">
                    <input id="idContacto" name="idContacto" type="hidden" value="<?php echo $idContacto?>">
                    <input name="enviar" type="submit" id="enviar" value=" Añadir Red " class="btn btn-primary"> 
                    <a href="agenda-listado.php" class="btn btn-md btn-danger" role="button">Volver</a>
                </div>
            </div>
            <br>

        </form>

    </div>
</body>
</html>

