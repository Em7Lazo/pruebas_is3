<?php   
     sleep(1); 
    if(isset($_POST['username']) && isset($_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $connection = mysqli_connect('localhost', 'root', '', 'bd_proyecto_pj');
        
        $data = mysqli_query($connection, "SELECT * FROM dt_usuarios WHERE USUARIO= '{$username}' AND PASS = '{$password}'");
        
        $row_cnt = mysqli_num_rows($data);
     
        if($row_cnt == 1){
            $row = mysqli_fetch_array($data);
            $id = $row['ID_USUARIO'];
            session_start();
            $_SESSION['user_id'] = $id;
            
            echo "success";
        }else{
            
            echo "failed";
        }
    }

        

?>