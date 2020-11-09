
<?php
if(isset($_POST["submit"])){
// Checking For Blank Fields..
if($_POST["vname"]==""||$_POST["vemail"]==""||$_POST["subject"]==""||$_POST["message"]==""){
echo "Please go back and fill all fields.";
echo $_POST["vname"]; echo $_POST["vemail"]; echo $_POST["subject"]; echo $_POST["message"];

}else{
// Check if the "Sender's Email" input field is filled out
$email=$_POST['vemail'];
// Sanitize E-mail Address
$email =filter_var($email, FILTER_SANITIZE_EMAIL);
// Validate E-mail Address
$email= filter_var($email, FILTER_VALIDATE_EMAIL);
if (!$email){
echo "Invalid Sender's Email";
}
else{
$subject = $_POST['subject'];
$message = $_POST['message'];
$name = $_POST['vname'];
$message =  $message."\n".$name;
$from = $email;
$headers = "From:" . $from; // Sender's Email
// $headers .= 'Cc:'. $from; // Carbon copy to Sender
// Message lines should not exceed 70 characters (PHP rule), so wrap it
$message = wordwrap($message, 70);
// Send Mail By PHP Mail Function
mail("mrayushraj2@gmail.com", $subject, $message, $headers);
echo "Your mail has been sent successfuly. Go back to browse further.";
}
}
}
?>
