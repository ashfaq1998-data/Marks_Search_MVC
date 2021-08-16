<?php

require "../model/model.php";
$DB = new DB();

$results = $DB->select(
  "SELECT * FROM `student` WHERE `FirstName` LIKE ? order by `StudentID`",
  ["%{$_POST['search']}%"]
);

echo json_encode(count($results)==0 ? null : $results);