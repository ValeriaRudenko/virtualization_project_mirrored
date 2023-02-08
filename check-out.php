<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Patient dashboard</title>
    <meta name="keywords" content="Patient dashboard">
    <meta name="description" content="Developed By Petrov O. Rudenko V.">
    <style text="text/css">
        .aa {
            margin: 0;
            margin-top: 30px;
            height: 70%;
            background-color: rgba(0, 0, 0, 0.5);

        }

       
        .aa input[type=text],
        input[type=date] {
            width: 200px;
            height: 30px;
        }

        .aa select {
            width: 200px;
            height: 30px;
            border: 0;
            border-radius: 5px;
        }

        .container {
            margin-bottom: 30px;
        }
    </style>
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
    echo "<script>window.location='login/login/login as patient.html'</script>";
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

    <div class="container">
        <div class="row">
            <div class="aa">
                <h2>Check-out with a doctor</h2>
                <form action="appointment 3.php" method="post">

                    <h5>Enter Username : 
                        <input type="text" placeholder="Enter Username" 
                        value="<?php $username = $_SESSION["name"];echo $username;?>" 
                        name="username" required><br><br>
                    </h5>

                    <h5>Select Doctor : 
                        <select name="doctor_name" class="doctor_list" required>
                            <?php
                                $sql = "select * from doctors";
                                $result=pg_query($conn, $sql);
                                while ($row = pg_fetch_row($result)) {
                            ?>

                            <option
                                value="<?php echo $row[0]; ?>">
                                <?php echo $row[0]; ?>
                            </option><br><br>
                            <?php
                            }
                            ?>
                        </select>
                    </h5><br>

                    <p>
                        <input type="submit" value="submit" name="submit" style="background-color:skyblue;">
                    </p>
                </form>
            </div>
           
        </div>
    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>