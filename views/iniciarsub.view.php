<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mostrar</title>
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
    <script src="js/subir.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/validate.js/0.12.0/validate.min.js"></script>
</head>
<body>
    <header>
        <div class="container">
            <a href="listado.php"><img src="img/logos/HSH-Complete.svg" class="img-fluid" alt="Logotipo de homeSwitchHome"></a>
            <br><br>  
        </div>
    </header>

<div class="container">

    <form action="" class="formularioSubir" method="post" enctype="multipart/form-data" id="subasta"> 
        <h4 class="card-header">Inciar Subasta</h4> 
        <br><br> 

        <label for="fecha">Fecha a Subastar</label>
        <input class="form-control form-control-lg" type="date" id="fecha" name="fecha">
        <br><br>

        <label for="preciobase">Importe Minimo</label>
        <input class="form-control form-control-lg" type="number" id="preciobase" name="preciobase">
        <br><br>

        <label for="inicio">Fecha de Inicio de Subasta</label>
        <input class="form-control form-control-lg" type="date" id="inicio" name="inicio">
        <br><br>

        <div class="margenBoton">
        <input type="submit" class="btn_enviar btn btn-primary" id="btn_enviar" value="Iniciar" onclick="iniciarsub()">
    
        <a  class="btn btn-dark" href="listado.php">Volver al Inicio</a>
       <br><br>
       
       
        </div>

        <div class="centrar">
            <h4 class="card-header">Copyright &copy; 2019 &mdash; Guns 'n Coders</h4> 
            <br><br>
        </div>
             
    </form>


    <?php echo $errores?>
    

</div>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>   
</body>
</html>




