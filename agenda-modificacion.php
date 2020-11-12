<!DOCTYPE html>
<html lang="en">
<head>
<head>
        <title>Agenda php</title>
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
</head>
<body>


<?php
    
    //Conexión al servidor y la BD mediante un archivo externo que proporciona la cadena de conexión
    require_once("conexionremota.php");

    //Si se presiona en el boton enviar
    if(isset($_POST['enviar']))
    {
        // echo "<SCRIPT type='text/javascript' language='JavaScript'> alert('Presiono enviar');</SCRIPT>";  

        //Asigna a variales los valores de los campos de formularios  
        
        $idContacto=$_POST['txtIdContacto'];
        $nombre=$_POST['txtNombre'];
        $email=$_POST['txtEmail'];
        $telefono=$_POST['txtTelefono'];      

        //(SQL) Instruccion SQL modificacion
        $consulta = "UPDATE Contactos SET nombre='$nombre',email='$email', telefono='$telefono' WHERE idContacto = $idContacto ";

        //Para que PHP envíe una consulta SQL hacia el gestor de MySQL (PHP)
        $datos= mysqli_query ($conn, $consulta);
            
        //Vuelta al listado
        echo "<SCRIPT type='text/javascript' language='JavaScript'> window.location = 'agenda-listado.php'; </SCRIPT>";	
           
    } else {

        // echo "<SCRIPT type='text/javascript' language='JavaScript'> alert('Primera vez');</SCRIPT>"; 

        $idContacto=$_GET['idContacto'];

        $consulta = "SELECT idContacto, nombre, email, telefono FROM Contactos WHERE idContacto = " . $idContacto;

        echo "<SCRIPT type='text/javascript' language='JavaScript'> alert('".$consulta."');</SCRIPT>"; 

        $datos = mysqli_query ($conn, $consulta);
        
        $valores = mysqli_fetch_array($datos);

        //Asigna a campos del formulario los valores del contacto seleccionado
        $idContacto=$valores['idContacto'];
        $nombre=$valores['nombre'];
        $email=$valores['email'];
        $telefono=$valores['telefono'];   

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
            <h1>Modificar Contacto</h1>
            </div>
        </div>

        <hr><br>

        <form action="agenda-modificacion.php" method="POST" name="agenda-modificacion">

            <!-- Campo oculto - se guarda el id para enviarlo en el postback -->
            <input id="txtIdContacto" name="txtIdContacto" type="hidden" value="<?php echo $idContacto?>">

            <div class="form-group row">
                <div class="col-8 offset-2">
                    <label for="txtNombre">Nombre</label>
                    <input value="<?php echo $nombre?>" type="text" class="form-control" id="txtNombre" name="txtNombre" placeholder="Apellido y nombre" required="true">
                </div>
            </div>        
            <div class="form-group row">
                <div class="col-8 offset-2">
                    <label for="txtEmail">Email</label>
                    <input value="<?php echo $email?>" type="email" class="form-control" id="txtEmail" name="txtEmail" placeholder="Dirección de correo electrónico" required="true">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-8 offset-2">
                    <label for="txtTelefono">Télefono</label>
                    <input value="<?php echo $telefono?>" type="text" class="form-control" id="txtTelefono" name="txtTelefono" placeholder="Teléfono" required="true">
                </div>
            </div>

            <hr>
            <br>
            <div class="form-group row">
                <div class="col-8 offset-2">
                    <input name="enviar" type="submit" id="enviar" value=" Actualizar Contacto " class="btn btn-primary"> 
                    <a href="agenda-listado.php" class="btn btn-md btn-danger" role="button">Volver</a>
                </div>
            </div>
            <br>

        </form>

    </div>
</body>
</html>

