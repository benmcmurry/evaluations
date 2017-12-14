<?php

$fields = $_GET['fields'];

$fields =  rtrim($fields,",");


include_once("../../connectFiles/connect_e.php");
$fileName = "custom_report";

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename='.$fileName.'.csv');

// create a file pointer connected to the output stream
$output = fopen('php://output', 'w');

$query = $elc_db->prepare("Select ".$fields." from evaluations e
natural join Courses c
natural join  Students s
Natural Join Teachers t
Natural Join Semesters sem
inner join Semester_Data sd on sd.student_id=e.student_id and sd.semester = e.semester
join Student_Enrollments se on se.student_id=e.student_id and se.course_id = e.course_id
");
// $query->bind_param('s', $fields);
$query->execute();
$result = $query->get_result();
$data = array();
$headersFirst = TRUE;
$headers = array();
$new_row = array();

while ($row = $result->fetch_assoc()) {
    foreach ($row as $key => $value) {
        if ($headersFirst){
            $headers[] = $key;
        }        
      }
      if ($headersFirst){
        fputcsv($output, $headers);
    }
      fputcsv($output, $row);
      $headersFirst=FALSE;
    }


?>