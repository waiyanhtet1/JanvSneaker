const show_password = document.querySelector("#showPassword");
       show_password.addEventListener("click",function(){
        if(show_password.classList.contains("fa-eye-slash")) {
            show_password.classList.remove('fa-eye-slash');
            show_password.classList.add('fa-eye');
            password.setAttribute("type","text");
        } else {
            show_password.classList.add("fa-eye-slash");
            password.setAttribute("type","password");
        }
       });