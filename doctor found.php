<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>List of doctors</title>
    <meta name="keywords" content="List of doctors">
    <meta name="description" content="Developed By Petrov O. Rudenko V.">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script>
      $(document).ready(function () {
        $("#nav-placeholder").load("nav.php");
      });
    </script>
</head>

<body>
    
    <div id="nav-placeholder"></div>
    <h1 style="color:black;font-size: 45px;text-align:center;margin:30px;">List of our doctors:</h1>
    <div class="container">
        <div class="table-responsive">
            <table class="table table-hover striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Name</th>
                        <th>Surname</th>
                        <th>Phone Number</th>
                        <th>Qualification</th>
                        <th>Department</th>
                        <th>Schedule</th>
                    </tr>
                </thead>
                <tbody style="color:white">
                    <?php
                        session_start();
                        require "conn.php";
                        if (isset($_GET['name'])) {
                            $name = $_GET['name'];
                        }
                        if (isset($_GET['surname'])) {
                            $surname = $_GET['surname'];
                        }
                        if (isset($_GET['level'])) {
                            $level = $_GET['level'];
                        }
                    ?>

                    <?php
                        require "conn.php";
                    if (isset($_GET['name'])) {
                        $sql = "select * from doctors where name = '$name'";
                    }
                    if (isset($_GET['surname'])) {
                        $sql = "select * from doctors where surname = '$surname'";
                    }
                    if (isset($_GET['level'])) {
                        $sql = "select * from doctors where department = '$level'";
                    }
                    $result=pg_query($conn, $sql);
                        while ($row = pg_fetch_row($result)) {
                                $doc=$row["uname"];
                                echo"
                                <tr>
                                    <td>
                                    ".$row[0]."
                                    </td>
                                    <td>
                                    ".$row[3]."
                                    </td>
                                    <td>
                                    ".$row[4]."
                                    </td>
                                    <td>
                                    ".$row[5]."
                                    </td>
                                    <td>
                                    ".$row[6]."
                                    </td>
                                    <th>
                                        <a class='nav-link'
                                        href='doctors schedule.php?doc=$doc'>schedule</a>
                                    </th>
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