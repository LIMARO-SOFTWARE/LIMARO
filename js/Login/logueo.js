$(document).ready(function(){

    $(document).on('click','#btnCerrar',function(){
        $.ajax({
            url:'../controladorLogin/login.delete.php',
            type:'POST',
            datatype:'json',
            data:null,
        }).done(function(json){
                var obj=JSON.parse(json);
                if(obj==true){
                window.location.href="../login/login.php";
                }
        }).fail(function(xhr,status,error){
            console.log(error);

        })
    })
   
})

$(window).on('load',function() {
    $.ajax({
        url: '../controladorLogin/logueo.read.php',
        type: 'POST',
        datatype: null,
        data: null,
    })
    
})