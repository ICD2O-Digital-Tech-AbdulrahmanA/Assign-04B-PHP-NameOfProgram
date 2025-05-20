<?php
$_POST = [
    'pSize' => 'Medium',
    'pType' => 'Penne',
    'pSauce' => 'Tomato',
    'pCheese' => 'Mozzarella',
    'extraSauce' => 'on',
    'extraCheese' => 'on',
    'greens' => 'on',
    'extraGreens' => 'on'
];

// NORMAL CONSTANTS
$size = $_POST['pSize'] ?? '';
$type = $_POST['pType'] ?? '';
$sauce = $_POST['pSauce'] ?? '';
$cheese = $_POST['pCheese'] ?? '';

// EXTRA CONSTANTS
$extraSauce = isset($_POST['extraSauce']);
$extraCheese = isset($_POST['extraCheese']);
$greens = isset($_POST['greens']);
$extraGreens = isset($_POST['extraGreens']);

// PRICE CONSTANT
$prices = [
    "Medium" => 8.99,
    "Large" => 13.99,
    "sauce" => 4.99,
    "cheese" => 1.99,
    "extraSauce" => 2.00,
    "extraCheese" => 1.00,
    "greens" => 0.99,
    "extraGreens" => 0.50
];

// HST CONSTANT
$HST_RATE = 0.13;

// IF NOTHING IS SELECTED
if (empty($size) || empty($type) || empty($sauce)) {
    echo "Please select pasta size, type, and sauce.\n";
    exit;
}

// PRICE ADDER CALCULATION
$subtotal = 0;
$subtotal += $prices[$size];
$subtotal += $prices['sauce'];
if (!empty($cheese)) $subtotal += $prices['cheese'];
if ($extraSauce) $subtotal += $prices['extraSauce'];
if ($extraCheese) $subtotal += $prices['extraCheese'];
if ($greens) $subtotal += $prices['greens'];
if ($extraGreens) $subtotal += $prices['extraGreens'];

// TAX/TOTAL CALCULATION
$tax = $subtotal * $HST_RATE;
$total = $subtotal + $tax;

// ORDER SUMMARY
echo "Your Order:\n";
echo "- Size: $size\n";
echo "- Pasta Type: $type\n";
echo "- Sauce: $sauce\n";
echo "- Cheese: " . ($cheese ?: 'No Cheese') . "\n";
if ($extraSauce) echo "- Extra Sauce\n";
if ($extraCheese) echo "- Extra Cheese\n";
if ($greens) echo "- Greens\n";
if ($extraGreens) echo "- Extra Greens\n";

// DISPLAY FINAL ORDER SUMMARY
echo "\nSubtotal: $" . number_format($subtotal, 2) . "\n";
echo "HST (13%): $" . number_format($tax, 2) . "\n";
echo "Total: $" . number_format($total, 2) . "\n";
