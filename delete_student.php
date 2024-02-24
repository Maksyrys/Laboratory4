<?php
session_start();
if(isset($_SESSION['userType'])){
    if($_SESSION['userType'] !=1){
        header('location: maksimka_podgornuy_error.php');
    }
    else{
        require_once("maksim_podgornuy_database.php");
        $id=$_GET['id'];

        $res=$con->query("SELECT majorID FROM student WHERE studentID=".$id);
        $majorID=$res->fetch()['majorID'];

        $query=$con->prepare("DELETE FROM student WHERE studentID =:id");
        $query->execute(array('id'=>$id));
        header('location: index.php?idMajor='.$majorID);
    }

}
else{
    header('location: maksimka_podgornuy_error.php');
}
    
?>