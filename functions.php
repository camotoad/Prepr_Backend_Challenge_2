<?php

function check_login($con){
    if(isset($_SESSION['username']))
    {
        $user = $_SESSION['username'];
        $query = "SELECT * from users where username = '$user' limit 1";

        $result = mysqli_query($con, $query);
        if($result && mysqli_num_rows($result) > 0)
        {
            $data = mysqli_fetch_assoc($result);
            return $data;
        }
    }

    header("Location: login.php");
    die;
}

function check_login2(){
    if(isset($_SESSION['username'])){
        header('Location: index.php');
    }
}

function search($con, $city, $search){

    $query = "select * from `$city` where match(name, description, neighbourhood, room_type, price, beds, accommodates, review_scores_rating, listing_url) against ('%" .$search."%')";
    //$query = "select * from nyc where match (description) against ('castle')";
    $result = $con -> query($query) or die($con->error);
    
    if($result && mysqli_num_rows($result) > 0){
       
        return $result;
    } else {
        return false;
    }
}

function list_count($con, $city){
    $query = "select * from `$city`";
    $result = $con -> query($query) or die($con->error);
    
    return mysqli_num_rows($result);
}

function list_avg($con, $city){
    $query = "select neighbourhood, round(avg(cast(trim(leading '$' from price) as decimal(15,2))),2) as price from `$city` group by neighbourhood;";
    $result = $con -> query($query) or die($con->error);

    if($result && mysqli_num_rows($result) > 0){ 
       return $result;
    } else {
        return false;
    }
}