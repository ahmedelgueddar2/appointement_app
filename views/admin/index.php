<?php
@session_start();
// require "C:/xampp/htdocs/appointement_app/controller/statistics_data/data1.php";
if(!isset($_SESSION["auto"])){
    header("location:http://127.1.1.0/appointement_app/views/adminlogin.php");
    die();
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Admin Pannel - Tableau de Bord </title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    </head>
    
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">Admin pannel</a>
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
                            
                            <a class="nav-link" href="postad.php"  data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Créer Une Publication
                                
                            </a>
                            
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Rendez-vous
                               
                            </a>
                            
                                   
                            
                            <a class="nav-link" href="#">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Modifier
                            </a>
                            <a class="nav-link" href="#">
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
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
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
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Nombre de Client</div>
                                    <h3 class="api1" style="color:white;text-align:center;">
                                    
                                 ?
                                 
                                </h3>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                       
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-info text-white mb-4">
                                    <div class="card-body">Total Rendez-vous</div>
                                    <h3 class="api1" style="color:white;text-align:center;">
                                    
                                    ?
                                 
                                </h3>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                       
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Nombre Admins</div>
                                    <h3 class="api1" style="color:white;text-align:center;">
                                    
                                ?
                                 
                                </h3>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                       
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Nombre de Publications</div>
                                    <h3 class="api1" style="color:white;text-align:center;">
                                    
                                   ?
                                    
                                   </h3>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area me-1"></i>
                                        Area Chart Example
                                    </div>
                                    <div class="card-body">
                                        <canvas id="chart1" width="100%" heigh="60"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fa-solid fa-donut"></i>
                                        Bar Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40px"></canvas></div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable Example
                            </div>
                            <div class="card-body">
                               <div>
                                <?php
                                require "../../controller/statistics_data/table.php";
                                ?>
                               </div>

                            </div>
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
                <!-- Hidden input for stocking chart data -->
                <input type="hidden" class="ville1" value="<?php echo $villes[0]; ?>">
                <input type="hidden" class="ville2" value="<?php echo $villes[1]; ?>">
                <input type="hidden" class="ville3" value="<?php echo $villes[2]; ?>">
                <input type="hidden" class="datav1" value="<?php echo $dataville[0]; ?>">
                <input type="hidden" class="datav2" value="<?php echo $dataville[1]; ?>">
                <input type="hidden" class="datav3" value="<?php echo $dataville[2]; ?>">
            </div>
            <script>
                let ville1=document.querySelector(".ville1");
                let ville2=document.querySelector(".ville2");
                let ville3=document.querySelector(".ville3");
                let datav1=document.querySelector(".datav1");
                let datav2=document.querySelector(".datav2");
                let datav3=document.querySelector(".datav3");
                

            </script>
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
        
  labels:[
    ville1.value,
    ville2.value,
    ville3.value]

 ,
  datasets: [{
    label: 'Les Villes Des Clients',
    data: [
        datav1.value,
        datav2.value,
        datav3.value
    ],
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
            <script>
                  var statistics = document.querySelectorAll(".api1");
                   
                  
                    
                    function fetchapi(passapi,name_elm){
                        fetch(`http://127.1.1.0/appointement_app/controller/statistics_data/api1.php?key=${passapi}`)
                    .then(
                        function(response){
                            
                            return response.json();
                            
                        }
                    ).then(
                        function(data){
                            // console.log(data);
                            name_elm.innerText=`${data["0"]}`;
                        }
                    )
                    }
                   fetchapi("client",statistics[0]);
                   fetchapi("rv",statistics[1]);
                   fetchapi("admin",statistics[2]);
                   fetchapi("post",statistics[3]);
                   
                
                
                
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
