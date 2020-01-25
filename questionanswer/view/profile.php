<!--//--><?php
////include_once "../src/registration/Registration.php";
////$obj1 = new Registration();
////$obj1->setData($_POST);
////$obj1->login();
////?>
<html>
<header>
    <title>Profile</title>
</header>
<fieldset>
    <legend>User Home Page</legend>
    <table border="1">
        <tr>
            <td><br>Ask Your Question</br>
                <form action="show.php" method="post">
                    <a href="show.php"><br>View List</br></a>

                    <textarea name="textarea"  placeholder="Ask Your Question"></textarea>
                    <input type="submit" value="Submit"/>

                </form>



            </td>
        </tr>
        <tr>
            <td>Search Here
            <form action="ultapalta.php" method="post">
                <input type="text" name="search" placeholder="Find Here"/>
                <input type="submit" value="Find"/>

            </form>
            </td>
        </tr>

    </table>
</fieldset>
</html>
