<?php
include_once("../../connectFiles/connect_e.php");
include_once("cas-go.php");

?>
    <!DOCTYPE html>
    <html lang="">

    <head>
        <title>ELC Teacher Evaluation Data</title>

        <!-- 	Meta Information -->
        <meta charset="utf-8">
        <meta name="description" content="This section of the ELC website outlines the ELC curriculum." />
        <meta name="keywords" content="ELC, BYU, ESL, Curriculum, Levels, Learning, Outcomes" />
        <meta name="robots" content="ELC, BYU, ESL, Curriculum, Levels, Learning, Outcomes" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,100' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Martel:400,200' rel='stylesheet' type='text/css'>
        <link href="style.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/jquery-ui.js"></script>
        <script type="text/javascript" src="js/js.js"></script>

    </head>

    <body>
        <header>
            <div id='title'>
                ELC Teacher Evaluation Data
            </div>
            <div id="user">
                <?php echo $button;?>
            </div>
        </header>
        <article>
            <?php
            if(isset($net_id)==FALSE){
                echo "Access Denied.";return;
            } else {
                if ($net_id == "blm39" || $net_id =="hatuhart" || $net_id =="kjh27") {

                } else {
                    echo "Access Denied.";
                    return;
                }
            }
            ?>
                <div id='reports_constructor'>
                    <h3> Drag fields on the right into the box below.</h3>
                    <a id="generate">Generate Report</a>


                    <div id='selected_fields' class="field_list">

                    </div>

                </div>
                <div id="placeholder"></div>

                <div id="content">
                    <div id="evaluation_report">
                        <div id="field_lists">
                            <div class="table">
                                <h3>Evaluations</h3>
                                <div class="field_list">
                                    <?php
                                    $query=$elc_db->prepare("Select * from Evaluations");
                                    $query->execute();
                                    $result = $query->get_result();
                                    $fields = $result->fetch_fields();
                                    foreach ($fields as $val) {
                                        if ($val->name !== "evaluation_id" && $val->name !== "semester" && $val->name !== "student_id" && $val->name !== "course_id" && $val->name !== "teacher_id" && $val->name !== "teacher" ){
                                    echo "<li id='e.".$val->name."'>$val->name</li>";}
                                    }
                                ?>
                                </div>
                            </div>
                            <div class="table">
                                <h3>Courses</h3>
                                <div class="field_list">

                                    <?php
                            $query=$elc_db->prepare("Select * from Courses");
                            $query->execute();
                            $result = $query->get_result();
                            $fields = $result->fetch_fields();
                            foreach ($fields as $val) {
                                if ($val->name !== "semester"){

                                echo "<li id='c.".$val->name."'>$val->name</li>";}
                            }
                            ?>
                                </div>
                            </div>

                            <div class="table">
                                <h3>Students</h3>
                                <div class="field_list">

                                    <?php
                                $query=$elc_db->prepare("Select * from Students");
                                $query->execute();
                                $result = $query->get_result();
                                $fields = $result->fetch_fields();
                                foreach ($fields as $val) {
                                    echo "<li id='s.".$val->name."'>$val->name</li>";
                                }
                                ?>
                                </div>
                            </div>
                            <div class="table">
                                <h3>Teachers</h3>
                                <div class="field_list">

                                    <?php
                                $query=$elc_db->prepare("Select * from Teachers");
                                $query->execute();
                                $result = $query->get_result();
                                $fields = $result->fetch_fields();
                                foreach ($fields as $val) {
                                    echo "<li id='t".$val->name."'>$val->name</li>";
                                }
                                ?>
                                </div>
                            </div>
                            <div class="table">
                                <h3>Semesters</h3>
                                <div class="field_list">

                                    <?php
                            $query=$elc_db->prepare("Select * from Semesters");
                            $query->execute();
                            $result = $query->get_result();
                            $fields = $result->fetch_fields();
                            foreach ($fields as $val) {
                                echo "<li id='sem.".$val->name."'>$val->name</li>";
                            }
                            ?>
                                </div>
                            </div>
                            <div class="table">
                                <h3>LATs</h3>
                                <div class="field_list">

                                    <?php
                            $query=$elc_db->prepare("Select * from Semester_Data");
                            $query->execute();
                            $result = $query->get_result();
                            $fields = $result->fetch_fields();
                            foreach ($fields as $val) {
                                if ($val->name !== "id" && $val->name !== "semester" && $val->name !== "student_id"){

                                echo "<li id='sd.".$val->name."'>$val->name</li>";}
                            }
                            ?>
                                </div>
                            </div>
                            <div class="table">
                                <h3>Student Grades</h3>
                                <div class="field_list">

                                    <?php
                            $query=$elc_db->prepare("Select * from Student_Enrollments");
                            $query->execute();
                            $result = $query->get_result();
                            $fields = $result->fetch_fields();
                            foreach ($fields as $val) {
                                if ($val->name !== "id" && $val->name !== "semester" && $val->name !== "student_id" && $val->name !== "course_id"){

                                echo "<li id='se.".$val->name."'>$val->name</li>";}
                            }
                            ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="downloads">
                    <p>Click on a link below to download a CVS version of the report.</p>
                    <div id="downloads_container">
                        <a href='commonReports/alldata.php'>All Evaluation Data</a>
                        <a href='commonReports/classes.php'>NPS by Course</a>
                        <a href='commonReports/classnames.php'>NPS by Course Name</a>
                        <a href='commonReports/classnamesbysemester.php'>NPS by Course Name and Semester</a>
                        <a href='commonReports/levels.php'>NPS by Levels</a>
                        <a href='commonReports/levelsbysemester.php'>NPS by Levels and Semester</a>
                        <a href='commonReports/semesters.php'>NPS by Semester</a>
                        <a href='commonReports/skillareas.php'>NPS by Skill Area</a>
                        <a href='commonReports/teachers.php'>NPS by Teacher</a>
                        <a href='commonReports/total.php'>Total</a>
                    </div>
                </div>
        </article>
        <footer>
            <div id="results"></div>
        </footer>


    </body>

    </html>
