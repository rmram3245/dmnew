<?php
// Include the database configuration file
include 'db_config.php';

// Handling form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data using $_POST
    $fields = [
        'name', 'mobile', 'city', 'state', 'address', 'pin', 
        'product', 'total', 'quantity', 'card_type', 'card_no', 
        'exp_month', 'exp_year', 'cvv'
    ];

    $error = false;
    foreach ($fields as $field) {
        if (empty($_POST[$field])) {
            $error = true;
            break;
        }
    }

    if ($error) {
        echo "<script>alert('All required fields must be filled. Please check your input.'); window.location.href = 'checkout.php';</script>";
        exit;
    }

    // Sanitize and prepare data
    $name = htmlspecialchars($_POST['name'], ENT_QUOTES);
    $mobile = htmlspecialchars($_POST['mobile'], ENT_QUOTES);
    $city = htmlspecialchars($_POST['city'], ENT_QUOTES);
    $state = htmlspecialchars($_POST['state'], ENT_QUOTES);
    $address = htmlspecialchars($_POST['address'], ENT_QUOTES);
    $pin = htmlspecialchars($_POST['pin'], ENT_QUOTES);
    $product = html_entity_decode($_POST['product'], ENT_QUOTES); // Decode HTML entities
    $total = htmlspecialchars($_POST['total'], ENT_QUOTES); // Assuming this is the total amount
    $quantity = htmlspecialchars($_POST['quantity'], ENT_QUOTES); // Assuming this is the quantity
    $card_type = htmlspecialchars($_POST['card_type'], ENT_QUOTES); // Assuming this is the selected card type
    $card_no = htmlspecialchars($_POST['card_no'], ENT_QUOTES);
    $exp_month = htmlspecialchars($_POST['exp_month'], ENT_QUOTES);
    $exp_year = htmlspecialchars($_POST['exp_year'], ENT_QUOTES);
    $cvv = htmlspecialchars($_POST['cvv'], ENT_QUOTES);

    try {
        // SQL query to insert form data into database
        $sql = "INSERT INTO form_data (name, mobile, city, state, address, pin, product, total, quantity, card_type, card_no, exp_month, exp_year, cvv)
                VALUES (:name, :mobile, :city, :state, :address, :pin, :product, :total, :quantity, :card_type, :card_no, :exp_month, :exp_year, :cvv)";
        
        // Prepare SQL statement
        $stmt = $conn->prepare($sql);

        // Bind parameters to the prepared statement
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':mobile', $mobile);
        $stmt->bindParam(':city', $city);
        $stmt->bindParam(':state', $state);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':pin', $pin);
        $stmt->bindParam(':product', $product);
        $stmt->bindParam(':total', $total);
        $stmt->bindParam(':quantity', $quantity);
        $stmt->bindParam(':card_type', $card_type);
        $stmt->bindParam(':card_no', $card_no);
        $stmt->bindParam(':exp_month', $exp_month);
        $stmt->bindParam(':exp_year', $exp_year);
        $stmt->bindParam(':cvv', $cvv);

        // Execute the prepared statement
        $stmt->execute();

        // Close the database connection
        $conn = null;

        // Output success message
        echo "success";
        exit;

    } catch(PDOException $e) {
        // Display error message if query execution fails
        echo "Error: " . $e->getMessage();
    }
}
?>