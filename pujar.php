<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pujar</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/pujar.js" type="text/javascript"></script>



</head>
 <?php include_once 'conexion.php';
   $conexion= conexion();
   if (!$conexion){
    die();
   }
   ?>
<body>
   <a href="subastasPropiedad.php?idpropiedad=<?php echo $_GET['idpropiedad']?>"> Volver a Listado</a>
   <?php 
   
   $subasta=$conexion -> query("SELECT * FROM subasta WHERE idsubasta=".$_GET['idsub']);
   $subasta=$subasta -> fetch();


   $haypujas=$conexion -> query("SELECT * FROM pujas WHERE idsubasta=".$subasta['idsubasta']);
   $haypujas=$haypujas -> fetch();
     if ($haypujas==false){
           $ultimoMontoPujado=0;
      }
     else{
         $montoMaximo=$conexion -> query("SELECT idcliente, MAX(importepuja) as maximo FROM pujas WHERE idsubasta=".$subasta['idsubasta']);
         $montoMaximo= $montoMaximo -> fetch();
            $ultimoMontoPujado=$montoMaximo['maximo'];
        }
   
    ?>
    <div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
        </div>
        <div class="col-md-4">
            <div class="page-header">
                <h1>
                     <h2> Subasta Activa</h2>
                     <h3>  Numero de semana a subastar:<?php echo $subasta['semana'] ?> </h3>
                     <h3> Precio base: <?php echo $subasta['preciobase'] ?> </h3>
                     <h3> Monto de la puja ganadora hasta el momento: <?php echo $ultimoMontoPujado ?> </h3>

                </h1>
            </div>

            <form action="pujarSub.php?idsub=<?php echo $subasta['idsubasta'] ?> " onsubmit="return pujar()" method="post" enctype="multipart/form-data" role="form">
                <div class="form-group">
                     
                    <label for="monto">
                        Monto a pujar
                    </label>
                    <input type="text" class="form-control" id="monto" name="monto" />
                </div>
                
                <button type="submit" class="btn btn-primary">
                    Pujar
                </button>
                <?php if(!empty($_GET['error'])): ?>
                <div class=" ">
                 <ul>
                 <?php echo $_GET['error']; ?>
                </ul>
                </div>
                <?php endif; ?> 
            </form>
        </div>
    </div>
</div>
    
</body>
</html>