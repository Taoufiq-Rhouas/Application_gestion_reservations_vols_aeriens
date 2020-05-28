<?php 
    // include("../includes/layout/public_theme/header.php");
    // include_once("../includes/functions.php");
    include_once("../data/connectdb.php");        
?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

        <title>Hello, world!</title>
        <style>
            /* #form1{

            } */
        </style>
        <script>
            function testPassword1(){
                var p1 = document.getElementById("Motpass1").value;
                var p2 = document.getElementById("ConfirmMotpass1").value;
                if( p1 != p2){
                    document.getElementById("btnsubmit1").style.backgroundColor = "red";
                    document.getElementById("btnsubmit1").disabled = true;
                    document.getElementById("btnsubmit1").style.cursor = "not-allowed";
                    document.getElementById("error_pasword1").innerText = "Error Mot De Pass";
                }else{
                    document.getElementById("btnsubmit1").style.backgroundColor = "#f9ca24";
                    document.getElementById("btnsubmit1").disabled = false;
                    document.getElementById("btnsubmit1").style.cursor = "pointer";
                    document.getElementById("error_pasword1").innerText = "";
                }
            }
            function testPassword2(){
                var p1 = document.getElementById("Motpass2").value;
                var p2 = document.getElementById("ConfirmMotpass2").value;
                if( p1 != p2){
                    document.getElementById("btnsubmit2").style.backgroundColor = "red";
                    document.getElementById("btnsubmit2").disabled = true;
                    document.getElementById("btnsubmit2").style.cursor = "not-allowed";
                    document.getElementById("error_pasword2").innerText = "Error Mot De Pass";
                }else{
                    document.getElementById("btnsubmit2").style.backgroundColor = "yellow";
                    document.getElementById("btnsubmit2").disabled = false;
                    document.getElementById("btnsubmit2").style.cursor = "pointer";
                    document.getElementById("error_pasword2").innerText = "";
                }
            }
        </script>
    </head>
    <body>
        <br>
        <center>
            <h1>PAGE INSCRIPTION</h1><br>
            <div class="container" >
                <button type="button" class="btn btn-warning" id="btn_admin">Admin</button>
                <button type="button" class="btn btn-warning" id="btn_user">User</button>
            </div>
        </center>
        <br>
        <br>
        
        <div class="container">
            <div class="row mx-md-n5">
                <div class="col px-md-5" id="form1">
                    <div class="p-3 border bg-light">
                        <h1>1</h1>
                        <form class="needs-validation" method='POST' action='inscription_submit.php?statut=User'>
                            <h2>Information de : <span name="statut" value="User">User</span></h2><br> 
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="text">Nom :</label>
                                    <input type="text" name="nom_client" class="form-control" id="firstName" placeholder="First name" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="text">Prenom :</label>
                                    <input type="text" name="prenom_client" class="form-control" id="lastName" placeholder="Last name" required>
                                </div>
                            </div><br>
                            <!-- <div class="mb-3">
                                <label for="text">Cin :</label>
                                <input type="text" name="cin_client" class="form-control text-uppercase" id="cin" placeholder="CIN" required>
                            </div><br> 
                            <div class="mb-3">
                                <label for="text">Numéro De Passeport :</label>
                                <input type="text" name="num_pasport" class="form-control" id="num_pasport" placeholder="Numéro De Passeport" required>
                            </div><br>
                            <div class="mb-3">
                                <label for="example-tel-input">Telephone :</label>
                                <input type="number" name="phon" class="form-control" id="example-tel-input" placeholder="Telephone" required>
                            </div><br>-->
                            <div class="mb-3">
                                <label for="text">Email :</label>
                                <input type="text" name="email" class="form-control" id="email" placeholder="you@example.com" required>
                            </div><br>

                            <!-- password -->
                            <div class="mb-3">
                                <label for="text">Mot De Pass :</label>
                                <input type="text" name="Motpass" class="form-control" id="Motpass1" placeholder="you@example.com" onkeyup="testPassword1()" required>
                            </div><br>
                            <div class="mb-3">
                                <label for="text">Confermer Le Mot De Pass :</label>
                                <input type="text" name="ConfirmMotpass" class="form-control" id="ConfirmMotpass1" placeholder="you@example.com" onkeyup="testPassword1()" required>
                            </div>
                            <h2 id="error_pasword1"></h2><br>

                            <hr class="mb-4">
                            <button class="btn btn-outline-success btn-lg btn-block" type="submit"  name="submit" id="btnsubmit1">Reserve</button>
                        </form>
                    </div>
                </div>

                <div class="col px-md-5" id="form2">
                    <div class="p-3 border bg-light">
                        <H1>2</H1>
                        <form class="needs-validation" method='POST' action='inscription_submit.php?statut=Admin'>
                            <h2>Information de : <span name="statut" value="Admin">Admin</span></h2><br> 
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="text">Nom :</label>
                                    <input type="text" name="nom_client" class="form-control" id="firstName" placeholder="First name" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="text">Prenom :</label>
                                    <input type="text" name="prenom_client" class="form-control" id="lastName" placeholder="Last name" required>
                                </div>
                            </div><br>
                            <div class="mb-3">
                                <label for="text">Cin :</label>
                                <input type="text" name="cin_client" class="form-control text-uppercase" id="cin" placeholder="CIN" required>
                            </div><br>
                            <!-- <div class="mb-3">
                                <label for="text">Numéro De Passeport :</label>
                                <input type="text" name="num_pasport" class="form-control" id="num_pasport" placeholder="Numéro De Passeport" required>
                            </div><br>
                            <div class="mb-3">
                                <label for="example-tel-input">Telephone :</label>
                                <input type="number" name="phon" class="form-control" id="example-tel-input" placeholder="Telephone" required>
                            </div><br> -->
                            <div class="mb-3">
                                <label for="text">Email :</label>
                                <input type="text" name="email" class="form-control" id="email" placeholder="you@example.com" required>
                            </div><br>

                            <!-- password -->
                            <div class="mb-3">
                                <label for="text">Mot De Pass :</label>
                                <input type="text" name="Motpass" class="form-control" id="Motpass2" placeholder="you@example.com" onkeyup="testPassword2()" required>
                            </div><br>
                            <div class="mb-3">
                                <label for="text">Confermer Le Mot De Pass :</label>
                                <input type="text" name="ConfirmMotpass" class="form-control" id="ConfirmMotpass2" placeholder="you@example.com" onkeyup="testPassword2()" required>
                            </div>
                            <h2 id="error_pasword2"></h2><br>

                            <hr class="mb-4">
                            <button class="btn btn-outline-success btn-lg btn-block" type="submit"  name="submit" id="btnsubmit2">Reserve</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <a href="admin.php">admin.php</a>
        <a href="user.php">user.php</a>
        <br>



























        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    </body>
</html>