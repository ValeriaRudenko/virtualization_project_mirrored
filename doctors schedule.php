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
        $dname=$_GET['doc'];
    ?>

    <div id="nav-placeholder"></div>
    


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
                                    $sql="select * from working_calendar where dname ='$dname'";
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