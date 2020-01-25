<?php
include_once "../src/registration/Registration.php";
session_start();
if(isset($_SESSION['message'])) {
    echo $_SESSION['message'];
    unset($_SESSION['message']);
}




if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['email'])) {
        if (preg_match("/([a-zA-Z])/", $_POST['email'])) {
            $_POST['email'] = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
            $obj1 = new Registration();
            $obj1->setData($_POST);
            $obj1->store();

        } else {
            $_SESSION['message'] = "Invalid Input";

        }

    } else {
        $_SESSION['message'] = "Input Can't Be Empty";

    }
}
?>

<html>
<head>
    <title>AmarProshno</title>
</head>
<body>

<fieldset>
    <legend>Update Profile</legend>
    <form action="signin.php" method="post">

        <input type="text" name="firstname" placeholder="Firstname"/>
        <input type="text" name="lastname" placeholder="Lastname"/>
        <input type="text" name="middlename" placeholder="Middlename"/>
<!--        <input type="radio" name="gender"/>-->
        <input type="date" name="dob" placeholder="DOB"/>
<!--        <input type="image" name="image" value="Upload"/>-->
        <input type="text" name="hobby" placeholder="Hobby"/>
        <input type="text" name="interest" placeholder="Interest"/>
        <input type="submit" value="Update"/>
    </form>
</fieldset>
</body>
</html>
