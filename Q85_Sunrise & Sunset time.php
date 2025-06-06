<?php
// Set location coordinates (example: Delhi, India)
$latitude = 28.6139;
$longitude = 77.2090;
$zenith = 90;
$timestamp = strtotime("today");

// Get sunrise and sunset times
$sunrise = date("H:i:s", date_sunrise($timestamp, SUNFUNCS_RET_TIMESTAMP, $latitude, $longitude, $zenith));
$sunset = date("H:i:s", date_sunset($timestamp, SUNFUNCS_RET_TIMESTAMP, $latitude, $longitude, $zenith));

// Display results
echo "Sunrise time: " . $sunrise . "<br>";
echo "Sunset time: " . $sunset . "<br>";

echo "This code is executed by Kamal Mittal!";
?>