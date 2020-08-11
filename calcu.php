<?php
//$connect = mysqli_connect("localhost", "root", "", "grade_sample");

$subjects = $_POST["subj"];
$grades = $_POST["grade"];
$units = $_POST["units"];

$number = count($subjects);

if($number > 0)
{
	$uns = 0;
	$roll = 0;
	$gwa = 0;
	for($i=0; $i<$number; $i++)
	{
		if(trim($_POST["grade"][$i] != ''))
		{
			//$stmt = $connect->prepare("INSERT INTO sample (Subject, Grade, Units) VALUES(?,?,?)");
			//$stmt->bind_param("sdi", $subj, $grade, $unit);
			//$subj = $subjects[$i];
			//$unit = $units[$i];
			//$grade = $grades[$i];
			//$stmt->execute();

			$uns += $units[$i];
			$roll += ($units[$i]*$grades[$i]);
		}
	}
	$gwa = $roll / $uns;
	echo json_encode(array('success' => $gwa));
}
else
{
	echo json_encode(array('success' => 0));
}