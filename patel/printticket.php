

<?php
session_start();

// Retrieve session data
$name = isset($_SESSION['name']) ? $_SESSION['name'] : '';
$mobile = isset($_SESSION['mobile']) ? $_SESSION['mobile'] : '';
$email = isset($_SESSION['email']) ? $_SESSION['email'] : '';
$date = isset($_SESSION['date']) ? $_SESSION['date'] : '';

$adultQuantity = isset($_SESSION['adult_quantity']) ? $_SESSION['adult_quantity'] : 0;
$childQuantity = isset($_SESSION['child_quantity']) ? $_SESSION['child_quantity'] : 0;
$adultOffer = isset($_SESSION['adult_offer']) ? $_SESSION['adult_offer'] : '';
$childOffer = isset($_SESSION['child_offer']) ? $_SESSION['child_offer'] : '';

// Prices and offers
$adultPrice = 1000; // Assuming a fixed price of 50 for adult tickets
$childPrice = 700; // Assuming a fixed price of 30 for child tickets

$adultOffers = array(
    'ADULT10' => 10,
    'ADULT20' => 20,
    'NOOFFER' => 0
);

$childOffers = array(
    'CHILD10' => 10,
    'CHILD20' => 20,
    'NOOFFER' => 0
);

function displayPriceWithRupeeSymbol($price) {
    // Prepend Rupee symbol (₹) to the price and return
    return '₹' . $price;
}

// Function to calculate discounted price
function calculateDiscount($price, $offer) {
    global $adultOffers, $childOffers;

    $offers = ($price === 50) ? $adultOffers : $childOffers;

    if (isset($offers[$offer])) {
        $discountPercent = $offers[$offer];
        $discountedPrice = $price - ($price * $discountPercent / 100);
        return $discountedPrice;
    } else {
        return $price;
    }
}

// Calculate total prices
$adultTotalPrice = $adultPrice * $adultQuantity;
$childTotalPrice = $childPrice * $childQuantity;

// Calculate final prices after discount
$adultFinalPrice = calculateDiscount($adultTotalPrice, $adultOffer);
$childFinalPrice = calculateDiscount($childTotalPrice, $childOffer);
$Total_Amount = $adultFinalPrice + $childFinalPrice;

// echo "Total Price for Adult Tickets: " . displayPriceWithRupeeSymbol($adultFinalPrice) . "<br>";
// echo "Total Price for Child Tickets: " . displayPriceWithRupeeSymbol($childFinalPrice) . "<br>";
// echo "Total Price for Both Tickets: " . displayPriceWithRupeeSymbol($Total_Amount) . "<br>";
?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            margin: 50px;
        }

        h1, h2 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        strong {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Ticket Information</h1>
    <table>
        <tr>
            <th colspan="2">Personal Information</th>
        </tr>
        <tr>
            <td><strong>Name:</strong></td>
            <td><?php echo $name; ?></td>
        </tr>
        <tr>
            <td><strong>Mobile Number:</strong></td>
            <td><?php echo $mobile; ?></td>
        </tr>
        <tr>
            <td><strong>Email:</strong></td>
            <td><?php echo $email; ?></td>
        </tr>
        <tr>
            <td><strong>Date:</strong></td>
            <td><?php echo $date; ?></td>
        </tr>
        <tr>
            <th colspan="2">Adult Tickets</th>
        </tr>
        <tr>
            <td><strong>Quantity:</strong></td>
            <td><?php echo $adultQuantity; ?></td>
        </tr>
        <tr>
            <td><strong>Adult Price:</strong></td>
            <td><?php echo $adultTotalPrice; ?></td>
        </tr>
        <tr>
            <td><strong>Selected Offer:</strong></td>
            <td><?php echo $adultOffer; ?></td>
        </tr>
        <tr>
            <td><strong>Final Price after Discount:</strong></td>
            <td><?php echo $adultTotalPrice; ?></td>
        </tr>
        <tr>
            <th colspan="2">Child Tickets</th>
        </tr>
        <tr>
            <td><strong>Quantity:</strong></td>
            <td><?php echo $childQuantity; ?></td>
        </tr>
        <tr>
            <td><strong>Child Price:</strong></td>
            <td><?php echo $childTotalPrice; ?></td>
        </tr>
        <tr>
            <td><strong>Selected Offer:</strong></td>
            <td><?php echo $childOffer; ?></td>
        </tr>
        <tr>
            <td><strong>Final Price after Discount:</strong></td>
            <td><?php echo $childFinalPrice; ?></td>
        </tr>
        <th colspan="2">Total Price</th>
        <tr>
            <td><strong>Total Price :</strong></td>
            <td><?php echo $Total_Amount; ?></td>
        </tr>
    </table>
    <br>
     <button onclick="window.print()">print</button>
</body>
</html>

