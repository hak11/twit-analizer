$(document).ready(function(){
   $("#masuk").click(function(){
        var form_data={
            username: $("#username").val(),
            password: $("#password").val()
        }

        $.ajax({
            type:"POST",
            url:"proses/proses_login.php",
            data:form_data,
            success:function(response){
                if (response=="success") {
                    window.location='interfaces.php?page=listunsada';
                } else
                {
                    alert("Username atau Password Yang Anda Masukan Salah, Coba Login Kembali");
                }
            }
        });

        return false;
   });
});