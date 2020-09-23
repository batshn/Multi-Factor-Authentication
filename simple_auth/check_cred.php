<?php
  
        $fname;
        $email;
        $password;
        $repassword;

        if(isset($_POST['fname'])){
          $fname=$_POST['fname'];
        }

        if(isset($_POST['email'])){
          $email=$_POST['email'];
        }

        if(isset($_POST['password'])){
          $password=$_POST['password'];
        }

        if(isset($_POST['repassword'])){
            $repassword=$_POST['repassword'];
        }

        if (strcmp($password, $repassword) !== 0) {
            echo json_encode(array('success' => '0', 'msg'=>'<h2>Your password does not match!.</h2>'));
            exit;
        }
        require_once "db_config.php";

        // check whether email is registered
        $sql = "SELECT * FROM users_mfa WHERE email = '".$email."'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 0) {
            $otp =  rand(100000, 999999);
            $sql = "INSERT INTO users_mfa(FirstName, email, password, status, secret_code, otp) VALUES ('$fname', '$email', '$password', 0,'' ,'$otp') ";

            if(mysqli_query($conn, $sql)) {

              $to = $email;
              $subject  = 'Verification code';
              $message  = 'One time password for registration authetication is: <br /><br />' . $otp;
              $headers  = 'From: s3799204@gmail.com' . "\r\n" .
                    'MIME-Version: 1.0' . "\r\n" .
                    'Content-type: text/html; charset=utf-8';
              if(mail($to, $subject, $message, $headers)) {
                echo json_encode(array('success' => '1', 'msg'=>$email));
              }
              else echo json_encode(array('success' => '0', 'msg'=>'<h2>Error occurs.</h2>'));
            }
            else 
              echo json_encode(array('success' => '0', 'msg'=>'<h2>Error occurs.</h2>'));
          }
          else {
            echo json_encode(array('success' => '0', 'msg'=>'<h2>The email address is already registered.</h2>'));
          }
?>