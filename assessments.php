<?php
session_start();
if (!isset($_SESSION['userid']) || ($_SESSION['userid'] == 0)) {
    header('Location: assessments.php');
}
?>
<html lang="en">
    <head>	
        <title>My Assessments</title>

        <!-- Override CSS file - add your own CSS rules -->
        <link rel="stylesheet" href="assets/css/styles.css">

    </head>
    <body>
        <div class="header">
            <div class="container">
                <h1 class="header-heading">My Assessments</h1>
            </div>
        </div>
        <div class="nav-bar">
            <div class="container">
                <ul class="nav">
                    <?php
                    echo '<li><a href="index.php">Home</a></li>';
                    echo '<li><a href="assessments.php">Assessments</a></li>';
                    ?>
                </ul>
            </div>
        </div>
        <div class="content">
            <div class="container">
                <div class="main">
                    <h1>Search Assessments</h1>
                    <div class="well">
                        <form name="assessments" id="assessments" method="GET" action="<?php $_SERVER['PHP_SELF'] ?>">
                            <div class="form-group">
                                <label for="assessmentName">Assessment Name</label>
                                <input name="assessmentName" type="text" class="form-control" id="assessmentName" maxlength="45">
                            </div>                                                                        
                            <button name="submit" type="submit" class="btn btn-primary">Search</button>
                        </form>
                        <br>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th> 
                                    <th>Date</th>
                                    <th>Score</th>                                   
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                //check to see if the submit button was pushed
                                if ((isset($_GET['assessmentName']))) {
                                    // include movie controller file
                                    require_once '.\controller\assessment.php';

                                    // get data input into form 
                                    // and store it in variables
                                    $name = $_GET['assessmentName'];
                                    
                                    select_assessment_results($name, $_SESSION['userid']);
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="aside">
                    <p>                      
                        Instructors have two ways in which they may search
                        for assessments.
                    </p> 
                    <p>                      
                        They may simply push the Search button. In which case,
                        all of their assessments will be displayed in
                        the table below the Search button.
                    </p>
                    <p>                      
                        They may also
                        input the name of an assessment and push Search.  In which
                        case, only those assessments that have a matching name 
                        will be displayed in the table below the Search button.
                    </p>
                    <p>                      
                        Each row in the table displays the name of an assessment, 
                        the date the assessment was submitted and the assessment score.
                    </p> 
                </div>
            </div>
        </div>
        <div class="footer">
            <div class="container">
                My Assessments
            </div>
        </div>
    </body>
</html>