<?php
session_start();
    include_once("../../connectFiles/connect_cis.php");
    include_once("cas-go.php");
    include_once("teachers.php");
?>
<!DOCTYPE html>
<html lang="">
<head>
	<title>Curriculum Portfolio - English Language Center</title>

<!-- 	Meta Information -->
	<meta charset="utf-8">
	<meta name="description" content="This section of the ELC website outlines the ELC curriculum." />
	<meta name="keywords" content="ELC, BYU, ESL, Curriculum, Levels, Learning, Outcomes" />
	<meta name="robots" content="ELC, BYU, ESL, Curriculum, Levels, Learning, Outcomes" />
	<meta name="viewport" content="width=device-width, initial-scale=1">


<?php include_once("content/styles_and_scripts.html"); ?>
</head>
<body>
	<header>
		<?php include("content/header.php"); ?>
	</header>
	<nav>
		<?php include("content/nav-bar.php"); ?>
	</nav>
	<article>
        <h3> Who has taught my class before? </h3>
		<?php
        $query = $elc_db->prepare("Select t.teacher_first_name, t.teacher_last_name, t.teacher_email_address, c.level_name, c.course_name, s.semester_name, s.semester_year from Teacher_Enrollments te natural join Teachers t natural join Courses c natural join Semesters s order by c.level_number, c.skill_area_code, s.semester_year, s.semester_name ASC");
        // $query = $elc_db->prepare("Select Teacher_Enrollments.te_id, Teachers.teacher_first_name, Teachers.teacher_last_name, Teachers.teacher_email_address, Courses.level_name, Courses.course_name, Semesters.semester_name, Semesters.semester_year from Teacher_Enrollments natural join Teachers natural join Courses natural join Semesters order by Courses.level_number, Courses.skill_area_code, Semesters.semester_year, Semesters.semester_name ASC");
        echo $elc_db->error;
        $query->execute();
        $results = $query->get_result();
        
        ?>
	</article>
	<footer>
		<?php include("content/footer.html"); ?>
	</footer>

</body>
</html>
