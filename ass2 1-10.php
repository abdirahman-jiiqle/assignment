<!DOCTYPE html>
<html>
<head>
    <title>PHP Assignment 1</title>
</head>
<body>

<h1>PHP Assignment 1</h1>

<!-- 1. Greatest and Smallest -->
<h2>1. Greatest and Smallest</h2>

<?php
$a = 15;
$b = 25;
$c = 10;

$greatest = $a;

if ($b > $greatest) {
    $greatest = $b;
}

if ($c > $greatest) {
    $greatest = $c;
}

$smallest = $a;

if ($b < $smallest) {
    $smallest = $b;
}

if ($c < $smallest) {
    $smallest = $c;
}

echo "Greatest = " . $greatest . "<br>";
echo "Smallest = " . $smallest;
?>

<hr>

<!-- 2. Divisible by 3 and 5 -->
<h2>2. Divisible by 3 and 5</h2>

<?php
$number = 15;

if ($number % 3 == 0 && $number % 5 == 0) {
    echo "$number is divisible by both 3 and 5";
}
else if ($number % 3 == 0) {
    echo "$number is divisible by 3";
}
else if ($number % 5 == 0) {
    echo "$number is divisible by 5";
}
else {
    echo "$number is divisible by neither 3 nor 5";
}
?>

<hr>

<!-- 3. Odd and Even Numbers -->
<h2>3. Odd Numbers from 2 to 20</h2>

<?php
for ($i = 2; $i <= 20; $i++) {

    if ($i % 2 != 0) {
        echo $i . " ";
    }
}
?>

<h2>Even Numbers from 35 to 7</h2>

<?php
for ($i = 35; $i >= 7; $i--) {

    if ($i % 2 == 0) {
        echo $i . " ";
    }
}
?>

<hr>

<!-- 4. Divisible by 2 and 5 -->
<h2>4. Numbers Divisible by 2 and 5 from 50 to 2</h2>

<?php
for ($i = 50; $i >= 2; $i--) {

    if ($i % 2 == 0 && $i % 5 == 0) {
        echo $i . " ";
    }
}
?>

<hr>

<!-- 5. Reverse Number -->
<h2>5. Reverse of a Number</h2>

<?php
$number = 12345;
$reverse = 0;

while ($number > 0) {

    $digit = $number % 10;

    $reverse = ($reverse * 10) + $digit;

    $number = (int)($number / 10);
}

echo "Reverse = " . $reverse;
?>

<hr>

<!-- 6. LCM -->
<h2>6. LCM of Two Numbers</h2>

<?php
$a = 8;
$b = 12;

$number = $a;

while (true) {

    if ($number % $a == 0 && $number % $b == 0) {
        echo "LCM of $a and $b = " . $number;
        break;
    }

    $number++;
}
?>

<hr>

<!-- 7. HCF -->
<h2>7. HCF of Two Numbers</h2>

<?php
$a = 18;
$b = 24;

$hcf = 1;

for ($i = 1; $i <= $a && $i <= $b; $i++) {

    if ($a % $i == 0 && $b % $i == 0) {
        $hcf = $i;
    }
}

echo "HCF of $a and $b = " . $hcf;
?>

<hr>

<!-- 8. Multiplication Table -->
<h2>8. Multiplication Table 1 to 12</h2>

<table border="1" cellpadding="8">

<?php
for ($i = 1; $i <= 12; $i++) {

    echo "<tr>";

    for ($j = 1; $j <= 12; $j++) {

        echo "<td>";
        echo $i * $j;
        echo "</td>";
    }

    echo "</tr>";
}
?>

</table>

<hr>

<!-- 9. Prime or Non-Prime -->
<h2>9. Prime or Non-Prime</h2>

<?php
$number = 17;
$count = 0;

for ($i = 1; $i <= $number; $i++) {

    if ($number % $i == 0) {
        $count++;
    }
}

if ($count == 2) {
    echo "$number is a Prime Number";
}
else {
    echo "$number is a Non-Prime Number";
}
?>

<hr>

<!-- 10. Prime Numbers from 10 to 50 -->
<h2>10. Prime Numbers from 10 to 50</h2>

<?php
for ($number = 10; $number <= 50; $number++) {

    $count = 0;

    for ($i = 1; $i <= $number; $i++) {

        if ($number % $i == 0) {
            $count++;
        }
    }

    if ($count == 2) {
        echo $number . " ";
    }
}
?>

</body>
</html>