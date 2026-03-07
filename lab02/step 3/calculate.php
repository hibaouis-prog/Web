<?php

header('Content-Type: application/json');

$courses = $_POST['course'];
$credits = $_POST['credits'];
$grades = $_POST['grade'];

$totalPoints = 0;
$totalCredits = 0;

$tableHtml = "<table class='table table-bordered mt-3'>";

$tableHtml .= "<tr>
<th>Course</th>
<th>Credits</th>
<th>Grade</th>
<th>Points</th>
</tr>";

for ($i = 0; $i < count($courses); $i++) {

$course = $courses[$i];
$cr = floatval($credits[$i]);
$g = floatval($grades[$i]);

$points = $cr * $g;

$totalPoints += $points;
$totalCredits += $cr;

$tableHtml .= "<tr>
<td>$course</td>
<td>$cr</td>
<td>$g</td>
<td>$points</td>
</tr>";

}

$tableHtml .= "</table>";

$gpa = $totalPoints / $totalCredits;

$message = "Your GPA is " . number_format($gpa,2);

echo json_encode([
"success"=>true,
"gpa"=>$gpa,
"message"=>$message,
"tableHtml"=>$tableHtml
]);

?>
