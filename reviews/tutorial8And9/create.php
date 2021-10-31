<?php
require_once "config.php";

$name = $email = $phone_no = $salary = "";
$name_error = $email_error = $phone_no_error = $salary_error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $staffName = trim($_POST["name"]);
    if (empty($staffName)) {
        $name_error = " Name is required.";
    } elseif (!filter_var($staffName, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
        $name_error = " Name is invalid.";
    } else {
        $name = $staffName;
    }
    $email = trim($_POST["email"]);
    if (empty($email)) {
        $email_error = "Email is required.";
    } elseif (!filter_var($staffName, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
        $email_error = "Please enter a valid email.";
    } else {
        $email = $email;
    }

    $phoneNumber = trim($_POST["phone_no"]);
    if (empty($phoneNumber)) {
        $phone_no_error = "Phone Number is required.";
    } else {
        $phone_no = $phoneNumber;
    }

    $salary = trim($_POST["salary"]);
    if (empty($salary)) {
        $salary_error = "salary is required.";
    } else {
        $salary = $salary;
    }

    if (empty($name_error) && empty($email_error) && empty($phone_no_error) && empty($salary_error)) {
        $sql = "INSERT INTO `staff` (`name`,  `email`, `phone_no`, `salary`) VALUES ('$staffName', '$email', '$phoneNumber', '$salary')";

        if (mysqli_query($conn, $sql)) {
            header("location: index.php");
        } else {
            echo "Something went wrong. Please try again later.";
        }
    }
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Create User</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Create User</h2>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($name_error)) ? 'has-error' : ''; ?>">
                            <label>First Name</label>
                            <input type="text" name="name" class="form-control" value="">
                            <span class="help-block"><?php echo $name_error; ?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($email_error)) ? 'has-error' : ''; ?>">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="">
                            <span class="help-block"><?php echo $email_error; ?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($phone_no_error)) ? 'has-error' : ''; ?>">
                            <label>Phone Number</label>
                            <input type="number" name="phone_no" class="form-control" value="">
                            <span class="help-block"><?php echo $phone_no_error; ?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($salary_error)) ? 'has-error' : ''; ?>">
                            <label>salary</label>
                            <textarea name="salary" class="form-control"></textarea>
                            <span class="help-block"><?php echo $salary_error; ?></span>
                        </div>

                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>