<?php

// include class.rating model file
require_once __DIR__ . '\..\model\class.assessment.php';

// specify the content type of the data that will be
// transmitted back and forth between this file,
// the class.rating model file, and the create movie
// web page
header('Content-type: text/html');

function select_assessment_results($name, $instructorid) {
    // create an Assessment object
    $assessment = new Assessment();

    // create String that will be echoed 
    // by function
    $html = '';

    // create int counter variable
    $i = 1;

    // call select movie rating method on object
    $retval = $assessment->select_assessment_results($name, $instructorid);
    // return value will be false if select fails   
    if (!$retval) {
        // format error message in an
        // html paragraph element
        echo '<p class="help-block">Could not execute select statement : ' . $assessment->get_mysqli()->errno . '</p>';
    } else {
        if ($retval->num_rows != 0) {
            // format the data contained in retval in
            // html table row elements
            while ($row = $retval->fetch_array(MYSQLI_ASSOC)) {
                $html .= '<tr><th scope="row">' . $i . '</th>';
                $html .= '<td>';
                $html .= $row['name'];
                $html .= '</td>';
                $html .= '<td>';
                $html .= $row['date'];
                $html .= '</td>';
                $html .= '<td>';
                $html .= $row['score'];
                $html .= '</td>';
                $html .= '</tr>';
                $i++;
            }
        } else {
            $html .= '<tr><th scope="row">' . $i . '</th>';
                $html .= '<td>';
                $html .= 'No assessments found!';
                $html .= '</td>';
                $html .= '<td>';
                $html .= '</td>';
                $html .= '<td>';
                $html .= '</td>';
                $html .= '</tr>';
        }
        echo $html;
    }
}

?>