<?php
include("inc/config.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $valid = 1;
    if (isset($_POST['id']) && isset($_POST['change'])) {
        $vinid = $_POST['id'];
        $change = intval($_POST['change']);

        // Fetch the Existing status of the VIN
        $query = 'SELECT * FROM tbl_vehicle WHERE vehicle_vin = ?';
        $statement = $pdo->prepare($query);
        // $stmt->bind_param('i', );
        $statement->execute(array($vinid));
        $total = $statement->rowCount();
        if( $total == 0 ) {
            $valid = 0;
            header('location: logout.php');
            exit();
        }
        if($valid == 1){
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            $current_status = $result[0]['vehicle_status'];
            // $stmt->close();
            // $current_status = 1;

            try{
                if ($current_status !== null){
                    $new_status = $current_status + $change;
                    $new_status = intval($new_status);
        
                    // Update the status in the database
                    $update_query = "UPDATE tbl_vehicle SET vehicle_status = ? WHERE vehicle_vin = ? ;";
                    $update_stmt = $pdo->prepare($update_query);
                    $update_stmt->execute(array($new_status, $vinid));
                    
                    // Fetch the updated status
                    $action_query = "select vehicle_action from tbl_vehicle_status where vehicle_status = ?";
                    $action_stmt = $pdo->prepare($action_query);
                    $action_stmt->execute(array($new_status));
                    $result_action = $action_stmt->fetchAll(PDO::FETCH_ASSOC);
                    $action = $result_action[0]['vehicle_action'];

                    echo json_encode(['success' => true, 'message' => $action,'new_status' => $new_status,'current' => $current_status]);
        
                }else{
                    echo json_encode(['success' => false, 'message' => 'Error updating status.']);
                }
            } catch(Exception $e){
                echo json_encode(['success' => false, 'message' => 'Error updating status']);
            }
        }
        
        
    }else{
        echo json_encode(['success' => false, 'message' => 'Data not found']);
    }
}else {
        
}