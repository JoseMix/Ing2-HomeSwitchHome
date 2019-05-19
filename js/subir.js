
function subir(){ 

var formulario = document.getElementById('formulario');
var provincia = formulario.provincia.value;
var localidad = formulario.localidad.value;
var calle = formulario.calle.value;
var numero = formulario.numero.value;
var descripcion = formulario.descripcion.value;
var nombre = formulario.nombre.value;
var parametros ='provincia=' + provincia + '&localidad=' + localidad + '&calle=' + calle + '&numero=' + numero + '&descripcion=' + descripcion + '&nombre=' + nombre;
if (provincia == '' || localidad == '' || calle == '' || numero == '' || descripcion == '' || nombre == '') {
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