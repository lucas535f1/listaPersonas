<?php

if (!isset($_GET['id'])  || !isset($_GET['dato'])) {
    header("Location: ../");
}
require "../classes/Db.classes.php";
require "../classes/DeleteDato.classes.php";

$deleteDato = new DeleteDato($_GET['id'],$_GET['dato']);
if(!$deleteDato->existe()){
    header("Location: ../");
}
$deleteDato->delete();
header("Location: ../ver.php?id=".$_GET['id']);


