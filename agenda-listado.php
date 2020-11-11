<!DOCTYPE html>
<html lang="en">
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

        <?php
            // Conexión al servidor y la BD mediante un archivo externo que proporciona la cadena de conexión
            require_once("conexionremota.php");
        ?>
    </head>
    <body>
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
                        <a class="nav-link active" href="agenda-listado.php">Home</a>
                    </li>                
                    <li class="nav-item">
                        <a class="nav-link" href="agenda-alta.php">Alta</a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- Comienza el Contenedor Principal -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <br>
                    <h1>Contactos</h1>
                    <?php
                    // Solicitamos al gestor de MySQL que entregue aquellos datos que queremos mostrar en nuestras páginas. (SQL)
                        $consulta = "SELECT idContacto, nombre, email, telefono FROM contactos";
                        $result = $conn->query($consulta);  // Acá realmente se hace la consulta, result es un conjunto de filas
                        // Si la cantidad de filas es mayor que 0 muestra
                        if ($result->num_rows > 0) {
                    ?>
                    <table class="table">
                        <thead>
                            <tr>
                            <th>Nombre</th>
                            <th>eMail</th>
                            <th>telefono</th>
                            <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                // Datos de salida de cada fila
                                while($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                        echo "<td>" . $row["nombre"] . "</td>"; 
                                        echo "<td>" . $row["email"] . "</td>";
                                        echo "<td>" . $row["telefono"] . "</td>";
                                        echo "<td><a href='agenda-modificacion.php?idcontacto=". $row["idcontacto"]."'>Editar</a>";
                                        echo "&nbsp;";
                                        echo "<a href='agenda-borrar.php?idcontacto=". $row["idcontacto"]."'>Borrar</a></td>";
                                    echo "</tr>";
                                    }
                                }else {
                                        echo "La búsqueda no ha dado resultados";
                                    }
                                mysqli_close($conn);
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <i class="fa fa-user-times"></i>
        <i class="fas fa-user-times"></i>
    </body>
</html>

<i class="fa fa-user-times"></i>
