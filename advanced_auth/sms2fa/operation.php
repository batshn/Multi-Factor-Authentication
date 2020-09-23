<?php

class Operation
{

    protected $db;

    function __construct($db)
    {
        $this->db = $db;
    }

    function __destruct()
    {
        $this->db = null;
    }

    /*
     * Register New User
     *
     * @param $name, $email, $username, $password, $auth_code
     * @return ID
     * */    public function Register($name, $email, $password, $phone,$pin)
    {
        $query = $this->db->prepare("INSERT INTO users_2fa_sms(name, email, password, phone, pin) VALUES (:name,:email,:password,:phone,:pin)");
        $query->bindParam("name", $name, PDO::PARAM_STR);
        $query->bindParam("email", $email, PDO::PARAM_STR);
        $query->bindParam("phone", $username, PDO::PARAM_STR);
        $hash = password_hash($password, PASSWORD_BCRYPT, ['cost' => 10]);
        $query->bindParam("password", $hash, PDO::PARAM_STR);
        $query->bindParam("phone", $phone, PDO::PARAM_STR);
        $query->bindParam("pin", $pin, PDO::PARAM_STR);
        $query->execute();
        return $this->db->lastInsertId();
    }

    /*
     * Check Username
     *
     * @param $username
     * @return boolean
     * */    public function isPhone($phone)
    {
        $query = $this->db->prepare("SELECT id FROM users_2fa_sms WHERE phone=:phone");
        $query->bindParam("phone", $phone, PDO::PARAM_STR);
        $query->execute();
        if ($query->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    /*
     * Check Email
     *
     * @param $email
     * @return boolean
     * */    public function isEmail($email)
    {
        $query = $this->db->prepare("SELECT id FROM users_2fa_sms WHERE email=:email");
        $query->bindParam("email", $email, PDO::PARAM_STR);
        $query->execute();
        if ($query->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    /*
     * Login
     *
     * @param $username, $password
     * @return $mixed
     * */    public function Login($email, $password)
    {
        $query = $this->db->prepare("SELECT id, password FROM users_2fa_sms WHERE email=:email");
        $query->bindParam("email", $email, PDO::PARAM_STR);
        $query->execute();
        if ($query->rowCount() > 0) {
            $result = $query->fetch(PDO::FETCH_OBJ);
            $enc_password = $result->password;
            if (password_verify($password, $enc_password)) {
                return $result->id;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    /*
     * get User Details
     *
     * @param $user_id
     * @return $mixed
     * */    
    public function UserDetails($user_id)
    {
        $query = $this->db->prepare("SELECT id, name, email, phone, pin FROM users_2fa_sms WHERE id=:user_id");
        $query->bindParam("user_id", $user_id, PDO::PARAM_STR);
        $query->execute();
        if ($query->rowCount() > 0) {
            return $query->fetch(PDO::FETCH_OBJ);
        }
    }


    /*
     * Update pin afer logged in
     *
     * @param $name, $email, $username, $password, $auth_code
     * @return ID
     * */   
    public function UpdatePin($user_id,$pin)
    {
        $query = $this->db->prepare("UPDATE users_2fa_sms SET pin=:pin WHERE id =:user_id");
        $query->bindParam("user_id", $user_id, PDO::PARAM_STR);
        $query->bindParam("pin", $pin, PDO::PARAM_STR);
        $query->execute();
        return true;
    }
}
?>