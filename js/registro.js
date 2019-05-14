 function registro(){ 

      var formulario = document.getElementById('login');
      var nombre = formulario.nombre.value;
      var apellido = formulario.apellido.value;
      var password = formulario.password.value;
      var password2 = formulario.password2.value;
      var email = formulario.email.value;
      var parametros ='nombre=' + nombre + '&apellido=' + apellido + '&password=' + password + '&password2=' + password2 + '&email=' + email;
            console.log(parametros);
            $.ajax({
               type: "POST",
               url: "registro.php",
               data: parametros,
               cache: false,
            });
       // event.preventDefault();
         }
      