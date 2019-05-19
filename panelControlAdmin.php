<!DOCTYPE html>
<html>
<head>
	<title>Panel de Control</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
	<header>
        <div class="container">
            <a href="listado.php"><img src="img/logos/HSH-Complete.svg" class="img-fluid" alt="Logotipo de homeSwitchHome"></a>
            <br><br>  
        </div>
    </header>

    <h2>Bienvenido Administrador</h2>
    <h6>¿Que desea hacer hoy?</h6>
    <br>
    <div class="centrar">
		 <a class="btn btn-success" href="subir.php">Subir Nueva Propiedad</a>
           <br><br>
         <a class="btn btn-warning" href="listado.php">Modificar Propiedad</a>
           <br><br>
         <a class="btn btn-danger" href="listado.php">Eliminar Propiedad</a>
           <br><br>
         <a  class="btn btn-info" href="listado.php">Iniciar Subasta</a>
           <br><br>
    </div>
    <div class="centrar">
		Copyright &copy; 2019 &mdash; Guns 'n Coders 
	</div>
</body>
</html>