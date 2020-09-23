<?php
        $email;
        $password;
        $repassword;
        $captcha;

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

        if(isset($_POST['g-recaptcha-response'])){
          $captcha=$_POST['g-recaptcha-response'];
        }


        if(!$captcha){
          echo json_encode(array('success' => '0', 'msg'=>'<h2>Please check the Captcha in the form!.</h2>'));
          exit;
        }

        $secretKey = "6LcnhboZAAAAAJyU8V9Pk2HcRKJigKDf7EFxd7vX";
        $ip = $_SERVER['REMOTE_ADDR'];
        // post request to server
        $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
        $response = file_get_contents($url);
        $responseKeys = json_decode($response,true);
        // should return JSON with success as true
        if($responseKeys["success"]) {
                session_start();
                // Store data in session variables
                $_SESSION["loggedin"] = true;
                $_SESSION["email"] = $email;
                $_SESSION["password"] = $password;
               
                echo json_encode(array('success' => '1', 'msg'=>'<h2>Thanks for submitting your contact information.</h2>'));

        } else {
            echo json_encode(array('success' => '0', 'msg'=>'<h2>Your account could not be created.</h2>'));
           
        }
?>