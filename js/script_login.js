
$(function(){
    $("#btn_login").click(function(){
        $("#btn_login").hide();
        $("#login_message").html("<img src='img/gif/Loader-red.gif' style='width: 30px;'> ");
        
        var username = $("#username").val();
        var password = $("#password").val();
        
        $.post("login.php", {username: username, password: password}).done(function(data){
            if(data == "success"){
                window.location = "home.php";
            }else{
                $("#login_message").html("<label style='color:red; font-size: 14px;'>Credenciales incorrectas <i class='fa fa-user-times' aria-hidden='true'></i> </label>");
                $("#btn_login").show();
            }                                                                   
        });
    });
});