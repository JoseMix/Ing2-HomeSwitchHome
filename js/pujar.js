function pujar(){ 

var formulario = document.getElementById('formulario');
var monto = formulario.monto.value;
console.log(monto);
if (monto == '') {
   alert("Campo vacio");
   event.preventDefault();
   }else{
      $.ajax({
         type: "POST",
         url: "pujarSubasta.php",
         data: monto,
         cache: false,
         success: function(html){
            alert(html);
         }
      });
   }
return false;
}