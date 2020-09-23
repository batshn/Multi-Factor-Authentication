<?php
        $pass;
        $email;

        if(isset($_POST['email'])){
          $email=$_POST['email'];
        }

        if(isset($_POST['password'])){
          $pass=$_POST['password'];
        }

        require_once "db_config.php";

       $stmt = $conn->prepare('SELECT * FROM users_mfa WHERE email = ? and password= ? and status=1 ');
       $stmt->bind_param('ss', $email, $pass);
       $stmt->execute();
       $result = $stmt->get_result();

        if ($result->num_rows > 0) {
           $otp = rand(100000, 999999);
           $to = $email;
           $subject  = 'Login verification code';
           $message  = 'One time password for authetication is: <br /><br />' . $otp;
           $headers  = 'From: s3799204@gmail.com' . "\r\n" .
                 'MIME-Version: 1.0' . "\r\n" .
                 'Content-type: text/html; charset=utf-8';

           if(mail($to, $subject, $message, $headers)) {
                $stmt = $conn->prepare('INSERT INTO users_login(otp, expired, otp_datetime) VALUES(?, 0, NOW())');
                $stmt->bind_param('i' ,$otp);
                $stmt->execute();
                $res = $stmt->get_result();
                $stmt->close();

                session_start();
                while($row = $result->fetch_assoc()) {
                   $_SESSION["fname"]=$row["FirstName"];
                   $_SESSION["email"]=$row["email"];
                }
                
                header("location: login_otp.php");
           }

          // echo '<script type="text/JavaScript">  alert("Your account has been registered successfully and you can now sing in."); window.location="index.php";</script>' ;
        }
        else {
          echo '<script type="text/JavaScript">  alert("The email or password is wrong!"); window.location="index.php" </script>' ;
        }

?>

