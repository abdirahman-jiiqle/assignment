```php
<!DOCTYPE html>
<html>

<head>

    <title>PHP Assignment 2</title>

    <style>

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #1f3c88;
        }

        h2 {
            color: #1f3c88;
            margin-top: 30px;
        }

        h3 {
            color: #333;
        }

        table {
            width: 90%;
            border-collapse: collapse;
            margin: 15px 0 25px 0;
            background-color: white;
            box-shadow: 0 3px 8px rgba(0,0,0,0.15);
        }

        th {
            background-color: #1f3c88;
            color: white;
            padding: 12px;
            border: 2px solid #16316d;
        }

        td {
            padding: 10px;
            border: 1px solid #999;
            text-align: center;
        }

        tr:nth-child(even) {
            background-color: #eaf0ff;
        }

        tr:hover {
            background-color: #d6e2ff;
        }

        hr {
            border: 0;
            height: 2px;
            background-color: #1f3c88;
            margin: 30px 0;
        }

    </style>

</head>

<body>

<h1>PHP Assignment 2</h1>


<!-- ================= QUESTION 1 ================= -->

<h2>Question 1</h2>

<?php

$numbers = [5, -7, 12, 10, -7, 11, -6, 12, 1, -7, 2, 9];

echo "<b>All Elements:</b><br>";

foreach ($numbers as $number) {

    echo $number . " ";

}

echo "<br><br>";

$total = 0;

$evenTotal = 0;

$oddTotal = 0;

foreach ($numbers as $number) {

    $total = $total + $number;

    if ($number % 2 == 0) {

        $evenTotal = $evenTotal + $number;

    } else {

        $oddTotal = $oddTotal + $number;

    }

}

echo "Total = " . $total . "<br>";

echo "Even Total = " . $evenTotal . "<br>";

echo "Odd Total = " . $oddTotal . "<br>";

$minimum = min($numbers);

$maximum = max($numbers);

echo "Minimum = " . $minimum . "<br>";

echo "Minimum Positions: ";

foreach ($numbers as $position => $number) {

    if ($number == $minimum) {

        echo $position . " ";

    }

}

echo "<br>";

echo "Maximum = " . $maximum . "<br>";

echo "Maximum Positions: ";

foreach ($numbers as $position => $number) {

    if ($number == $maximum) {

        echo $position . " ";

    }

}

?>

<hr>


<!-- ================= QUESTION 2 ================= -->

<h2>Question 2</h2>

<?php

$colors = [

    "Light" => [

        "Red" => "Light Red",

        "Green" => "Light Green",

        "Blue" => "Light Blue"

    ],

    "Normal" => [

        "Red" => "Normal Red",

        "Green" => "Normal Green",

        "Blue" => "Normal Blue"

    ],

    "Dark" => [

        "Red" => "Dark Red",

        "Green" => "Dark Green",

        "Blue" => "Dark Blue"

    ]

];

?>

<table border="1">

<tr>

    <th></th>

    <th>Red</th>

    <th>Green</th>

    <th>Blue</th>

</tr>

<?php

foreach ($colors as $row => $columns) {

    echo "<tr>";

    echo "<th>" . $row . "</th>";

    foreach ($columns as $value) {

        echo "<td>" . $value . "</td>";

    }

    echo "</tr>";

}

?>

</table>

<hr>


<!-- ================= QUESTION 3 ================= -->

<h2>Question 3</h2>

<h2>Two Dimensional Square Array</h2>

<?php

// 1. Declare and initialize the array

$array = [

    [2, -6, 8],

    [-6, 1, 6],

    [7, 8, -6]

];


// 2. Print all elements of the array

echo "<h3>1. All Elements</h3>";

echo "<table border='1' cellpadding='10'>";

for ($i = 0; $i < 3; $i++) {

    echo "<tr>";

    for ($j = 0; $j < 3; $j++) {

        echo "<td>";

        echo $array[$i][$j];

        echo "</td>";

    }

    echo "</tr>";

}

echo "</table>";


// 3. Total of odd elements

$oddTotal = 0;

for ($i = 0; $i < 3; $i++) {

    for ($j = 0; $j < 3; $j++) {

        if ($array[$i][$j] % 2 != 0) {

            $oddTotal = $oddTotal + $array[$i][$j];

        }

    }

}

echo "<h3>2. Total of Odd Elements = $oddTotal</h3>";


// 4. Total of even elements

$evenTotal = 0;

for ($i = 0; $i < 3; $i++) {

    for ($j = 0; $j < 3; $j++) {

        if ($array[$i][$j] % 2 == 0) {

            $evenTotal = $evenTotal + $array[$i][$j];

        }

    }

}

echo "<h3>3. Total of Even Elements = $evenTotal</h3>";


// 5. Total of each row

echo "<h3>4. Total of Each Row</h3>";

for ($i = 0; $i < 3; $i++) {

    $rowTotal = 0;

    for ($j = 0; $j < 3; $j++) {

        $rowTotal = $rowTotal + $array[$i][$j];

    }

    echo "Row " . ($i + 1) . " Total = " . $rowTotal . "<br>";

}


// 6. Total of each column

echo "<h3>5. Total of Each Column</h3>";

for ($j = 0; $j < 3; $j++) {

    $columnTotal = 0;

    for ($i = 0; $i < 3; $i++) {

        $columnTotal = $columnTotal + $array[$i][$j];

    }

    echo "Column " . ($j + 1) . " Total = " . $columnTotal . "<br>";

}


// 7. Total of each diagonal

echo "<h3>6. Total of Each Diagonal</h3>";

$diagonal1 = 0;

$diagonal2 = 0;

for ($i = 0; $i < 3; $i++) {

    $diagonal1 = $diagonal1 + $array[$i][$i];

    $diagonal2 = $diagonal2 + $array[$i][2 - $i];

}

echo "Main Diagonal Total = " . $diagonal1 . "<br>";

echo "Second Diagonal Total = " . $diagonal2 . "<br>";


// 8. Total of all elements

$allTotal = 0;

for ($i = 0; $i < 3; $i++) {

    for ($j = 0; $j < 3; $j++) {

        $allTotal = $allTotal + $array[$i][$j];

    }

}

echo "<h3>7. Total of All Elements = $allTotal</h3>";


// 9. Minimum element and positions

$min = $array[0][0];

for ($i = 0; $i < 3; $i++) {

    for ($j = 0; $j < 3; $j++) {

        if ($array[$i][$j] < $min) {

            $min = $array[$i][$j];

        }

    }

}

echo "<h3>8. Minimum Element = $min</h3>";

echo "Positions of Minimum:<br>";

for ($i = 0; $i < 3; $i++) {

    for ($j = 0; $j < 3; $j++) {

        if ($array[$i][$j] == $min) {

            echo "Row " . ($i + 1) . ", Column " . ($j + 1) . "<br>";

        }

    }

}


// 10. Maximum element and positions

$max = $array[0][0];

for ($i = 0; $i < 3; $i++) {

    for ($j = 0; $j < 3; $j++) {

        if ($array[$i][$j] > $max) {

            $max = $array[$i][$j];

        }

    }

}

echo "<h3>9. Maximum Element = $max</h3>";

echo "Positions of Maximum:<br>";

for ($i = 0; $i < 3; $i++) {

    for ($j = 0; $j < 3; $j++) {

        if ($array[$i][$j] == $max) {

            echo "Row " . ($i + 1) . ", Column " . ($j + 1) . "<br>";

        }

    }

}

?>

<hr>


<!-- ================= QUESTION 4 ================= -->

<h2>Question 4</h2>

<?php

$students = [

    "CA221" => [

        "Name" => "Mohamed Ahmed Ali",

        "Phone" => "0648440403",

        "Address" => "Laba Dhagax, Wardhiigley"

    ],

    "CA223" => [

        "Name" => "Ahmed Abdi Jama",

        "Phone" => "0647223201",

        "Address" => "Taleex, Hodan"

    ],

    "CA221_2" => [

        "Name" => "Amina Nur Adan",

        "Phone" => "0646990276",

        "Address" => "Macmacaanka, Dharkeynley"

    ]

];

?>

<table border="1">

<tr>

    <th>ID</th>

    <th>Name</th>

    <th>Phone</th>

    <th>Address</th>

</tr>

<?php

foreach ($students as $id => $student) {

    echo "<tr>";

    echo "<td>" . $id . "</td>";

    echo "<td>" . $student["Name"] . "</td>";

    echo "<td>" . $student["Phone"] . "</td>";

    echo "<td>" . $student["Address"] . "</td>";

    echo "</tr>";

}

?>

</table>

<hr>


<!-- ================= QUESTION 5 ================= -->

<h2>Question 5</h2>

<?php

$transcript = [

    "Semester 1" => [

        "subject1" => [

            "CW1" => 9,

            "MidTerm" => 26,

            "CW2" => 10,

            "Final" => 40,

            "Total" => 85,

            "Status" => "Pass"

        ],

        "subject2" => [

            "CW1" => 9,

            "MidTerm" => 26,

            "CW2" => 10,

            "Final" => 40,

            "Total" => 85,

            "Status" => "Pass"

        ],

        "subject3" => [

            "CW1" => 9,

            "MidTerm" => 26,

            "CW2" => 10,

            "Final" => 40,

            "Total" => 85,

            "Status" => "Pass"

        ]

    ],

    "Semester 2" => [

        "subject1" => [

            "CW1" => 9,

            "MidTerm" => 26,

            "CW2" => 10,

            "Final" => 0,

            "Total" => 45,

            "Status" => "Fail"

        ],

        "subject2" => [

            "CW1" => 9,

            "MidTerm" => 26,

            "CW2" => 10,

            "Final" => 40,

            "Total" => 85,

            "Status" => "Pass"

        ],

        "subject3" => [

            "CW1" => 9,

            "MidTerm" => 26,

            "CW2" => 10,

            "Final" => 40,

            "Total" => 85,

            "Status" => "Pass"

        ]

    ]

];

?>

<table border="1">

<tr>

    <th>Semester</th>

    <th>Course</th>

    <th>CW1</th>

    <th>MidTerm</th>

    <th>CW2</th>

    <th>Final</th>

    <th>Total</th>

    <th>Status</th>

</tr>

<?php

foreach ($transcript as $semester => $subjects) {

    foreach ($subjects as $course => $data) {

        echo "<tr>";

        echo "<td>" . $semester . "</td>";

        echo "<td>" . $course . "</td>";

        echo "<td>" . $data["CW1"] . "</td>";

        echo "<td>" . $data["MidTerm"] . "</td>";

        echo "<td>" . $data["CW2"] . "</td>";

        echo "<td>" . $data["Final"] . "</td>";

        echo "<td>" . $data["Total"] . "</td>";

        echo "<td>" . $data["Status"] . "</td>";

        echo "</tr>";

    }

}

?>

</table>

</body>

</html>
```
