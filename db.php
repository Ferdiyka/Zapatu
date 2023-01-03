<?php
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $dbname   = 'db_zapatu';

    $conn = mysqli_connect($hostname, $username, $password, $dbname) or die("Gagal terhubung dengan database: ". mysqli_connect_error());

    // if($conn){
    //     echo "<script>
    //     alert(`DATABASE CONNECTED!`);
    //         </script>";
    // } 
?>