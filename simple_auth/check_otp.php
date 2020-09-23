<?php
        $otp;
        $email;

        if(isset($_POST['reg_otp'])){
          $otp=$_POST['reg_otp'];
        }

        if(isset($_POST['email_otp'])){
          $email=$_POST['email_otp'];
        }

        require_once "db_config.php";

       $stmt = $conn->prepare('SELECT * FROM users_mfa WHERE email = ? and otp= ? ');
       $stmt->bind_param('ss', $email, $otp);
       $stmt->execute();
       $result = $stmt->get_result();

        if ($result->num_rows > 0) {
           $stmt = $conn->prepare('UPDATE users_mfa set status = ? WHERE email = ? and otp= ? ');
           $status=1;
           $stmt->bind_param('iss' ,$status ,$email, $otp);
           $stmt->execute();
           $result = $stmt->get_result();
           $stmt->close();
           
           echo '<script type="text/JavaScript">  alert("Your account has been registered successfully and you can now sing in."); window.location="index.php";</script>' ;
        }
        else {
          echo '<script type="text/JavaScript">  alert("The verification code is invalid!"); window.location="register_otp.php" </script>' ;
        }

?>

