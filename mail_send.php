<?php 
$errors = '';
$myemail = 'johnnykru@gmail.com';
if(empty($_POST['First_Name'])  ||
   empty($_POST['Last_Name']) ||
empty($_POST['email']) ||
empty($_POST['phone']) ||
empty($_POST['subject']) ||
empty($_POST['comment']) ||
{
    $errors .= "\n Error: all fields are required";
}
$First_Name = $_POST['First_Name'];
$Last_Name = $_POST['Last_Name'];
$Email = $_POST['email'];
$Phone = $_POST['phone'];
$Subject = $_POST['subject'];
$Comment = $_POST['comment'];


if (!preg_match(
"/ ^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i",
$Email))
{
    $errors .= "\n Error: Invalid email address";
}
if( empty($errors))
{
    $to = '$myemail';
    $email_subject = "Contact form submission: $name";
    $email_body = "You have received a new message. ".
        " Here are the details:\n Name: $name \n ".
        "Email: $Email\n Message \n $message";
    $headers = "From: $myemail\n";
    $headers .= "Reply-To: $Email";
    mail($to,$email_subject,$email_body,$headers);
    //redirect to the 'thank you' page
    header('Location:thankyou.html');
}
?>