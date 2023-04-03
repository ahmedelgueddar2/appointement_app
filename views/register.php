<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
        *{
            font-family:poppins;
        }
        .card-header{
            background-color:#80d0ff!important;
        }
        .card-header h2{
            text-align:center;

        }
    </style>
</head>
<body>
<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h2>Client Registration</h2>


        </div>
        <div class="card-body">
            <form action="../controller/insertion.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                <label for="log">Full-Name</label>
                <input type="text" name="full_name"  id="log" class="form-control" required>
                </div>
                <div class="form-group">
                <label for="nom">Email</label>
                <input type="email" name="emailreg"  class="form-control" required>
                </div>
                <div class="form-group">
                <label for="ville">Ville</label>
                <select  name="ville"   class="form-control" required>
                    <option value="">Selectionner La ville</option>
                    <option value="Eljadida">Eljadida</option>
                    <option value="Casablanca">Casablanca</option>
                    <option value="Rabat">Rabat</option>
                </select>
                </div>
                <div class="form-group">
                <label for="nom">Password</label>
                <input type="password" name="passreg"  class="form-control" required>
                </div>
                <div class="form-group">
                <label for="nom">Profil (Optionnel)</label>
                <input type="file" name="image"  class="form-control" >
                </div>
                <div class="g-recaptcha mt-3" data-sitekey="6Lf_aHcgAAAAAMPD7w66jqrDgkzMLHR_BOG4nWIq"></div>
               
                <br>
                
               
                <input type="submit" style="font-weight:bold;"  class="btn btn-primary" value="Register" name="reg"><br>
                <span>You have already an account ? </span> <span> <a href="loginclt.php" style="font-weight:bold;" class="link-primary">Log in</a></span>
                
               
                
                
            </form>
        </div>
    </div>
</div>
</body>
</html>