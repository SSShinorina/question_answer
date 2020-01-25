<?php
 include_once '../src/ask/Ask.php';
 session_start();
 $obj=new Ask();
 $obj->setData($_GET);
 $obj->save();
 $array= $obj->show_ques();
?>
<html>
<head>
    <title>List of Question</title>
</head>
<body>

<table border="1">
    <tr>
        <td>Serial</td>
        <td>Question</td>
        <td>Action</td>
    </tr>
    <?php
    $sl=1;
    foreach($array as $item){
        ?>

        <tr>
            <td><?php echo $sl++ ?></td>
            <td><?php echo $item['question'] ?></td>
            <td><a href="answer.php?id=<?php echo $item['question']?>"><br>Answer</br></a> </td>
            <td><a href="store.php">Show Answer</a> </td>

        </tr>
    <?php } ?>
</table>
</body>
</html>
