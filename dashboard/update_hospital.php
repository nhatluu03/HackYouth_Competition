<?php
include('../db/connect.php');
if (isset($_POST['edit_hospital_id'])) {
    $hospital_id = $_POST['edit_hospital_id'];
    $new_hospital_name = $_POST['edit_hospital_name'];
    $new_hospital_address = $_POST['edit_hospital_address'];

    $stmt1 = $conn->prepare("UPDATE hospital
                                SET name = ?,
                                    address = ?
                                WHERE id = ?");
    $stmt1->bind_param("sss", $new_hospital_name, $new_hospital_address, $hospital_id);
    $stmt1->execute();
    echo "1";
} else if (isset($_POST['delete_hospital_id'])) {
    $hospital_id = $_POST['delete_hospital_id'];
    $stmt1 = $conn->prepare("DELETE FROM hospital WHERE id = ?");
    $stmt1->bind_param("s", $hospital_id);
    $stmt1->execute();
    echo "1";
}
