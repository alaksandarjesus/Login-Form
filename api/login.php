<?php 


// Report all PHP errors
error_reporting(-1);

// Same as error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);

/*Enter your database username*/
$db_username = "root";

/*Enter your database password*/
$db_password = "";

/*Enter your database name*/
$db_name="";

$dbconnect = new PDO("mysql:host=localhost;dbname=".$db_name, $db_username, $db_password);
$postdata = json_decode(file_get_contents("php://input"));
foreach($postdata as $key => $value){
$credentials[$key] = $value;
};
$output = false;
$sql = "SELECT * FROM users WHERE username = ? && password = ?";
$getData = $dbconnect->prepare($sql);
$getData->execute(array($credentials['username'],$credentials['password']));
$row = $getData->fetchAll(PDO::FETCH_ASSOC);
if(count($row)>0){

    $output = true;
};

echo json_encode(array("result"=>$output));

