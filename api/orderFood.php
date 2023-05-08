<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");
$input_json = file_get_contents('php://input');
$input_data = json_decode($input_json, true);
include("conn.php");
$name = $input_data['name'];
$mobile = $input_data['mobile'];
$address = $input_data['address'];
$email = $input_data['email'];
$dob = $input_data['dob'];
$offername = $input_data['offername'];
$amount = $input_data['amount'];
$remarks = $input_data['remarks'];

// Check if all inputs are not empty
if (!empty($name) && !empty($mobile) && !empty($address) && !empty($email) && !empty($dob) && !empty($offername) && !empty($amount) && !empty($remarks)) {
    $response = array('status' => 'success', 'message' => 'Insert query successfully.','data' => $input_data);
    $sql = "INSERT INTO `users` (`name`, `mobile`, `address`, `email`, `dob`, `offername`, `amount`, `remarks`) VALUES ('$name', '$mobile', '$email', '$address', '$dob', '$offername', '$amount', '$remarks')";

    // Execute the insert query
    if (mysqli_query($conn, $sql)) {
        // Send JSON response
        header('Content-Type: application/json');
        echo json_encode($response);
    } else {
        $response = array('status' => 'failed', 'message' => 'Insert query failed.','data' =>null);
        header('Content-Type: application/json');
        echo json_encode($response);
    }
} else {
    $response = array('status' => 'error', 'message' => 'Invalid input data.','data' =>null);
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>
