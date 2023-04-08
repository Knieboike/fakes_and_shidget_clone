<?php
// Step 2: Connect to the database
$host = "localhost";
$username = "root";
$password = "";
$database = "values";

if (!empty($integer_value)){

}



$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 4: Handle the form submission
if (isset($_POST['submit'])) {
    $integer_value = $_POST['integer_value'];

    // Step 5: Save the integer value to the database
    $sql = "INSERT INTO attributeschars (id, atk, def, hp, intelligenz) VALUES (1, '$integer_value', 1, 1, 1)";
    if ($conn->query($sql) === TRUE) {
        echo "Integer value saved successfully";
    } else {
        echo "Error saving integer value: " . $conn->error;
    }
}

// Step 6: Update the integer value
if (isset($_POST['increment'])) {
    $new_value = min($integer_value + 1, 100); // increment the value and cap it at 100
    $sql = "UPDATE attributeschars SET atk='$new_value' WHERE id=1";
    if ($conn->query($sql) === TRUE) {
        echo "Integer value updated successfully";
        $integer_value = $new_value;
    } else {
        echo "Error updating integer value: " . $conn->error;
    }
} elseif (isset($_POST['decrement'])) {
    $new_value = max($integer_value - 1, 0); // decrement the value and cap it at 0
    $sql = "UPDATE attributeschars SET atk='$new_value' WHERE id=1";
    if ($conn->query($sql) === TRUE) {
        echo "Integer value updated successfully";
        $integer_value = $new_value;
    } else {
        echo "Error updating integer value: " . $conn->error;
    }
}

// Step 7: Display the integer value in HTML
$sql = "SELECT atk FROM attributeschars WHERE id=1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $integer_value = $row["atk"];
    echo "The integer value is: " . $integer_value;
} else {
    echo "No integer value found";
}

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Sign up</title>
</head>
<body>
<form method="post">
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Combat</title>
        <link rel="stylesheet" href="css/styles.css"/>
    </head>
    <body>
    <div class="fight">
        <div class="char">
            <div class="image-container"><img src="pictures/hero.jpg" alt="hero"></div>
            <p> Lvl</p>
            <p> ATK</p>
            <label for="integer_field">Attack:</label>
            <input type="text" id="integer_field" name="integer_value" value="<?php echo $integer_value; ?>" readonly>
            <br>
            <p> VTD</p><br>
            <button>Test</button>
        </div>
    </div>

    <br>
    <br>
    <button type="submit" name="increment">+</button>
    <button type="submit" name="decrement">-</button>
    </body>
    </html>
</form>

