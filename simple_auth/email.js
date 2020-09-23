$(document).ready(function() {
    $('#registerform').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: 'check_cred.php',
            data: $(this).serialize(),
            success: function(response)
            {
                let jsonData = JSON.parse(response);
                if (jsonData.success == "1")
                {
                    document.cookie="email="+jsonData.msg;
                    location.href = 'register_otp.php';
                }
                else {
                    $("#result").html(jsonData.msg);
                }
           }
       });
     });


     $('#reg_otp_form').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: 'check_otp.php',
            data: $(this).serialize(),
            success: function(response)
            {
                let jsonData = JSON.parse(response);
                if (jsonData.success == "1")
                {
                    location.href = 'index.php';
                }
                else 
                {
                    $("#result").html(jsonData.msg);
                }
           }
       });
     });

});