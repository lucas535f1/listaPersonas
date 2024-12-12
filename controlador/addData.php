<?php
if (!isset($_POST['id']) || !isset($_POST['valor']) || !isset($_POST['dato'])) {
    header("Location: ../");

}
require "../classes/Db.classes.php";
require "../classes/AddData.classes.php";
$addDato = new AddData ($_POST['id'],$_POST['dato'],$_POST['valor']);
if($addDato->existe()){
    header("Location: ../");
}
$addDato->add();
header("Location: ../ver.php?id=".$_POST['id']);