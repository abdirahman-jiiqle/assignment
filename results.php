<?php
session_start();

if (!isset($_SESSION['student'])) {
    header("Location: index.php");
    exit();
}

$student = $_SESSION['student'];

function show($value)
{
    return htmlspecialchars($value);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    <title>Student Information</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
          rel="stylesheet">

</head>

<body class="bg-light">

<div class="container py-5">

    <div class="card shadow">

        <div class="card-header bg-success text-white text-center">

            <h2>Registration Successful</h2>

        </div>

        <div class="card-body">

            <div class="text-center mb-4">

                <img
                    src="uploads/<?= show($student['image']) ?>"
                    width="150"
                    height="150"
                    class="rounded-circle border"
                    style="object-fit: cover;"
                    alt="Student Image">

            </div>


            <table class="table table-bordered table-striped">

                <tr class="table-primary">
                    <th colspan="2">
                        Personal Information
                    </th>
                </tr>

                <tr>
                    <th>Name</th>
                    <td><?= show($student['name']) ?></td>
                </tr>

                <tr>
                    <th>Place of Birth</th>
                    <td><?= show($student['pob']) ?></td>
                </tr>

                <tr>
                    <th>Date of Birth</th>
                    <td><?= show($student['dob']) ?></td>
                </tr>

                <tr>
                    <th>Address</th>
                    <td><?= show($student['address']) ?></td>
                </tr>

                <tr>
                    <th>Gender</th>
                    <td><?= show($student['gender']) ?></td>
                </tr>

                <tr>
                    <th>Telephone</th>
                    <td><?= show($student['telephone']) ?></td>
                </tr>

                <tr>
                    <th>Email</th>
                    <td><?= show($student['email']) ?></td>
                </tr>


                <tr class="table-primary">
                    <th colspan="2">
                        Parent Information
                    </th>
                </tr>

                <tr>
                    <th>Parent Name</th>
                    <td><?= show($student['parent_name']) ?></td>
                </tr>

                <tr>
                    <th>Telephone</th>
                    <td><?= show($student['parent_phone']) ?></td>
                </tr>

                <tr>
                    <th>Relationship</th>
                    <td><?= show($student['relationship']) ?></td>
                </tr>


                <tr class="table-primary">
                    <th colspan="2">
                        Academic Information
                    </th>
                </tr>

                <tr>
                    <th>Student ID</th>
                    <td><?= show($student['student_id']) ?></td>
                </tr>

                <tr>
                    <th>Faculty</th>
                    <td><?= show($student['faculty']) ?></td>
                </tr>

                <tr>
                    <th>Department</th>
                    <td><?= show($student['department']) ?></td>
                </tr>

                <tr>
                    <th>Class</th>
                    <td><?= show($student['class']) ?></td>
                </tr>

                <tr>
                    <th>Registration Date</th>
                    <td><?= show($student['registration_date']) ?></td>
                </tr>

            </table>


            <div class="text-center">

                <a href="index.php"
                   class="btn btn-primary">

                    Back to Form

                </a>

            </div>

        </div>

    </div>

</div>

</body>
</html>