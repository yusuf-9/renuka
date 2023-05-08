<?php
// Get JSON input from POST request
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");
;
$input_json = file_get_contents('php://input');
$input_data = json_decode($input_json, true);
include("conn.php");
$name = $input_data['name'];
$email = $input_data['email'];
$subjectMessage = $input_data['subject'];
$contactMessage = $input_data['message'];

$uid = $input_data['userId'];
// Check response from SMS API
if (!empty($name) && !empty($email) && !empty($subject) && !empty($message)) {

    $to_email = 'yusufahmed195@gmail.com';
    $subject = 'New message recieved through website contact form';

    // Set email message
    $message = '<html>
                                <head>
                                    <title>Message</title>
                                </head>
                                <body>
                                    <h3>This message was sent by ' . $name . ',</h3>
                                    <br>
                                    <h3>Their email address is - ' . $email . '</h3>
                                    <h3>Their message is -</h3>
                                    <p>Subject - ' . $subjectMessage . '</p>
                                    <p>Message -' . $contactMessage . '</p><br>
                                   
                                    <p>Thank you.</p>
                                </body>
                            </html>';

    // Set email headers
    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type:text/html;charset=UTF-8' . "\r\n";
    $headers .= 'From: Renuka <noreply@renuka.com>' . "\r\n";

    // Send email
    if (mail($to_email, $subject, $message, $headers)) {
        $response = array('status' => 'failed', 'message' => 'Message sent successfully!');
    } else {
        $response = array('status' => 'failed', 'message' => 'problem while sending email');
    }

} else {
    $response = array('status' => 'error', 'message' => 'missing name, email, subject or message');
}


// Send JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>