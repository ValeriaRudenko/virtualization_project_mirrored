<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Patient dashboard</title>
    <meta name="keywords" content="Patient card">
    <meta name="description" content="Developed By Petrov O. Rudenko V.">
    <style text="text/css">
        .aa {
            margin: 0;
            margin-top: 30px;
            height: 100%;
            width: 100%;
            background-color: rgba(0, 0, 0, 0.5);

        }

        .aa h1 {
            color: orange;
            font-size: 50px;
        }

        .aa p {
            text-decoration: none;
            display: block;
            color: #f2f2f2;
            font-size: 15px;
            font-family: sans-serif;
            border-radius=10px;
        }

        .div2 {
            margin-top: 30px;
            padding-left: 30px;
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
    echo "<script>window.location='login/login as patient.html'</script>";
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

    <div class="container"style="padding: 30px 20px 0px 20px;">
        <div class="row">
            <div class="aa">
                <h2><?php
                    echo "Patient  ";
                    echo $_SESSION["name"];
                    echo " card";
                ?></h2>
              
            </div>

        </div>
    </div>

    <div class="container">
        <div class="table-responsive">
            <table class="table table-hover striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Name</th>
                        <th>Date of birth</th>
                        <th>Mail</th>
                        <th>Registered with Dr.</th>
                    </tr>
                </thead>
                <tbody style="color:white">
                    <?php
                        require "conn.php";
                        $sql="select * from patient where uname ='".$_SESSION["name"]."'";
                        $result=pg_query($conn, $sql);
                        $sql2="select * from registration where p_uname ='".$_SESSION["name"]."'";
                        $result2=pg_query($conn, $sql2);
                        if (pg_num_rows($result2)<1) {
                            $row2["d_uname"] = '';
                        }
                        
                        while ($row = pg_fetch_row($result)) {
                            $row2 = pg_fetch_row($result2);
                                echo"
                                <tr>
                                        <td>
                                        ".$row[0]."
                                        </td>
                                        <td>
                                        ".$row[1]."
                                        </td>
                                        <td>
                                        ".$row[2]."
                                        </td>
                                        <td>
                                        ".$row2[1]."
                                        </td>
                                </tr>";
                                
                            }
                            echo"</table>";
                    ?>
                   
                </tbody>
            </table>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>