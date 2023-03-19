<?php
include('../db/connect.php');
include('../php/gen_uuid.php');

if (isset($_POST['hospital_id'])) {
    $hospital_id = $_POST['hospital_id'];
    $created_at = date('Y-m-d H:i:s');

    // Check if the hospital name already exists
    $stmt1 = $conn->prepare("SELECT * FROM donation_centre WHERE hospital_id = ?");
    $stmt1->bind_param("s", $hospital_id);
    $stmt1->execute();
    $stmt1->store_result();

    if ($stmt1->num_rows() > 0) {
        echo "0";
    } else {
        // Insert to tbl donation_centre if not duplicate
        $stmt2 = $conn->prepare("INSERT INTO donation_centre (`hospital_id`, `created_at`)
                                VALUES (?, ?)");
        $stmt2->bind_param("ss", $hospital_id, $created_at);
        $stmt2->execute();
        echo "1";
    }
}
