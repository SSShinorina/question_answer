<?php
include_once "../src/ask/Ask.php";
$obj=new Ask();
$obj->setData($_POST);
$array=$obj->ans_all();
echo "<pre>";
print_r($array);
?>