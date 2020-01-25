<?php

class Registration
{
    public $email;
    public $password;
    public $repass;
    public $firstname;
    public $middlename;
    public $lastname;
    public $dob;
    public $hobby;
    public $interest;


    public function setData($data = '')
    {
        if (array_key_exists('email', $data)) {
            $this->email = $data['email'];
        }
        if (array_key_exists('password', $data)) {
            $this->password = $data['password'];
        }
        if (array_key_exists('repass', $data)) {
            $this->repass = $data['repass'];
        }
        if (array_key_exists('firstname', $data)) {
            $this->firstname = $data['firstname'];
        }
        if (array_key_exists('middlename', $data)) {
            $this->middlename = $data['middlename'];
        }
        if (array_key_exists('lastname', $data)) {
            $this->lastname = $data['lastname'];
        }
        if (array_key_exists('dob', $data)) {
            $this->dob = $data['dob'];
        }
        if (array_key_exists('hobby', $data)) {
            $this->hobby = $data['hobby'];
        }
        if (array_key_exists('interest', $data)) {
            $this->interest = $data['interest'];
        }


    }

    public function store()
    {
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=project-1', 'root', '');

            $sql = "INSERT INTO `users` (`user_id`, `email`, `password`) VALUES (:id, :email, :pass);";
            $query = 'INSERT INTO someTable VALUES(:name)';
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(
                ':id' => null,
                ':email' => $this->email,
                ':pass' => $this->password
            ));
            if ($stmt) {
                session_start();
                $_SESSION['message'] = 'Registration Successfull';
                $_SESSION['user'] = $this->email;
                header('location:signin.php');
            }


        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }

    }
    public function edit()
    {
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=project-1', 'root', '');

            $query = 'UPDATE `users` SET fname = :fname, mname =:mname, lname= :lname, dob=:dob, hobby=:hobby,interest=:interest WHERE id= :id';
            $stmt = $pdo->prepare($query);
            $result = $stmt->execute(array(

                ':fname' => $this->firstname,
                ':mname' => $this->middlename,
                ':lname' => $this->lastname,
                ':dob' => $this->dob,
                ':hobby' => $this->hobby,
                ':interest' => $this->interest
            ));

            if ($result) {
                $_SESSION['message'] = "Sucessfully Updated";
                header('location:signin.php');
            }

            echo $stmt->rowCount(); // 1
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    public function login()
    {
//        $email = $info['email'];
//        $password = $info['password'];
        $pdo = new PDO('mysql:host=localhost;dbname=project-1', 'root', '');
        $sql = "SELECT * FROM `users` WHERE email=:email AND password=:password";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(':email' => $this->email, ':password' => $this->password));
        // $stmt->bindParam(1, $this->email);
        // $stmt->bindParam(2, $this->password);
        //  $stmt->execute();

//        $stmt->setFetchMode(PDO::FETCH_ASSOC);
//        $stmt->execute();
//        $data = $stmt->fetchAll();
//        print_r($data);
        if ($stmt->rowCount() === 1) {
            header('location:profile.php');
        }
        else if($stmt->rowCount() !== 1){
            $_SESSION['message']="Invalid Input";
            header('location:signin.php');
        }
//
//    }
    }


    /**
     *
     */




}