<?php 
    if(!isset($_SESSION)){
        session_start();
    }
    if($_SESSION['id_client']==null){
        header('Location:'.'index.php');
        exit();
    }
?>
<?php 
    // include("../includes/layout/public_theme/header.php");
    // include_once("../includes/functions.php");
    include_once("../data/connectdb.php");    
    include_once("../includes/functions.php");
    include_once("../includes/session.php");    
?>
<?php
    $id_client = $_SESSION['id_client'];
?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->

        <title>Hello, world!</title>
        <style>
            .btn_outlin{
                outline:none;
            }
            #r1{
                /* background-color: red; */
                display:flex;
            }
            #r2{
                /* background-color: yellow; */
                display:none;
            }
            #r3{
                /* background-color: #CAD3C8; */
                display:none;
            }
            #divDropDown{
                float: right;
            }
        </style>
        <script>
            // $('#r1').hide();
            // function hideOrshowContent1(){
            //     document.getElementById("r1").style.display="flex";
            //     document.getElementById("r2").style.display="none";
            // }
            // function hideOrshowContent2(){
            //     document.getElementById("r1").style.display="none";
            //     document.getElementById("r2").style.display="flex";
            // }
            function hideOrshowContent($choix){
                propdown = document.getElementById("textDropdown");
                d1 = document.getElementById("r1");
                d2 = document.getElementById("r2");
                d3 = document.getElementById("r3");
                if($choix == 1){
                    propdown.innerText = "Tout Les Volle Active";
                    d1.style.display="flex";
                    d2.style.display="none";
                    d3.style.display="none";
                }else if($choix == 2){
                    propdown.innerText = "Tout Les Volle";
                    d1.style.display="none";
                    d2.style.display="flex";
                    d3.style.display="none";
                }else if($choix == 3){
                    propdown.innerText = "Tout Les pas Active";
                    d1.style.display="none";
                    d2.style.display="none";
                    d3.style.display="flex";
                }
            }
        </script>
    </head>
    <body>

        <!-- start navbar -->

        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="index.php">T-aér</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="admin.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="vos_vols.php">Vos vols</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Historique
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Historique De Voll</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Historique De Reservation</a>
                            <div class="dropdown-divider"></div>
                            <!-- <a class="dropdown-item" href="#">Something else here</a> -->
                        </div>
                    </li>
                    <!-- <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li> -->
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>


        <div class="container mt-4">
            <div class="row">
                <div class="col-sm-2">

                </div>
                <div class="col-sm-10">
                    <?php echo msg();?>
                    <!-- errer fichkeel -->
                    <?php 
                        $errors = err();
                    ?> 
                    <?php error_function($errors);?>
                </div>
            </div>
        </div>

        <!-- <div class="container">
            <div class='alert alert-success alert-dismissible'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong>Success!</strong>CC 
            </div>
        </div> -->

        <!-- end navbar -->
        <center>
            <h1>Admin / <span>Vos vols</span></h1>
        </center>
        <div>
            <?php
                // echo '<h3 class="ml-4"> welcome :' . $_SESSION['nom_client'] . ' - ' . $_SESSION['prenom_client'] . '</h3>';
            ?>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm">
                </div>
                <div class="col-sm">
                </div>
                <div class="col-sm">
                <center>
                    <?php
                        echo '<h3 class="ml-4"> welcome :' . $_SESSION['nom_client'] . ' - ' . $_SESSION['prenom_client'] . '</h3>';
                    ?>
                </center>
                </div>
            </div>
        </div>
        <!-- <center> -->
            <!-- <br> -->
            <!-- <h4>Resultat : <span> -->
                <?php 
            // echo $_SESSION['resultat_insert'] 
            ?>
            <!-- </span></h4> -->
            <!-- <h4>ID insert : <span><?php 
                // echo $id_client 
            ?></span> </h4> -->
        <!-- </center> -->
        <hr>

        <!-- <div class="container">
            <div class="row">
                <div class="col-2"> -->
                    <!-- <img src="../images/vol.jpg" width="auto" height="225" alt="Img De Voll"> -->
                    <!-- <h1>cc1</h1> -->
                    <!-- <div> -->
                        <!-- <h1>cc1</h1>
                        <i class="glyphicon glyphicon-user" ></i> -->
                        <!-- <span class='input-group-addon'><i class='glyphicon glyphicon-user'></i></span> -->
                        <!-- <i class="fas fa-user-tie"></i>
                    </div>
                </div>
                <div class="col-2"> -->
                    <!-- <img src="../images/vol.jpg" width="auto" height="225" alt="Img De Voll"> -->
                    <!-- <h1>cc2</h1>
                </div>
                <div class="col-4">
                2 of 3 (wider)
                </div>
                <div class="col-4">
                3 of 3
                </div>
            </div>
        </div>

        <hr> -->

            <div class="container">
                <div class="row">
                    <div class="col-3 col-md-2">
                        <i class="fas fa-user-tie" style="font-size: 100px;"></i>
                    </div>
                    <div class="col-5 col-md-4">
                        <?php
                            // $id_client = $_SESSION['id_client'];
                            $query1 = "SELECT * FROM `user` WHERE `id` = $id_client";
                            $result1 = mysqli_query($conn,$query1);
                            if(mysqli_num_rows($result1) >0){
                                while($row1 = mysqli_fetch_assoc($result1)){
                                    echo '<h5>Nome : '. mysqli_real_escape_string($conn,$row1["nom"]) .'</h5>';
                                    echo '<h5>Prenom : '. mysqli_real_escape_string($conn,$row1["prenom"]) .'</h5>';
                                    echo '<h5>Cin : '. mysqli_real_escape_string($conn,$row1["cin"]) .'</h5>';
                                    echo '<h5>Email : '. mysqli_real_escape_string($conn,$row1["email"]) .'</h5>';
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>

        <hr>


    
        <main role="main">

            <section class="jumbotron text-center">
                <div class="container">
                 
                <p>
                    <a href="add_vol.php" class="btn btn-primary my-2">ADD NEW VOL</a>
                    <a href="#" class="btn btn-secondary my-2">Secondary action</a>
                </p>
                </div>
            </section>

            <div class="container">
                <div class="row">
                    
                </div>
            </div>

            <div class="album py-5 bg-light">
                

                <div class="container mb-4">
                    <div class="row">
                        <div class="col-sm">
                            <!-- <button class="btn btn-primary my-2" id="nn" onclick="hideOrshowContent('1')">Volle Active</button> -->
        
                            <!-- <div class="nav-item dropdown"> -->
                                <!-- <a class="btn btn-primary my-2 dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span id="textDropdown">Tout Les Volle Active</span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <button class="dropdown-item" onclick="hideOrshowContent('1')">Tout Les Volle Active</button>
                                    <div class="dropdown-divider"></div>
                                    <button class="dropdown-item" onclick="hideOrshowContent('2')">Tout Les Voll</button>
                                    <div class="dropdown-divider"></div>
                                    <button class="dropdown-item" onclick="hideOrshowContent('3')">Tout Les pas Active</button>
                                </div> -->
                            <!-- </div> -->


                        </div>
                        <div class="col-sm">
                            <!-- <button class="btn btn-primary my-2" onclick="hideOrshowContent('2')">Tout Les Voll</button> -->
                        </div>
                        <div class="col-sm">
                            <!-- <button class="btn btn-primary my-2" onclick="hideOrshowContent('3')">Tout Les pas Active</button> -->
                            <div id="divDropDown">
                                <a class="btn btn-primary my-2 dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span id="textDropdown">Tout Les Volle Active</span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <button class="dropdown-item" onclick="hideOrshowContent('1')">Tout Les Volle Active</button>
                                    <div class="dropdown-divider"></div>
                                    <button class="dropdown-item" onclick="hideOrshowContent('2')">Tout Les Voll</button>
                                    <div class="dropdown-divider"></div>
                                    <button class="dropdown-item" onclick="hideOrshowContent('3')">Tout Les pas Active</button>
                                    <!-- <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Something else here</a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>








                <div class="container">

                    <div class="row" id="r1">
                        <!-- start script -->
                        <hr>
                        <?php
                            //select *

                            $dateMoins1 = new DateTime('-1 day');
                            $dateMoins1 = $dateMoins1->format('Y-m-d') ;
                            

                            // $query = "SELECT * FROM `vols` WHERE 1";
                            $query = "SELECT * FROM `vols` WHERE `id_admin_created` =$id_client  AND `date_vol` > '{$dateMoins1}' AND `statu_vol` = 'active'  ORDER BY `vols`.`id_vol` DESC";

                            $result = mysqli_query($conn,$query);
                            if(mysqli_num_rows($result) >0){
                                $colapsContur = 1;
                                while($row = mysqli_fetch_assoc($result)){
                                    
                                    echo '
                                    <div class="col-md-4">
                                        <div class="card mb-4 shadow-sm">
                                            <div  class="bd-placeholder-img card-img-top"  width="100%" height="225">
                                                <center>
                                                    <h3>' . mysqli_real_escape_string($conn,$row["nam"]) . '</h3>
                                                    <img src="../images/'.mysqli_real_escape_string($conn,$row["image"]).'" width="auto" height="225" alt="Img De Voll">
                                                </center>
                                            </div>
                                            <div class="card-body">
                                                <h6><strong>Ville De Départ : </strong>' . mysqli_real_escape_string($conn,$row["pays_depart"]) .'</h6>
                                                <h6><strong>Ville d arrive : </strong>' . mysqli_real_escape_string($conn,$row["pays_arrive"]) .'</h6>
                                                <h6><strong>Date De VOL : </strong>' . mysqli_real_escape_string($conn,$row["date_vol"]) .'</h6>
                                                

                                                
                                                <div class="accordion mb-3 mt-2" id="accordionExample">
                                                    <div class="card">
                                                        <div class="card-header" id="headingOne"  style="padding: 6px;">
                                                            <button type="button" class="btn btn-sm btn-outline-secondary btn-block" data-toggle="collapse" data-target="#collapse'.$colapsContur.'" aria-expanded="false" aria-controls="collapseOne">Mor Detaills</button>

                                                        </div>

                                                        <div id="collapse'.$colapsContur.'" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                            <div class="card-body">

                                                            <h6><strong>Hour : </strong>' . mysqli_real_escape_string($conn,$row["hour_vol"]) .'h,' . mysqli_real_escape_string($conn,$row["minute_vol"]) .'min</h6>
                                                            <h6><strong>Nombre De Plasse : </strong>' . mysqli_real_escape_string($conn,$row["nb_place_initial"]) .'</h6>
                                                            <h6><strong>Nombre De Reste : </strong>' . mysqli_real_escape_string($conn,$row["nb_place_rest"]) .'</h6>
                                                            <h6><strong>Price : </strong>' . mysqli_real_escape_string($conn,$row["price"]) .'</h6>
                                                            <h6><strong>ID Voll : </strong>' . mysqli_real_escape_string($conn,$row["id_vol"]) .'</h6>
            
                                                            <h6><strong>ID ADMIN CREER : </strong>' . mysqli_real_escape_string($conn,$row["id_admin_created"]) .'</h6>
                                                            
                                                            
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <div class="btn-group">
                                                                    <button type="button" class="btn btn-sm btn-outline-secondary">View Detelc Client</button>
                                                                    
                                                                </div>

                                                            </div>


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                

                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="btn-group">
                                                        
                                                    </div>
                                                    <a href="edit_vol.php?id_v='. mysqli_real_escape_string($conn,$row["id_vol"]) .'" type="button" class="btn btn-sm btn-outline-secondary mb-2">Edit</a>
                                                    
                                                </div>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="btn-group">
                                                        <h5>Etatt : </h5>
                                                    </div>
                                                    <h5 class="text-muted">Le vol est actuellement actif </h5>
                                                </div>

                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="btn-group">
                                                        
                                                    </div>
                                                    <small class="text-muted">Pubblier Le :'. mysqli_real_escape_string($conn,$row["date_created"]) .'</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>';
                                    $colapsContur ++;
                                }
                            }
                        ?>
                        <hr>
                        <!-- end script -->













                        <!-- <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">
                                <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail">
                                    <title>Placeholder</title>
                                    <rect width="100%" height="100%" fill="#55595c"/>
                                    <text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                                </svg>
                                <div class="card-body">
                                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                            <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                        </div>
                                        <small class="text-muted">9 mins</small>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                        <!-- <div class="col-md-4">
                            <div class="card mb-4 shadow-sm"> -->
                                <!-- <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail">
                                    <title>Placeholder</title>
                                    <rect width="100%" height="100%" fill="#55595c"/>
                                    <text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                                </svg> -->
                                <!-- <div  class="bd-placeholder-img card-img-top"  width="100%" height="225">
                                    <center><img src="../images/vol.jpg" width="auto" height="225" alt=""></center> -->
                                    
                                    <!-- <text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text> -->
                                <!-- </div>
                                
                                <div class="card-body">
                                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                            <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                        </div>
                                        <small class="text-muted">9 mins</small>
                                    </div>
                                </div>
                            </div>
                        </div> -->






                        

                        <!-- <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">
                                <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                                <div class="card-body">
                                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                            <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                        </div>
                                        <small class="text-muted">9 mins</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">
                                <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                                <div class="card-body">
                                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                        </div>
                                        <small class="text-muted">9 mins</small>
                                    </div>
                                </div>
                            </div>
                        </div> -->


                    </div>
                    <div class="row" id="r2">
                        <?php
                            //select *

                            $date1 = new DateTime;
                            $date1 = $date1->format('Y-m-d') ;

                            $dateMoins1 = new DateTime('-1 day');
                            $dateMoins1 = $dateMoins1->format('Y-m-d') ;
                            

                            $query = "SELECT * FROM `vols` WHERE `id_admin_created` =$id_client  ORDER BY `vols`.`id_vol` DESC";
                            // $query = "SELECT * FROM `vols` WHERE `date_vol` > '{$dateMoins1}'";

                            $result = mysqli_query($conn,$query);
                            if(mysqli_num_rows($result) >0){
                                $colapsContur = 1;
                                while($row = mysqli_fetch_assoc($result)){
                                    $statu_vol = mysqli_real_escape_string($conn,$row["statu_vol"]);
                                    $date_vol = mysqli_real_escape_string($conn,$row["date_vol"]);
                                    $statu = 'null';
                                    if ($statu_vol === 'annule'){
                                        $statu = 'Le voyage a été annulé';
                                    }else if ($statu_vol === 'active' && $date1 > $date_vol){
                                        $statu = 'Le voyage a expiré';
                                    }else if ($statu_vol === 'active' && $date_vol > $dateMoins1){
                                        $statu = 'Le vol est actuellement actif';
                                    }
                                    
                                    echo '
                                    <div class="col-md-4">
                                        <div class="card mb-4 shadow-sm">
                                            <div  class="bd-placeholder-img card-img-top"  width="100%" height="225">
                                                <center>
                                                    <h3>' . mysqli_real_escape_string($conn,$row["nam"]) . '</h3>
                                                    <img src="../images/'.mysqli_real_escape_string($conn,$row["image"]).'" width="auto" height="225" alt="Img De Voll">
                                                </center>
                                            </div>
                                            <div class="card-body">
                                                
                                                
                                                <h6><strong>Ville De Départ : </strong>' . mysqli_real_escape_string($conn,$row["pays_depart"]) .'</h6>
                                                <h6><strong>Ville d arrive : </strong>' . mysqli_real_escape_string($conn,$row["pays_arrive"]) .'</h6>
                                                <h6><strong>Date De VOL : </strong>' . mysqli_real_escape_string($conn,$row["date_vol"]) .'</h6>
                                                

                                                
                                                <div class="accordion mb-3 mt-2" id="accordionExample">
                                                    <div class="card">
                                                    <div class="card-header" id="headingOne"  style="padding: 6px;">
                                                        <button type="button" class="btn btn-sm btn-outline-secondary btn-block" data-toggle="collapse" data-target="#collapse'.$colapsContur.'" aria-expanded="false" aria-controls="collapseOne">Mor Detaills</button>

                                                    </div>

                                                        <div id="collapse'.$colapsContur.'" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                            <div class="card-body">

                                                            <h6><strong>Hour : </strong>' . mysqli_real_escape_string($conn,$row["hour_vol"]) .'h,' . mysqli_real_escape_string($conn,$row["minute_vol"]) .'min</h6>
                                                            <h6><strong>Nombre De Plasse : </strong>' . mysqli_real_escape_string($conn,$row["nb_place_initial"]) .'</h6>
                                                            <h6><strong>Nombre De Reste : </strong>' . mysqli_real_escape_string($conn,$row["nb_place_rest"]) .'</h6>
                                                            <h6><strong>Price : </strong>' . mysqli_real_escape_string($conn,$row["price"]) .'</h6>
                                                            <h6><strong>ID Voll : </strong>' . mysqli_real_escape_string($conn,$row["id_vol"]) .'</h6>
            
                                                            <h6><strong>ID ADMIN CREER : </strong>' . mysqli_real_escape_string($conn,$row["id_admin_created"]) .'</h6>
                                                            
                                                            
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <div class="btn-group">
                                                                    <button type="button" class="btn btn-sm btn-outline-secondary">View Detelc Client</button>
                                                                    
                                                                </div>

                                                            </div>


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                

                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="btn-group">
                                                    </div>
                                                    <a href="edit_vol.php?id_v='. mysqli_real_escape_string($conn,$row["id_vol"]) .'" type="button" class="btn btn-sm btn-outline-secondary mb-2">Edit</a>
                                                </div>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="btn-group">
                                                        <h5>Etatt : </h5>
                                                    </div>
                                                    <h5 class="text-muted">'. $statu .'</h5>
                                                </div>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="btn-group">
                                                        
                                                    </div>
                                                    <small class="text-muted">Pubblier Le :'. mysqli_real_escape_string($conn,$row["date_created"]) .'</small>
                                                </div>


                                                





                                                
                                                
                                            </div>
                                        </div>
                                    </div>';
                                    $colapsContur ++;
                                }
                            }
                        ?>
                    </div>
                    <div class="row" id="r3">
                        <?php
                            //select *

                            // $dateMoins1 = new DateTime;
                            // $dateMoins1 = $dateMoins1->format('Y-m-d') ;

                            $date1 = new DateTime;
                            $date1 = $date1->format('Y-m-d') ;

                            $dateMoins1 = new DateTime('-1 day');
                            $dateMoins1 = $dateMoins1->format('Y-m-d') ;
                            

                            // $query = "SELECT * FROM `vols` WHERE 1";
                            $query = "SELECT * FROM `vols` WHERE `id_admin_created` =$id_client AND `date_vol` < '{$date1}' OR `statu_vol` = 'annule'  ORDER BY `vols`.`id_vol` DESC";

                            $result = mysqli_query($conn,$query);
                            if(mysqli_num_rows($result) >0){
                                $colapsContur = 1;
                                while($row = mysqli_fetch_assoc($result)){
                                    $statu_vol = mysqli_real_escape_string($conn,$row["statu_vol"]);
                                    $date_vol = mysqli_real_escape_string($conn,$row["date_vol"]);
                                    $statu = 'null';
                                    if ($statu_vol === 'annule'){
                                        $statu = 'Le voyage a été annulé';
                                    }else if ($statu_vol === 'active' && $date1 > $date_vol){
                                        $statu = 'Le voyage a expiré';
                                    }else if ($statu_vol === 'active' && $date_vol > $dateMoins1){
                                        $statu = 'Le vol est actuellement actif';
                                    }
                                    
                                    echo '
                                    <div class="col-md-4">
                                        <div class="card mb-4 shadow-sm">
                                            <div  class="bd-placeholder-img card-img-top"  width="100%" height="225">
                                                <center>
                                                    <h3>' . mysqli_real_escape_string($conn,$row["nam"]) .'</h3>
                                                    <img src="../images/'.mysqli_real_escape_string($conn,$row["image"]).'" width="auto" height="225" alt="Img De Voll">
                                                </center>
                                            </div>
                                            <div class="card-body">

                                                
                                                <h6><strong>Ville De Départ : </strong>' . mysqli_real_escape_string($conn,$row["pays_depart"]) .'</h6>
                                                <h6><strong>Ville d arrive : </strong>' . mysqli_real_escape_string($conn,$row["pays_arrive"]) .'</h6>
                                                <h6><strong>Date De VOL : </strong>' . mysqli_real_escape_string($conn,$row["date_vol"]) .'</h6>
                                                

                                                
                                                <div class="accordion mb-3 mt-2" id="accordionExample">
                                                    <div class="card">
                                                    <div class="card-header" id="headingOne"  style="padding: 6px;">
                                                        <button type="button" class="btn btn-sm btn-outline-secondary btn-block" data-toggle="collapse" data-target="#collapse'.$colapsContur.'" aria-expanded="false" aria-controls="collapseOne">Mor Detaills</button>

                                                    </div>

                                                        <div id="collapse'.$colapsContur.'" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                            <div class="card-body">

                                                            <h6><strong>Hour : </strong>' . mysqli_real_escape_string($conn,$row["hour_vol"]) .'h,' . mysqli_real_escape_string($conn,$row["minute_vol"]) .'min</h6>
                                                            <h6><strong>Nombre De Plasse : </strong>' . mysqli_real_escape_string($conn,$row["nb_place_initial"]) .'</h6>
                                                            <h6><strong>Nombre De Reste : </strong>' . mysqli_real_escape_string($conn,$row["nb_place_rest"]) .'</h6>
                                                            <h6><strong>Price : </strong>' . mysqli_real_escape_string($conn,$row["price"]) .'</h6>
                                                            <h6><strong>ID Voll : </strong>' . mysqli_real_escape_string($conn,$row["id_vol"]) .'</h6>
            
                                                            <h6><strong>ID ADMIN CREER : </strong>' . mysqli_real_escape_string($conn,$row["id_admin_created"]) .'</h6>
                                                            
                                                            
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <div class="btn-group">
                                                                    <button type="button" class="btn btn-sm btn-outline-secondary">View Detelc Client</button>
                                                                    
                                                                </div>

                                                            </div>


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                

                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="btn-group">
                                                    </div>
                                                    <a href="edit_vol.php?id_v='. mysqli_real_escape_string($conn,$row["id_vol"]) .'" type="button" class="btn btn-sm btn-outline-secondary mb-2">Edit</a>
                                                </div>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="btn-group">
                                                        <h5>Etatt : </h5>
                                                    </div>
                                                    <h5 class="text-muted">'. $statu .'</h5>
                                                </div>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="btn-group">
                                                        
                                                    </div>
                                                    <small class="text-muted">Pubblier Le :'. mysqli_real_escape_string($conn,$row["date_created"]) .'</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>';
                                    $colapsContur ++;
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </main>











<!-- <div class="accordion" id="accordionExample">
    <div class="card">
        <div class="card-header" id="headingOne">
            <h2 class="mb-0">
            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Collapsible Group Item #1
            </button>
            </h2>
        </div>

        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
            </div>
        </div>
    </div>
</div> -->



































<!-- <div class="accordion" id="accordionExample">
    <div class="card">
        <div class="card-header" id="headingOne">
            <h2 class="mb-0">
                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Collapsible Group Item #1
                </button>
            </h2>
        </div>

        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
            </div>
        </div>
    </div>
</div> -->




<hr>

<?php
// $today = getdate();
// print_r($today);
?>
<hr>
<?php

    // echo '<br>';
    // $d = $todayh['mday'];
    // $m = $todayh['mon'];
    // $y = $todayh['year'];
    // echo $d;
    // echo '<br>';
    // echo $m;
    // echo '<br>';
    // echo $y;
    // echo date(format,timestamp);


?>
<?php
// echo "<br><hr>";
// $dateMoins1 = new DateTime('-1 day');
// $dateMoins1 = $dateMoins1->format('Y-m-d') ;
// echo $dateMoins1;
?>

        

        <?php
            // $_SESSION['id_client']=null;
        ?>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    </body>
</html>