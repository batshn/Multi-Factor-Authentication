<?php
    $email;
    $password;
    $repassword;

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

    if($_SERVER["REQUEST_METHOD"] == "POST") {
      $url = "https://www.google.com/recaptcha/api/siteverify";
      $data = [
        'secret' => "6Lf7k7oZAAAAAKVngOnV4x_TUy-yMhC5yD8-1HX2",
        'response' => $_POST['token'],
        'remoteip' => $_SERVER['REMOTE_ADDR']
      ];
    

      $option = array(
        'http' => array(
          'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
          'method'  => 'POST',
          'content' => http_build_query($data)
        )
      );

      $context  = stream_context_create($option);
      $response = file_get_contents($url, false, $context);
      
      $resp = json_decode($response, true);
      

      if($resp['success'] == true) {
          session_start();
          // Store data in session variables
          $_SESSION["loggedin"] = true;
          $_SESSION["email"] = $email;
          $_SESSION["password"] = $password;
        
          echo json_encode(array('success' => '1', 'msg'=>'<h2>Thanks for submitting your contact information.</h2>'));
      } else {
          echo json_encode(array('success' => '0', 'msg'=>'<h2>Your account could not be created.</h2>'));
      }

    }
    
?>