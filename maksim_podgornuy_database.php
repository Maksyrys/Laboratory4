<?php

try {
    $con=new PDO('mysql:host=127.0.0.1;dbname=maksim_podgornuy_student_db','maksimpodgornuy1','maksimisgreat');
} 

catch(PDOException $e) {
    header("location: maksim_podgornuy_database_error.php?e=" . $e->getMessage());
}
   