<?php
// Assuming you have already collected and stored the user's address and coordinates in your database

// Function to query Google Places API for nearest police station
function getNearestPoliceStation($latitude, $longitude) {
    // Use Google Places API to find nearby police stations based on user's coordinates
    // Example implementation: Use the Google Places API nearby search with type='police' and user's coordinates
    // Return the details of the nearest police station
}

if(isset($_POST["submit_address"]) || isset($_POST["submit_coordinates"])) {
    // Handle form submission and display map

    if(isset($_POST["submit_address"])) {
        $address = urlencode($_POST["address"]); // Sanitize input
        // Convert address to coordinates and store in database
        // Example: Use geocoding service like Google Geocoding API
    } else if(isset($_POST["submit_coordinates"])) {
        $latitude = $_POST["latitude"];
        $longitude = $_POST["longitude"];
    }

    // Display Google Map with the provided address or coordinates
    ?>
    <iframe width="100%" height="500" src="https://maps.google.com/maps?q=<?php echo isset($address) ? $address : $latitude . ',' . $longitude; ?>&output=embed"></iframe>
    <?php

    // Find nearest police station based on user's coordinates
    $nearestPoliceStation = getNearestPoliceStation($latitude, $longitude);

    // Display information about the nearest police station
    echo "<p>Nearest Police Station: " . $nearestPoliceStation["name"] . "</p>";
}
?>

<form method="POST">
    <p>
        <input type="text" name="address" placeholder="Enter address">
    </p>
    <input type="submit" name="submit_address">
</form>
<form method="POST">
    <p>
        <input type ="text" name="latitude" placeholder="Enter latitude">
    </p>
    <p>
        <input type="text" name="longitude" placeholder="Enter longitude">
    </p>
    <input type="submit" name="submit_coordinates">
</form>
