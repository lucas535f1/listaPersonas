<?php

if (!isset($_GET['id'])) {
    header("Location: ../");
}
require "../classes/Db.classes.php";
require "../classes/Delete.classes.php";

$delete = new Delete($_GET['id']);
if (!$delete->existe()) {
    header("Location: ../");
}
$delete->delete();
header("Location: ../");
