<?php

$reply = ["hello" => "world", "headers" => getallheaders()];
$somedata = ["Wolverine" => "logan"];
header("Content-Type: application/json");
// echo json_encode($reply);
$headers = getallheaders();

// echo $headers["X-Men"];

// $reply = ["mutant" => $headers["X-Men"], "name"=> $somedata[$headers["X-Men"]]];
// if($reply["name"] == null)
//   $reply["name"] = "Unknown";
// echo json_encode($reply);


// $name = $somedata[$headers["X-Men"]];

// if($name == null) {
//   http_response_code(400);
//   $reply = ["error"=> "Please provide an X-Men mutant and reveal their human name", "headers"=>$headers];
// } else {
//   $reply = ["mutant" => $headers["X-Men"], "name"=> $somedata[$headers["X-Men"]]];
// }

// echo json_encode($reply);

// echo json_encode($headers);
// list($type, $bearer) = explode(" ", $headers["Authentication"]);
// // echo json_encode($bearer);
// if($type == "Bearer" && $bearer == "professorcharlesxavier") {
//   $reply = ["mutant" => $headers["X-Men"], "name"=> $somedata[$headers["X-Men"]]];
//   if($reply["name"] == null)
//     $reply["name"] = "Unknown";
// } else {
//   http_response_code(401);
//   $reply = ["error"=>"Invalid token.", "token"=>$bearer, "type"=>$type];
// }
// echo json_encode($reply);


list($type, $bearer) = explode(" ", $headers["Authentication"]);
// echo json_encode($bearer);

$dbconn = pg_connect("host=localhost port=5432 dbname=phpapp");
$result = pg_query($dbconn, "SELECT name FROM clients WHERE token=\'"+$bearer+"\';");
$rows = pg_num_rows($result);

// $validbearer = ;
// if($type == "Bearer" && $validbearer) {
if($type == "Bearer" && $rows == 1) {
  $reply = ["mutant" => $headers["X-Men"], "name"=> $somedata[$headers["X-Men"]]];
  if($reply["name"] == null)
    $reply["name"] = "Unknown";
} else {
  http_response_code(401);
  $reply = ["error"=>"Invalid token.", "token"=>$bearer, "type"=>$type];
}
echo json_encode($reply);

?>

