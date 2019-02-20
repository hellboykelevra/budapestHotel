function checkPasswords (){
        var password1 = document.getElementById ("password1");        
        var password2 = document.getElementById ("password2");        
        var warning = document.getElementById ("warning");        
        
        if (password1.value != password2.value){
            var msg = '<i style="color: red;"> * Las contraseñas no son iguales </i>';
            warning.innerHTML = msg;
            password1.value = "";
            password2.value = "";
        }
}