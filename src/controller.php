<?php

/* 
Demo PDO -SQlite interaction
*/

function get_user(int $user_id)
{
    $db = new PDO('sqlite:'.__DIR__ .'/../data/db.sqlite');
    $stmt = $db->prepare("SELECT us_id AS id, us_name AS name FROM users WHERE us_id = :user_id");
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_OBJ);
    $db = null;
    return $result;
}