<?php

    $errors = array();

    //function 
    function redirect($url){
        header("Location:".$url);
        exit();
    }

    // function succes_msg_menu(){
        
    //     //methode-2 avec ssection

    //     $smsg= "<div class='alert alert-success alert-dismissible'>";
    //     $smsg.= "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
    //     $smsg.= "<strong>Success!</strong>New Voll created successfully. ";
    //     $smsg.= "</div>";

    //     return $smsg;

    // }

    // function error_msg_menu(){
    //     $emsg= "<div class='alert alert-danger alert-dismissible'>";
    //     $emsg.= "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
    //     // $emsg.= "<strong>Success!</strong>"." ".mysqli_error($conn).". ";
    //     $emsg.= "</div>";

    //     return $emsg;
    // }


    function succes_msg_vol(){
        
        //methode-2 avec ssection

        $smsg= "<div class='alert alert-success alert-dismissible'>";
        $smsg.= "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
        $smsg.= "<strong>Success!</strong>New Voll created successfully. ";
        $smsg.= "</div>";

        return $smsg;

    }

    function error_msg_vol(){
        $emsg= "<div class='alert alert-danger alert-dismissible'>";
        $emsg.= "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
        // $emsg.= "<strong>Success!</strong>"." ".mysqli_error($conn).". ";
        $emsg.= "<strong>Sorry!</strong>You can not add thes Voll !. ";
        $emsg.= "</div>";

        return $emsg;
    }

    function succes_msg($text){
        
        //methode-2 avec ssection

        $smsg= "<div class='alert alert-success alert-dismissible'>";
        $smsg.= "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
        $smsg.= "<strong>Success!</strong>{$text}. ";
        $smsg.= "</div>";

        return $smsg;

    }

    function error_msg($text){
        $emsg= "<div class='alert alert-danger alert-dismissible'>";
        $emsg.= "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
        // $emsg.= "<strong>Success!</strong>"." ".mysqli_error($conn).". ";
        $emsg.= "<strong>Sorry!</strong>{$text} !. ";
        $emsg.= "</div>";

        return $emsg;
    }






    // //validation form

    function check_input($data){
        $data = str_replace("_","",$data);
        //pour annuler les space
        $data = trim($data);
        $data = stripslashes($data);
        //premier letre majuscul
        $data = ucfirst($data);
        return $data;
    }

    // function check_content($data){
    //     $data = stripslashes($data);
    //     $data = htmlspecialchars($data);
    //     return $data;
    // }

    // function check_length($data,$max,$min){
    //     global $errors;
    //     if(strlen($data)<$min){
    //         $errors['too short'] = "input is too short,minimum is 4 characters (12 max).";
    //     }
    //     else if(strlen($data)>$max){
    //         $errors['too long'] = "input is too long,maximum is 12 characters.";
    //     }
    //     else{
    //         return $data;
    //     }
    // }

    // function checkEmpty($data){
    //     global $errors;
    //     $data = trim($data);

    //     if(isset($data)=== true && $data ===''){
    //         $errors['empty'] = 'empty fieled!.';
    //     }
    //     else{
    //         return $data;
    //     }
    // }

    function checkEmptyPage($data){
        global $errors;
        // $data = trim($data);

        if(isset($data)=== true && $data ===''){
            $errors['empty'] = 'empty fieled!.';
            // $_SESSION['action_control'] = 1;
            // redirect()

        }
        else{
            return $data;
        }
    }

    function error_function($errors = array()){

        // $data ="";

        if(!empty($errors)){
            // echo "<h4>Errors</h4>";
            // echo "<ul class='list-group'>";
            foreach($errors as $key => $value){

                // echo "<li class='list-group-item'>";

                echo "<div class='alert alert-warning alert-dismissible'>";
                echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
                echo "<strong>Wrong!</strong>{$key} => {$value} ";
                echo "</div>";

                // echo "</li>";
            }    
            // echo "</ul>";
            // return $data;
        }
    }




    // function succes_update_msg_menu(){
    //     $smsg= "<div class='alert alert-success alert-dismissible'>";
    //     $smsg.= "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
    //     $smsg.= "<strong>Success!</strong>Record updated successfully. ";
    //     $smsg.= "</div>";

    //     return $smsg;
    // }

    // function fail_update_msg_menu(){
    //     $smsg= "<div class='alert alert-warning alert-dismissible'>";
    //     $smsg.= "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
    //     $smsg.= "<strong>Success!</strong>Sorry record not updated. ";
    //     $smsg.= "</div>";

    //     return $smsg;
    // }

    // function succes_delete_msg_menu(){
    //     $smsg= "<div class='alert alert-success alert-dismissible'>";
    //     $smsg.= "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
    //     $smsg.= "<strong>Success!</strong>Record deleted successfully. ";
    //     $smsg.= "</div>";

    //     return $smsg;
    // }

    // function fail_delete_msg_menu(){
    //     $smsg= "<div class='alert alert-warning alert-dismissible'>";
    //     $smsg.= "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
    //     $smsg.= "<strong>Sorry!</strong>You can not delete menu contain pages . ";
    //     $smsg.= "</div>";

    //     return $smsg;
    // }

    // START SESSION UPS

    // function msg(){
    //     if(isset($_SESSION['msg'])){
    //         $mmsg = $_SESSION['msg'];

    //         $_SESSION['msg'] = null;
    //         return $mmsg;
    //     }
    // }

    // function err(){
    //     if(isset($_SESSION['errors'])){
    //         $mmsg = $_SESSION['errors'];

    //         $_SESSION['errors'] = null;
    //         return $mmsg;
    //     }
    // }

    // END SESSION OUPS
?>