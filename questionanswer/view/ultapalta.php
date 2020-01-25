<?php
include_once '../src/ask/Ask.php';
$obj=new Ask();
$obj->setData($_GET);
$array=$obj->search();
echo "<pre>";
print_r ($array);