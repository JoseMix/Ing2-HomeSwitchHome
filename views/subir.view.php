<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Subir una Propiedad</title>
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
    <form action="" class="formularioSubir" method="post" enctype="multipart/form-data" id="formulario">

    <h4 class="card-header">Subir Nueva Propiedad</h4> 
    <br><br>  
    <label for=nombre>Ingrese Nombre De La Nueva Propiedad</label>
    <input class="form-control form-control-lg" type="text" id="nombre" name="nombre">
    <br><br>

    <label for="provincia">Ingrese Provincia De La Nueva Propiedad</label>
    <input class="form-control form-control-lg" type="text" id="provincia" name="provincia">
    <br><br> 

    <label for="localidad">Ingrese Localidad De La Nueva Propiedad</label>
    <input class="form-control form-control-lg" type="text" id="localidad" name="localidad">
    <br><br> 

    <label for="calle">Ingrese Calle De La Nueva Propiedad</label></label>
    <input class="form-control form-control-lg" type="calle" id="calle" name="calle">
    <br><br> 

    <label for="numero">Ingrese Numero De La Nueva Propiedad</label>
    <input class="form-control form-control-lg" type="text" id="numero" name="numero">
    <br><br> 

    <label for="descripcion">Ingrese Descripcion De La Nueva Propiedad</label>
    <br>
    <textarea class="textarea" name="descripcion" id="descripcion" placeholder="Ingrese descripcion"></textarea></textarea>
    <br><br> 

    <label for="foto">Selecciona Foto De La Nueva Propiedad</label>
    <br>
    <input class="seleccionaFoto" type="file" id="foto" name="foto">
    <br><br><br>

    <!--aguegar el div en el archivo del gallego-->
    <div class="alert alert-primary" role="alert">
    <?php echo $errores ?>
    </div>
     <br><br>
    
    <input type="submit" class="btn_enviar btn btn-primary" id="btn_enviar" value="Subir Propiedad" onclick="subir()">  
    <a  class="btn btn-dark" href="listado.php">Volver al Inicio</a>
    <br><br>      
    </form>

   

    <div class="centrar">
            <h4 class="card-header">Copyright &copy; 2019 &mdash; Guns 'n Coders</h4> 
            <br><br>
        </div>

</div>







<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>