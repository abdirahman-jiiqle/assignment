<?php
session_start();

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get data
    $name       = trim($_POST['name'] ?? '');
    $pob        = trim($_POST['pob'] ?? '');
    $dob        = $_POST['dob'] ?? '';
    $address    = trim($_POST['address'] ?? '');
    $gender     = $_POST['gender'] ?? '';
    $telephone  = trim($_POST['telephone'] ?? '');
    $email      = trim($_POST['email'] ?? '');

    $parent_name  = trim($_POST['parent_name'] ?? '');
    $parent_phone = trim($_POST['parent_phone'] ?? '');
    $relationship = trim($_POST['relationship'] ?? '');

    $student_id        = trim($_POST['student_id'] ?? '');
    $faculty           = trim($_POST['faculty'] ?? '');
    $department        = trim($_POST['department'] ?? '');
    $class             = trim($_POST['class'] ?? '');
    $registration_date = $_POST['registration_date'] ?? '';

    // Personal Information Validation
    if ($name == '') {
        $errors['name'] = "Please enter student name.";
    } elseif (!preg_match("/^[a-zA-Z ]+$/", $name)) {
        $errors['name'] = "Name must contain only letters and spaces.";
    }

    if ($pob == '') {
        $errors['pob'] = "Please enter place of birth.";
    }

    if ($dob == '') {
        $errors['dob'] = "Please enter date of birth.";
    }

    if ($address == '') {
        $errors['address'] = "Please enter address.";
    }

    if ($gender == '') {
        $errors['gender'] = "Please select gender.";
    }

    if ($telephone == '') {
        $errors['telephone'] = "Please enter telephone.";
    }

    if ($email == '') {
        $errors['email'] = "Please enter email.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Please enter a valid email address.";
    }

    // Parent Information Validation
    if ($parent_name == '') {
        $errors['parent_name'] = "Please enter parent name.";
    } elseif (!preg_match("/^[a-zA-Z ]+$/", $parent_name)) {
        $errors['parent_name'] = "Parent name must contain only letters and spaces.";
    }

    if ($parent_phone == '') {
        $errors['parent_phone'] = "Please enter parent telephone.";
    }

    if ($relationship == '') {
        $errors['relationship'] = "Please enter relationship.";
    }

    // Academic Information Validation
    if ($student_id == '') {
        $errors['student_id'] = "Please enter student ID.";
    }

    if ($faculty == '') {
        $errors['faculty'] = "Please enter faculty.";
    }

    if ($department == '') {
        $errors['department'] = "Please enter department.";
    }

    if ($class == '') {
        $errors['class'] = "Please enter class.";
    }

    if ($registration_date == '') {
        $errors['registration_date'] = "Please enter registration date.";
    }

    // Image validation
    $imageName = '';

    if (!isset($_FILES['image']) || $_FILES['image']['error'] == UPLOAD_ERR_NO_FILE) {

        $errors['image'] = "Please upload an image.";

    } elseif ($_FILES['image']['error'] != UPLOAD_ERR_OK) {

        $errors['image'] = "Image upload failed.";

    } else {

        $allowed = ['jpg', 'jpeg', 'png', 'gif'];

        $extension = strtolower(
            pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION)
        );

        if (!in_array($extension, $allowed)) {

            $errors['image'] = "Only JPG, JPEG, PNG and GIF files are allowed.";

        } else {

            // Create uploads folder
            if (!is_dir("uploads")) {
                mkdir("uploads", 0777, true);
            }

            // Generate unique filename
            $imageName = uniqid("student_") . "." . $extension;

            $destination = "uploads/" . $imageName;

            if (!move_uploaded_file(
                $_FILES['image']['tmp_name'],
                $destination
            )) {
                $errors['image'] = "Unable to save image.";
            }
        }
    }

    // If no errors
    if (empty($errors)) {

        $_SESSION['student'] = [
            'name' => $name,
            'pob' => $pob,
            'dob' => $dob,
            'address' => $address,
            'gender' => $gender,
            'telephone' => $telephone,
            'email' => $email,
            'parent_name' => $parent_name,
            'parent_phone' => $parent_phone,
            'relationship' => $relationship,
            'student_id' => $student_id,
            'faculty' => $faculty,
            'department' => $department,
            'class' => $class,
            'registration_date' => $registration_date,
            'image' => $imageName
        ];

        header("Location: results.php");
        exit();
    }
}

function errorMessage($field)
{
    global $errors;

    if (isset($errors[$field])) {
        return '<div class="text-danger small">'
            . htmlspecialchars($errors[$field])
            . '</div>';
    }

    return '';
}

function old($field)
{
    return htmlspecialchars($_POST[$field] ?? '');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    <title>Student Registration</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
          rel="stylesheet">

</head>

<body class="bg-light">

<div class="container py-5">

    <div class="card shadow">

        <div class="card-header bg-primary text-white text-center">

            <h2>Student Registration Form</h2>

        </div>

        <div class="card-body">

            <form method="POST"
                  enctype="multipart/form-data"
                  novalidate>

                <!-- PERSONAL INFORMATION -->

                <h4 class="text-primary">
                    Personal Information
                </h4>

                <hr>

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Full Name
                        </label>

                        <input
                            type="text"
                            name="name"
                            class="form-control"
                            value="<?= old('name') ?>"
                            autofocus>

                        <?= errorMessage('name') ?>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Place of Birth
                        </label>

                        <input
                            type="text"
                            name="pob"
                            class="form-control"
                            value="<?= old('pob') ?>">

                        <?= errorMessage('pob') ?>

                    </div>


                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Date of Birth
                        </label>

                        <input
                            type="date"
                            name="dob"
                            class="form-control"
                            value="<?= old('dob') ?>">

                        <?= errorMessage('dob') ?>

                    </div>


                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Address
                        </label>

                        <input
                            type="text"
                            name="address"
                            class="form-control"
                            value="<?= old('address') ?>">

                        <?= errorMessage('address') ?>

                    </div>


                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Gender
                        </label>

                        <select
                            name="gender"
                            class="form-select">

                            <option value="">
                                Select Gender
                            </option>

                            <option value="Male"
                                <?= old('gender') == 'Male' ? 'selected' : '' ?>>
                                Male
                            </option>

                            <option value="Female"
                                <?= old('gender') == 'Female' ? 'selected' : '' ?>>
                                Female
                            </option>

                        </select>

                        <?= errorMessage('gender') ?>

                    </div>


                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Telephone
                        </label>

                        <input
                            type="text"
                            name="telephone"
                            class="form-control"
                            value="<?= old('telephone') ?>">

                        <?= errorMessage('telephone') ?>

                    </div>


                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Email
                        </label>

                        <input
                            type="email"
                            name="email"
                            class="form-control"
                            value="<?= old('email') ?>">

                        <?= errorMessage('email') ?>

                    </div>


                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Student Image
                        </label>

                        <input
                            type="file"
                            name="image"
                            class="form-control"
                            accept=".jpg,.jpeg,.png,.gif">

                        <?= errorMessage('image') ?>

                    </div>

                </div>


                <!-- PARENT INFORMATION -->

                <h4 class="text-primary mt-4">
                    Parent Information
                </h4>

                <hr>

                <div class="row">

                    <div class="col-md-4 mb-3">

                        <label class="form-label">
                            Parent Name
                        </label>

                        <input
                            type="text"
                            name="parent_name"
                            class="form-control"
                            value="<?= old('parent_name') ?>">

                        <?= errorMessage('parent_name') ?>

                    </div>


                    <div class="col-md-4 mb-3">

                        <label class="form-label">
                            Telephone
                        </label>

                        <input
                            type="text"
                            name="parent_phone"
                            class="form-control"
                            value="<?= old('parent_phone') ?>">

                        <?= errorMessage('parent_phone') ?>

                    </div>


                    <div class="col-md-4 mb-3">

                        <label class="form-label">
                            Relationship
                        </label>

                        <input
                            type="text"
                            name="relationship"
                            class="form-control"
                            placeholder="Father, Mother, Guardian..."
                            value="<?= old('relationship') ?>">

                        <?= errorMessage('relationship') ?>

                    </div>

                </div>


                <!-- ACADEMIC INFORMATION -->

                <h4 class="text-primary mt-4">
                    Academic Information
                </h4>

                <hr>

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Student ID
                        </label>

                        <input
                            type="text"
                            name="student_id"
                            class="form-control"
                            value="<?= old('student_id') ?>">

                        <?= errorMessage('student_id') ?>

                    </div>


                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Faculty
                        </label>

                        <input
                            type="text"
                            name="faculty"
                            class="form-control"
                            value="<?= old('faculty') ?>">

                        <?= errorMessage('faculty') ?>

                    </div>


                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Department
                        </label>

                        <input
                            type="text"
                            name="department"
                            class="form-control"
                            value="<?= old('department') ?>">

                        <?= errorMessage('department') ?>

                    </div>


                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Class
                        </label>

                        <input
                            type="text"
                            name="class"
                            class="form-control"
                            value="<?= old('class') ?>">

                        <?= errorMessage('class') ?>

                    </div>


                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Registration Date
                        </label>

                        <input
                            type="date"
                            name="registration_date"
                            class="form-control"
                            value="<?= old('registration_date') ?>">

                        <?= errorMessage('registration_date') ?>

                    </div>

                </div>


                <div class="text-center mt-4">

                    <button
                        type="submit"
                        class="btn btn-primary px-5">

                        Register

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

</body>
</html>