<?php
header('Access-Control-Allow-Origin: *');  
// server info
$server = 'localhost';
$user = 'root';
$pass = '';
$db = 'hostel';

$mysqli = new mysqli($server, $user, $pass, $db);
$number=$_GET["number"];
$id=$_GET["id"];

// show errors 
mysqli_report(MYSQLI_REPORT_ERROR);	

$sql="Select * from student_data where phone='$number' and student_id='$id'";
$result=$mysqli->query($sql);

if(mysqli_num_rows($result)==1){
    $r=rand(1000,9999);
    try{
        $soapClient = new SoapClient("https://api2.onnorokomSMS.com/sendSMS.asmx?wsdl");
        $paramArray = array(
        'userName' => "01825314306",
        'userPassword' => "2978d85534",
        'mobileNumber' => $number,
        'smsText' => "Your verification code from HUB Admission is ".$r,
        'type' => "TEXT",
        'maskName' => '',
        'campaignName' => '',
        );
        $value = $soapClient->__call("OneToOne", array($paramArray));
      
        } catch (Exception $e) {
        echo $e->getMessage();
        }
   echo $r;
}
else{
    echo "not";
}

?>