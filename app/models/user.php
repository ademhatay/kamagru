<?php 
class User {
    private $id;
    private $email;
    private $password;
    private $verified;

    public function __construct($id, $email, $password, $verified) {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
        $this->verified = $verified;
    }

    public function getId() {
        return $this->id;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function isVerified() {
        return $this->verified;
    }

    public function setVerified($verified) {
        $this->verified = $verified;
    }
}
?>
