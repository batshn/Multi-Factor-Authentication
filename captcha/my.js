$(document).ready(function() {
    $('#accountform').submit(function(e) {
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
                    location.href = 'main.php';
                }
                else 
                {
                    $("#result").html(jsonData.msg);
                }
               
               
           }
       });
     });


     $('#createaccount').submit(function(e) {
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
                    location.href = 'main.php';
                }
                else 
                {
                    $("#result").html(jsonData.msg);
                }
               
               
           }
       });
     });
});
