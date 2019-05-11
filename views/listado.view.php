<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mostrar</title>
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/subir.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/validate.js/0.12.0/validate.min.js"></script>
</head>
<body>
    <div class="contenedor">
    <h1>Propiedades</h1>
    <section class="propiedades">
        <ul>
        
        
        <?php foreach ($propiedades as $propiedad) :?>

        <li> <?php echo $propiedad['provincia'] . 
                ' - ' . $propiedad['localidad'] . 
                ' - ' . $propiedad['calle'] . 
                ' - ' . $propiedad['numero'] . 
                ' - ' . $propiedad['descripcion'] ?>
        <img src="<?php echo "http://localhost/Ing2-HomeSwitchHome/img/" . $propiedad['foto'];?>" class="foto_mostrar">
        
        </li>
        
        <?php endforeach; ?>
        
        </ul>

    </section>
    
    
    </div>
</body>
</html>