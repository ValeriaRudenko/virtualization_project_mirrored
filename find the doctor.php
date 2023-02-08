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


    <div id="nav-placeholder"></div>

    <div class="container"style="padding: 30px 20px 0px 20px;">
        <div class="row">
            <div class="aa">
                <h2>Search for a doctor</h2>
                <h5>
                    <form action='/doctor found.php'> 
                    Enter the name you are looking for:  ㅤ ㅤ
                            <input type="text" placeholder="name" 
                            value=""name="name" required>
                        
                        <input type="submit" value="search by name" 
                        name="search by name" style="background-color:skyblue;">
                    </form>
                </h5>
                <h5>
                    <form action='/doctor found.php'> 
                    Enter the surname you are looking for:ㅤ
                            <input type="text" placeholder="surname" 
                            value=""name="surname" required>
                        
                        <input type="submit" value="search by surname" 
                        name="search by surname" style="background-color:skyblue;">
                    </form>
                </h5>
                <h5>
                    <form action='/doctor found.php'> 
                    Enter the level you are looking for:ㅤㅤㅤ
                            <input type="text" placeholder="level" 
                            value=""name="level" required>
                        
                        <input type="submit" value="search by level" 
                        name="search by level" style="background-color:skyblue;">
                    </form>
                </h5>

            </div>
      
        </div>
        
    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>