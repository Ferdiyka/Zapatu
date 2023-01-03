<?php

    include '..\db.php';
        
    if(isset($_GET['id_trans'])){
        $data = explode("_", $_GET['id_trans']);

        foreach($conn->query('SELECT CURRENT_TIMESTAMP') as $dates) {
            $date = $dates['CURRENT_TIMESTAMP'] ;
        }

        $update = mysqli_query($conn, "UPDATE tb_transaction SET 
        trans_status        = '".$data[1]."',
        trans_status_date   = '".$date."'
        WHERE trans_id = '".$data[0]."' ");

        if($update){
            if($data[1] == 1){
                echo '<script>alert("Transaction Verified")</script>';
                echo '<script>window.location="admin-dashboard.php"</script>';
            }else{
                echo '<script>alert("Transaction Rejected")</script>';
                echo '<script>window.location="admin-dashboard.php"</script>';
            }

        }else{
            echo 'gagal '.mysqli_error($conn);
        }

    }


?>