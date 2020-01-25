<?php
include_once "../src/ask/Ask.php";
$obj= new Ask();
$obj->setData($_GET);
$obj->answer();
//$array=$obj->all();
$array=$obj->ans_all();
print_r($array);
//$item=$obj->setData($_GET)->show();

?>
<html>
<head>
    <title>List of Answer</title>
</head>
<body>

<table border="1">
    <tr>

        <td>Answer</td>

    </tr>
    <tr>

        <td><?php echo $array['text'] ?></td>

    </tr>


</table>
</body>
</html>

