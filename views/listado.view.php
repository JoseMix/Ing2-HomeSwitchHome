<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listado de Propiedades</title>
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
    <script src="js/subir.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/validate.js/0.12.0/validate.min.js"></script>

</head>
<body class="cuerpo">
    <div class="contenedor">
        <a href="listado.php"> <img src="img/logos/HSH-Complete.svg" class="img-fluid" alt="Logotipo de homeSwitchHome"></a>
        <br><br>
        <h2>Catalogo de propiedades</h2>
        <section class="propiedades">
        <ul>
            
            <!--en el arreglo $propiedades recibo las propiedades que trae la consulta sql (eva) -->
            <?php foreach ($propiedades as $propiedad) :?>

        <!--el div class="card" contiene el estilo con el que se muestra el listado de propiedades (eva) -->
                <div class="card" style="width: 30rem;">
                    <span class="border border-info">
                    <img src="<?php echo "http://localhost/Ing2-HomeSwitchHome/img/" . $propiedad['foto'];?>"" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="text-info"><?php echo $propiedad['nombre']?></h5>
                        <p class="text-info">Provincia: <?php echo $propiedad['provincia']?></p>
                        <p class="text-info">Localidad: <?php echo $propiedad['localidad']?></p>
                        <p class="text-info">Calle: <?php echo $propiedad['calle']?></p>

                        <!-- en el tag <a> recupero el id de propiedad y lo envio por GET al archivo detallePropiedad.php (eva) -->
                        <a href="detallePropiedad.php?idpropiedad=<?php echo $propiedad['id_propiedad']?>" class="btn btn-primary">Ver Mas</a>
                    </span>
                    </div>
                 </div>
                    <br>
        
            <?php endforeach; ?>
        
        </ul>

        </section>
    
    
    </div>
    <div class="centrar">
        Copyright &copy; 2019 &mdash; Guns 'n Coders 
        <br><br>
    </div>
</body>
</html>