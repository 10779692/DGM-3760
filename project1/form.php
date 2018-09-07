<?php
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$university = $_POST['university'];
$year = $_POST['year'];
$gradeyear = $_POST['gradeyear'];
$email = $_POST['email'];
$custommessage = $_POST['custommessage'];

$to = 'jared@jreedtkd.com';
$subject = 'Test Email';
$msg = "The student's first name is $firstname and their last name is $lastname. Currently, they attend $university and they plan to graduate by $year. At the moment, they are a $gradeyear. They have left a custom messsage. $firstname said: $custommessage";
$returnmail =  mail($to, $subject, $msg);

echo 'Thanks for submitting the form. We will be in touch with you very soon. Have a wonderful day!';
?>