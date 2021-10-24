<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Tutorial8</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <style type="text/css">
        .wrapper {
            width: 1200px;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <h2 class="text-center">PHP CRUD Tutorial Example with <a href="https://codingdriver.com/">Coding Driver</a></h2>
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">staff</h2>
                        <a href="create.php" class="btn btn-success pull-right">Add New User</a>
                    </div>
                    <?php
                    // Include config file
                    require_once "config.php";

                    // select all staff
                    $data = "SELECT * FROM staff";
                    if ($staff = mysqli_query($conn, $data)) {
                        if (mysqli_num_rows($staff) > 0) {
                            echo "<table class='table table-bordered table-striped'>
                                    <thead>
                                      <tr>
                                        <th>#</th>
                                        <th>Staff Name</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Salary</th>
                                        <th>Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>";
                            $chart_data = "";
                            while ($user = mysqli_fetch_array($staff)) {
                                $name_chat[] = $user['name'];
                                $salary_chart[] = $user['salary'];
                                echo "<tr>
                                            <td>" . $user['id'] . "</td>
                                            <td>" . $user['name'] . "</td>
                                            <td>" . $user['email'] . "</td>
                                            <td>" . $user['phone_no'] . "</td>
                                            <td>" . $user['salary'] . "</td>
                                            <td>
                                              <a href='read.php?id=" . $user['id'] . "' title='View User' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>
                                              <a href='edit.php?id=" . $user['id'] . "' title='Edit User' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>
                                              <a href='delete.php?id=" . $user['id'] . "' title='Delete User' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>
                                            </td>
                                          </tr>";
                            }
                            echo "</tbody>
                                </table>";

                            mysqli_free_result($staff);
                        } else {
                            echo "<p class='lead'><em>No records found.</em></p>";
                        }
                    } else {
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                    }



                    // Close connection
                    mysqli_close($conn);
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div style="width:30%;height:20%;text-align:center">
        <h2 class="page-header">Analytics Reports For Salary </h2>
        <div>Salary Status </div>
        <canvas id="chartjs_bar"></canvas>
    </div>

</body>
<script src="//code.jquery.com/jquery-1.9.1.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script type="text/javascript">
    var ctx = document.getElementById("chartjs_bar").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($name_chat); ?>,
            datasets: [{
                backgroundColor: [
                    "#5969ff",
                    "#ff407b",
                    "#25d5f2",
                    "#ffc750",
                    "#2ec551",
                    "#7040fa",
                    "#ff004e"
                ],
                data: <?php echo json_encode($salary_chart); ?>,
            }]
        },
        options: {
            legend: {
                display: true,
                position: 'bottom',

                labels: {
                    fontColor: '#71748d',
                    fontFamily: 'Circular Std Book',
                    fontSize: 14,
                }
            },


        }
    });
</script>

</html>