function mostrarPassword1(){
    var cambio = document.getElementById("txtClave");
    if(cambio.type == "password"){
        cambio.type = "text";
        $('.icons').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
    }else{
        cambio.type = "password";
        $('.icons').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
    }
  } 

  function mostrarPassword2(){
    var cambio = document.getElementById("txtNuevaClaveEmplA");
    if(cambio.type == "password"){
        cambio.type = "text";
        $('.icons').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
    }else{
        cambio.type = "password";
        $('.icons').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
    }
  } 


  function leadingZeros(input) {
    if(!isNaN(input.value) && input.value.length == 1 ) {
      input.value = '0' + input.value;
    }
    if(!isNaN(input.value) && input.value.length == 2 ) {
        input.value = '0' + input.value;
      }

    if(!isNaN(input.value) && input.value.length == 3 ) {
    input.value = '' + input.value;
    }
  }
  
  