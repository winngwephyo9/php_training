<?php
require_once "config.php";

$name =  $email = $phone_no = $salary = "";
$name_error =  $email_error = $phone_no_error = $salary_error = "";

if (isset($_POST["id"]) && !empty($_POST["id"])) {

    $id = $_POST["id"];

    $staffName = trim($_POST["name"]);
    if (empty($staffName)) {
        $name_error = "First Name is required.";
    } elseif (!filter_var($staffName, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
        $name_error = "First Name is invalid.";
    } else {
        $staffName = $staffName;
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
        $phoneNumber = $phoneNumber;
    }

    $salary = trim($_POST["salary"]);
    if (empty($salary)) {
        $salary_error = "salary is required.";
    } else {
        $salary = $salary;
    }

    if (empty($name_error_err) && empty($email_error) && empty($phone_no_error) && empty($salary_error)) {

        $sql = "UPDATE `staff` SET `name`= '$staffName', `email`= '$email', `phone_no`= '$phoneNumber', `salary`= '$salary' WHERE id='$id'";

        if (mysqli_query($conn, $sql)) {
            header("location: index.php");
        } else {
            echo "Something went wrong. Please try again later.";
        }
    }

    mysqli_close($conn);
} else {
    if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
        $id = trim($_GET["id"]);
        $query = mysqli_query($conn, "SELECT * FROM staff WHERE ID = '$id'");

        if ($user = mysqli_fetch_assoc($query)) {
            $staffName   = $user["name"];
            $email       = $user["email"];
            $phoneNumber = $user["phone_no"];
            $salary     = $user["salary"];
        } else {
            echo "Something went wrong. Please try again later.";
            header("location: edit.php");
            exit();
        }
        mysqli_close($conn);
    } else {
        echo "Something went wrong. Please try again later.";
        header("location: edit.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Update User</h2>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <input type="hidden" name="id" value="<?php echo $id; ?>" />
                        <div class="form-group <?php echo (!empty($name_error)) ? 'has-error' : ''; ?>">
                            <label>Staff Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $staffName; ?>">
                            <span class="help-block"><?php echo $name_error; ?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($email_error)) ? 'has-error' : ''; ?>">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="<?php echo $email; ?>">
                            <span class="help-block"><?php echo $email_error; ?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($phone_no_error)) ? 'has-error' : ''; ?>">
                            <label>Phone Number</label>
                            <input type="number" name="phone_no" class="form-control" value="<?php echo $phoneNumber; ?>">
                            <span class="help-block"><?php echo $phone_no_error; ?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($salary_error)) ? 'has-error' : ''; ?>">
                            <label>salary</label>
                            <textarea name="salary" class="form-control"><?php echo $salary; ?></textarea>
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