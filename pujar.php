<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pujar</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
    <script src="js/pujar.js" type="text/javascript"></script>



</head>
 <?php include_once 'conexion.php';
   $conexion= conexion();
   if (!$conexion){
    die();
   }
   ?>
<body>
   
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
    <div class="">
    <div class="">
        <div class="">
        </div>
        <div class="">
            <div class="">
            <header>
        <a href="listado.php"><img src="img/logos/HSH-Complete.svg" class="img-fluid" alt="Logotipo de homeSwitchHome"></a>
            <br><br>
        </header>
                <div class="">
                     <h4 class="card-header" > Subasta Activa</h4>
                     <br><br>
                     <h5>  Numero de semana a subastar: <?php echo $subasta['semana'] ?> </h5>
                     <h5> Precio base: <?php echo $subasta['preciobase'] ?> </h5>
                     <h5> Monto de la puja ganadora hasta el momento: <?php echo $ultimoMontoPujado ?> </h5>

                </div>
            </div>

            <form class="formularioSubir" action="pujarSub.php?idsub=<?php echo $subasta['idsubasta'] ?> " onsubmit="return pujar()" method="post" enctype="multipart/form-data" role="form">
            
                    <label for="monto">Monto a pujar </label>
                    <input type="text" class="form-control form-control-lg" id="monto" name="monto" />
                    <br>
                
                    <button type="submit" class="btn btn-primary">Ofertar</button>    
                    <a  class="btn btn-dark" href="subastasPropiedad.php?idpropiedad=<?php echo $_GET['idpropiedad']?>" >Volver al Inicio</a>

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

<div class="centrar">
            <br><br>
            <h4 class="card-header">Copyright &copy; 2019 &mdash; Guns 'n Coders</h4> 
            <br><br>
        </div>
    
</body>
</html>