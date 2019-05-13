
function subir(){ 

var formulario = document.getElementById('formulario');
var provincia = formulario.provincia.value;
var localidad = formulario.localidad.value;
var calle = formulario.calle.value;
var numero = formulario.numero.value;
var descripcion = formulario.descripcion.value;
var parametros ='provincia=' + provincia + '&localidad=' + localidad + '&calle=' + calle + '&numero=' + numero + '&descripcion=' + descripcion;
console.log(parametros);
if (provincia == '' || localidad == '' || calle == '' || numero == '' || descripcion == '') {
   alert("Campos vacios");
   event.preventDefault();
   }else{
      $.ajax({
         type: "POST",
         url: "subir.php",
         data: parametros,
         cache: false,
         success: function(html){
            alert(html);
         }
      });
   }
return false;
}