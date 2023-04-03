<?php
@session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Espace admin - posts</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Admin pannel</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
         
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                          
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon "><i class="fas fa-tachometer-alt"></i></div>
                                Tableau de Bord
                            </a>
                            
                            <a class="nav-link collapsed" href="postad.php" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Créer Une Publication
                                
                            </a>
                            
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Rendez-vous
                               
                            </a>
                            
                                   
                            
                            <a class="nav-link" href="charts.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Modifier
                            </a>
                            <a class="nav-link" href="tables.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Supprimer
                            </a>
                            <a class="nav-link" href="tables.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Profil
                            </a>
                            <a class="nav-link" href="tables.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Deconnexion
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in <b><?php echo date("d-m-Y"); ?></b> at<b>
                      <?php echo $_SESSION["logtime"];  ?></b></div>
                        
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Créateur De Publication</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Publication</li>
                        </ol>
                        <ol class="breadcrumb mb-4">
                            <h2><?php
                            $bnj="";
                            if(date("H-i-s") >"16-00-00"){
                                $bnj="Bonsoir";
                            }else{
                                $bnj="Bonjour";
                            }
                            echo $bnj;
                        
                            ?> <b class="text-success"><?php echo $_SESSION["nomadmin"]; ?></b></h2>
                        </ol>
                        <?php echo @$_SESSION["post_success"];?>
                        <div class="container mt-4">
<form action="../../controller/postinsert.php" method="POST" enctype="multipart/form-data">
 <label for="" class="mt-2">
    <b>Titre de La publication</b>
 </label>  
 <div class="input-group mb-3 mt-3">
  <input type="text" class="form-control" placeholder="le titre de la publication" name="titlepost" required>
</div>
 <label for="" class="mt-2">
    <b>Description de La publication</b>
 </label>  
 <div class="input-group mb-3 mt-3">
 
  
  <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Description de la publication" rows="6" cols="50" name="descr" required></textarea>

</div>
<label for="" class="mt-2">
    <b>Date et Heure De Rendez Vous</b>
 </label>  
 <div class="input-group mb-3 mt-3">
 <div class="mb-3">
  <label for="formFileSm" class="form-label">image small size</label>
  <input class="form-control form-control-sm" id="formFileSm" type="file" name="img">
</div>
</div>
<div class=" d-flex justify-content-start mt-2">
   <input type="submit" value="Poster La Publication" class="btn btn-primary" name="postpub">
</div>

                        </div>
                    
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; The Doctor <?php echo Date("Y"); ?></div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <script>
                // chart1$
                let canvas = document.querySelector("#chart1");
    //  let ctx = canvas.getContext("2d");


     let linechart = new Chart(canvas,{
        type:'line',
        data:{
  labels: ["Janvier","Fevrier",'Mars'],
  datasets: [{
    label: 'Nombre des Rendez Vous par mois',
    data: [2, 3, 4],
    fill: false,
    borderColor: 'rgb(75, 192, 192)',
    tension: 0.1
  }]
}
     })

            </script>
            <script>
                // chart2
                let canvas2 = document.querySelector("#myBarChart");
    //  let ctx = canvas.getContext("2d");


     let linechart2 = new Chart(canvas2,{
        type:'doughnut',
        data:{
  labels: [
    'Eljadida',
    'Casablanca',
    'Rabat',
    'Marrakech'
  ],
  datasets: [{
    label: 'Les Villes Des Clients',
    data: [10, 20, 30,12],
    backgroundColor: [
      'rgb(255, 99, 132)',
      'rgb(54, 162, 235)',
      'rgb(255, 205, 86)',
      'green'
    ],
    hoverOffset: 4,
    cutout:5,
   
  }]
}
     })


            </script>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <!-- <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script> -->
        <!-- <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script> -->
        
    </body>
</html>
