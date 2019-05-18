<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Subir una Propiedad</title>
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/subir.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/validate.js/0.12.0/validate.min.js"></script>

</head>
<body>
    <header>
        <div class="container">
            <h1 class="titulo">FORMULARIO DE SUBIDA DE PROPIEDADES </h1> 
        </div>
    </header>
<div class="container">
    <form action="" class="formulario" method="post" enctype="multipart/form-data" id="formulario">  

    <label for=nombre>Nombre De Propiedad</label>
    <input type="text" id="nombre" name="nombre">

    <label for="provincia">Provincia</label>
    <input type="text" id="provincia" name="provincia">

    <label for="localidad">Localidad</label>
    <input type="text" id="localidad" name="localidad">

    <label for="calle">Calle</label></label>
    <input type="calle" id="calle" name="calle">

    <label for="numero">Numero</label>
    <input type="text" id="numero" name="numero">

    <label for="foto">Selecciona foto de Propiedad</label>
    <input type="file" id="foto" name="foto">
    
    <label for="descripcion">Descripcion de la Propiedad</label>
    <textarea name="descripcion" id="descripcion" placeholder="Ingrese descripcion"></textarea></textarea>

    <input type="submit" class="btn_enviar btn btn-primary" id="btn_enviar" value="Subir Propiedad" onclick="subir()">        
    </form>

    <?php echo $errores ?>
</div>






<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>