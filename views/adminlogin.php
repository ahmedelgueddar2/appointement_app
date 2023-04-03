<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <style>
        .card-header{
            background-color:#1c1818!important;
        }
        .card-header h2{
            text-align:center;

        }
    </style>
</head>
<body>
<div class="container">
    <div class="card mt-5">
        <div class="card-header text-danger">
            <h2>Admin Login Page</h2>


        </div>
        <div class="card-body">
                
            <form action="../controller/checkadminlog.php" method="POST">
                <div class="form-group">
                <label for="log">admin</label>
                <input type="text" name="logadmin"  id="log" class="form-control" required>
                </div>
                <div class="form-group">
                <label for="nom">Password</label>
                <input type="password" name="passadmin"  id="nom" class="form-control" required>
                </div><br/>
                <input type="submit" style="font-weight:bold;"  class="btn btn-dark" Value="Connexion">
                
                
               
                
                
            </form>
        </div>
    </div>
</div>
</body>
</html>