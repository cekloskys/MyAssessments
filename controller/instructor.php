<?php

// include class.actor.php model file
require_once __DIR__ . '/../model/class.instructor.php';

// specify content type of data that will be
// sent to the actor Javascript file
header('Content-type: text/html');

function select_user($userName, $password) {

    // create an Instructor object
    $instructor = new Instructor();

    // call select_actors method
    $retval = $instructor->select_user($userName, $password);

    // if select statement fails, retval will be false
    if (!$retval) {
        die('Could not execute select statement:' . mysqli_errno($link));
    } else {
        while ($row = $retval->fetch_array(MYSQLI_ASSOC)) {
            $userid = $row['instructorid'];
            return $userid;
        }
    }
}

?>