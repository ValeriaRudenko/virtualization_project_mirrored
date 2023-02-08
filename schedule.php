<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Patient dashboard</title>
    <meta name="keywords" content="Patient card">
    <meta name="description" content="Developed By Petrov O. Rudenko V.">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script>
      $(document).ready(function () {
        $("#nav-placeholder").load("nav.php");
      });
    </script>
</head>

<body>
    <?php
session_start();
require "conn.php";
?>

    <div id="nav-placeholder"></div>

    <?php
if (!isset($_SESSION["name"])) {
    echo "<script>window.location='login/login as doctor.html'</script>";
}?>
    <div class="container-fluid" style="padding: 30px 20px 0px 40px;">
        <div class="row">
            <div class="col-md-10">
                <?php
                    echo "<h3>Welcome  ";
                    echo $_SESSION["name"];
                    
                ?>
            </div>
            <div class="col-md-2">

                <form method="POST"><button value="Log Out" name="logout" class="btn btn-danger">Log Out</button></form>
                <?php
                    if (isset($_POST['logout'])) {
                        session_destroy();
                        echo "<script>window.location='index.html'</script>";
                    }
                    ?>
            </div>
        </div>
    </div>

    <div class="container"style="padding: 30px 100px 0px 100px;">
        <div class="row">
                <h2>Working scedule</h2>
                <div class="table-responsive">
                    <table class="table table-hover striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Date</th>
                            <th>Time</th>
                        </tr>
                    </thead>
                        <tbody style="color:white">
                            <?php
                                    require "conn.php";
                                    $nn=$_SESSION['name'];
                                    $sql="select * from working_calendar where dname ='$nn'";
                                    $result=pg_query($conn, $sql);
                                    while ($row = pg_fetch_row($result)) {
                                            echo"
                                            <tr>
                                                    <p><td>
                                                    ".$row[0]."
                                                    </td>
                                                    <td>
                                                    ".$row[2]."
                                                    </td></p>
                                            </tr>";
                                            }
                                        echo"</table>";
                                ?>
                                </tbody>
                    
                    </table>
                </div>
            </div>

    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>