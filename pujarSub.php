<?php
   include_once 'conexion.php';
   $conexion=conexion();
   $idsub=$_GET['idsub'];
   $idprop= $conexion -> query("SELECT idpropiedad FROM subasta WHERE idsubasta=".$idsub);
   $idprop= $idprop ->fetch();
   $idprop=$idprop['idpropiedad'];
   session_start();

   if (isset($_SESSION['id'])){
         if ($_SESSION['cliente']=='true'){
         	$tieneCreditos=$conexion -> query("SELECT credito FROM clientes WHERE id_cliente=".$_SESSION['id']);
         	$tieneCreditos=$tieneCreditos -> fetch();
         	$creditos=$tieneCreditos['credito'];
         	if ($creditos > 0){

         	$consulta=$conexion -> query("SELECT preciobase FROM subasta WHERE idsubasta=".$_GET['idsub']);
         	$consulta=$consulta -> fetch();
         	$preciobase=$consulta['preciobase'];
         	if ($_POST['monto'] < $preciobase){
                header('Location:pujar.php?idpropiedad='.$idprop.'&idsub='.$idsub.'&error=Debe ingresar un monto mayor al monto base');

         	}
         	else{
            $montoMaximo=$conexion -> query("SELECT idcliente, MAX(importepuja) as maximo FROM pujas WHERE idsubasta=".$idsub);
              $montoMaximo= $montoMaximo -> fetch();
              $ultimoMontoPujado=$montoMaximo['maximo'];
              if ($_POST['monto']> $ultimoMontoPujado){    
               $hizopuja=$conexion -> query("SELECT * FROM pujas WHERE idcliente=".$_SESSION['id']." AND idsubasta=".$_GET['idsub']);
               $hizopuja=$hizopuja -> fetch();
               $monto=$_POST['monto'];
               if ($hizopuja) { 
                    $conexion -> query("UPDATE pujas SET importepuja=".$monto." WHERE idsubasta=".$_GET['idsub']);

                    header('Location:pujar.php?idpropiedad='.$idprop.'&idsub='.$idsub);
               }
               else{
                   $conexion -> query("INSERT INTO pujas (importepuja, idcliente, idsubasta) values (".$monto.",".$_SESSION['id'].",".$_GET['idsub'].")");
                   header('Location:pujar.php?idpropiedad='.$idprop.'&idsub='.$idsub);
               }

         	   }
             else{
                  header('Location:pujar.php?idpropiedad='.$idprop.'&idsub='.$idsub.'&error=Debe ingresar un monto mayor ');

             }
                 
           }
        }
          else
          {
          	
          	header('Location:pujar.php?idpropiedad='.$idprop.'&idsub='.$idsub.'&error=No posee creditos suficientes');
          }

         }
         else{
          header('Location:pujar.php?idpropiedad='.$idprop.'&idsub='.$idsub.'&error=Debe ser un cliente para poder pujar');
         
         }


   }
   else
   {
      header('Location:login.php');

   }












?>