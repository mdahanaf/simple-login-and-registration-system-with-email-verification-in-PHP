<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


function sendEmail($email, $subject, $body){
    $mail = new PHPMailer(true);

    $mail->SMTPDebug = false;                     
    $mail->isSMTP();                                          
    $mail->Host       = 'smtp.gmail.com';                    
    $mail->SMTPAuth   = true;                                 
    $mail->Username   = 'your-gmail-id';                     
    $mail->Password   = 'https://myaccount.google.com/apppasswords';                               
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            
    $mail->Port       = 587;                                    

    
    $mail->setFrom('your-gmail-id', 'your-name');
    $mail->addAddress($email);     
                
    $mail->addReplyTo('your-gmail-id', 'your-name');
   

    
    $mail->isHTML(true);                                
    $mail->Subject = $subject;
    $mail->Body    = $body;

    $mail->send();
    echo 'Message has been sent successfully.';
} //End of sendEmail() function


function generateOTP(){
    $randomInteger = rand(100000, 999999);
    return $randomInteger;
}

function insertData($db_connection_variable, $sql_query){
    mysqli_query($db_connection_variable, $sql_query);
}

function getData($db_connection_variable, $sql){
    $result = mysqli_query($db_connection_variable, $sql);
    $arr = mysqli_fetch_all($result, MYSQLI_NUM);

    return $arr;
}

function updateData($db_connection_variable, $sql_query){
    mysqli_query($db_connection_variable, $sql_query);
}
