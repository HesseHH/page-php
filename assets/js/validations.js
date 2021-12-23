

const loginBtn = document.getElementById('login');

loginBtn.addEventListener('click', e => {
    const email = document.getElementById('email').value;
    const passwd = document.getElementById('password').value;
    
    console.log(email);

    const formData = new FormData();

    formData.append( 'email', email );
    formData.append( 'password', passwd );
    
    const request = new XMLHttpRequest();
    request.open( 'POST', '../../controllers/login.controller.php', true );
    request.onreadystatechange = function(e) {
        if ( request.readyState == 4 ) {
            if ( request.status == 200 ) {
                if ( !(request.responseText === 'error_login') ) {
                    alert(request.responseText);
                    window.location.href = request.responseText;
                }else {
                    console.log('fallo');
                }
            }
        }
    }
    request.send(formData);
})


// $('#login').click(function(){

//     // Traemos los datos de los inputs
//     var email  = $('#email').val();
//     var password = $('#password').val();
    
  
//     // Envio de datos mediante Ajax
//     $.ajax({
//       method: 'POST',
//       // Recuerda que la ruta se hace como si estuvieramos en el index y no en operaciones por esa razon no utilizamos ../ para ir a controller
//       url: '../../controllers/login.controller.php',
//       // Recuerda el primer parametro es la variable de php y el segundo es el dato que enviamos
//       data: {email: email, password: password},
//       // Esta funcion se ejecuta antes de enviar la información al archivo indicado en el parametro url
//       beforeSend: function(){
//         // Mostramos el div con el id load mientras se espera una respuesta del servidor (el archivo solicitado en el parametro url)
//         // $('#load').show();
//       },
//       // el parametro res es la respuesta que da php mediante impresion de pantalla (echo)
//       success: function(res){
//         // Lo primero es ocultar el load, ya que recibimos la respuesta del servidor
//         // $('#load').hide();
  
//         // Ahora validamos la respuesta de php, si es error_1 algun campo esta vacio de lo contrario todo salio bien y redireccionaremos a donde diga php
//         if(res == 'error_1'){
//           /*
//           Para usar sweetalert es muy sencillo, has de cuenta que haces un alert
//           solo que esta ves enviaras 3 parametros separados por comas, el primero
//           es el titulo de la alerta, el segundo es la descripcion y el tercero es el tipo de alerta
//           en el momento conozco tres tipos, entonces puedes variar entre success: Muestra animación de un check,
//           warning: muestra icono de advertencia amarillo y error: muestra una animacion con una X muy chula :v
//           */
//           swal('Error', 'Por favor ingrese todos los campos', 'error');
//         }else if(res == 'error_2'){
//           // Recuerda que si no necesitas validar si es un email puedes eliminar el if de la linea 34
//           swal('Error', 'Por favor ingrese un email valido', 'warning');
//         }else if(res == 'error_3'){
//           swal('Error', 'El usuario y contraseña que ingresaste es incorrecto', 'error');
//         }else{
//           // Redireccionamos a la página que diga corresponda el usuario
//           alert(res)
//           window.location.href= res
//         }
  
//       }
//     });
  
//   });