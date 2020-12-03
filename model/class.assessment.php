<?php
class Assessment {
    // declare private field
    private $mysqli;
    
    // declare constructor
    function __construct() {
        // connect to filmcollector MySQL database
        // assign connection to field
        $this->mysqli = new mysqli('localhost:3306', 'root', '', 'assessments');
    }
    
    // declare destructor
    function __destruct() {
        // close connection to filmcollector MySQL database
        $this->mysqli->close();
    }
    
    // declare getter 
    public function get_mysqli() {
        return $this->mysqli;
    }
    
    public function select_assessment_results($name, $instructorid) {
        
        $assessmentName = '%';
        $assessmentName .= $name;
        $assessmentName .= '%';
        
        // format select statement as a String
        $sql = "SELECT name, date, score " .
                "FROM instructor, assessment " .
                "WHERE instructor.instructorid = assessment.instructorid " .
                "AND assessment.instructorid = $instructorid " .
                "AND name LIKE '$assessmentName'";
        
        // execute select statement
        // assign return value to variable
        // allow only one query to be executed
        // at a time for security
        $retval = $this->mysqli->query($sql);        
        
        //return result of executing select statement
        return $retval;
    }
}
?>