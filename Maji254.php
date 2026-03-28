
<?php
require_once("config.php");
require_once("dbconnector.php");

// Read POST data
$sessionId   = $_POST["sessionId"];
$serviceCode = $_POST["serviceCode"];
$phoneNumber = $_POST["phoneNumber"];
$text        = $_POST["text"];

$level = explode("*", $text);

if ($text == "") {
    $response  = "CON Welcome to Maji254 Alert - Water & Sanitation Service \n";
    $response .= "1. Report Issue \n";
    $response .= "2. Find Safe Water Point \n";
    $response .= "3. Water & Hygiene Tips";
} 
else if ($text == "1") {
    $response  = "CON Select issue type \n";
    $response .= "1. Burst pipe / Leak \n";
    $response .= "2. Dirty/Unsafe Water \n";
    $response .= "3. Sanitation Problem";
} 
else if ($text == "2") {
    $response  = "CON Enter your area/ward code:";
} 
else if ($text == "3") {
    $response  = "END TIP: Always boil or treat water before drinking.";
} 
else if ($text == "1*1") {
    $response  = "CON Enter location/landmark of the burst pipe:";
} 
else if ($text == "1*2") {
    $response  = "CON Enter location/landmark of the unsafe water source:";
} 
else if ($text == "1*3") {
    $response  = "CON Enter location/landmark of the sanitation issue:";
} 

// SAVE REPORT
else if (count($level) == 3 && $level[0] == "1") {

    $location = $level[2];

    // Determine issue type
    $issueType = "";
    if ($level[1] == "1") $issueType = "Burst pipe / Leak";
    if ($level[1] == "2") $issueType = "Dirty/Unsafe Water";
    if ($level[1] == "3") $issueType = "Sanitation Problem";

    // Insert into DB
    $stmt = $conn->prepare("INSERT INTO reports (phone_number, issue_type, location) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $phoneNumber, $issueType, $location);
    $stmt->execute();

    $response = "END Thank you. Your report has been received.";
} 

// FETCH WATER POINT
else if (count($level) == 2 && $level[0] == "2") {

    $areaCode = $level[1];

    $stmt = $conn->prepare("SELECT name FROM water_points WHERE area_code = ? LIMIT 1");
    $stmt->bind_param("s", $areaCode);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        $response = "END Nearest safe water point: " . $row['name'];
    } else {
        $response = "END No water point found in this area.";
    }
}

header('Content-type: text/plain');
echo $response;
?>
