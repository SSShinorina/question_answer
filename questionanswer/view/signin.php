<?php
session_start();
include_once "../src/registration/Registration.php";
if($_SERVER['REQUEST_METHOD']=='POST'){
    if(!empty($_POST['firstname'])){
        if(preg_match("/([a-zA-Z])/",$_POST['firstname'])){
            $_POST['firstname']= filter_var($_POST['firstname'],FILTER_SANITIZE_STRING);
            $obj1=new Registration();
            $obj1->setData($_POST);
            $obj1->edit();
        }
        else{
            $_SESSION['message']="Invalid Input";

        }

    }
    else{
        $_SESSION['message']="Input Can't Be Empty";
    }
}
else {


}
?>
<html>
<header>
    <title>Login</title>

</header>
<body>
<fieldset>
    <legend>Login Here</legend>
    <form action="profile.php" method="post">
        <input type="text" name="email" placeholder="Email"/>
        <input type="password" name="password" placeholder="Password"/>
        <input type="submit" value="Login"/>

    </form>
</fieldset>
</body>
</html>