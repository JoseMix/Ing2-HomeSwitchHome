<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Subasta</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/pujar.js" type="text/javascript"></script>



</head>
<body>
    <header>
        <div class="container">
            <h1 class="titulo">PUJAR </h1> 
        </div>
    </header>
<div class="container">
    <form action="pujarr.php?idsub=<?php echo $_GET['idsub'] ?> " onsubmit="return pujar()" class="formulario" method="post" enctype="multipart/form-data">

    <label for="monto">Monto</label>
    <input type="text" id="monto" name="monto">
    <input type="submit" class="submit btn btn-primary" value="Pujar" >      
     <?php if(!empty($_GET['error'])): ?>
         <div class=" ">
             <ul>
               <?php echo $_GET['error']; ?>
             </ul>
           </div>
     <?php endif; ?> 
    </form>
</div>