<?php
// id varchar(50) PK 
// name text 
// address text 
// created_at datetime

include("../db/connect.php");
include("../php/gen_uuid.php");
if (isset($_POST["hospital_name"])) {
    $id = gen_uuid();
    $name = $_POST["hospital_name"];
    $lowercase_name = strtolower($name);
    $address = $_POST["hospital_address"];
    $created_at = date('Y-m-d H:i:s');


    // Check if the hospital name already exists
    $stmt1 = $conn->prepare("SELECT * FROM hospital WHERE LOWER(name) = ?");
    $stmt1->bind_param("s", $lowercase_name);
    $stmt1->execute();
    $stmt1->store_result();
    if ($stmt1->num_rows() > 0) {
        echo "0";
    } else {
        // Insert to tbl hospital
        $stmt2 = $conn->prepare("INSERT INTO hospital (`id`, `name`, `address`, `created_at`)
                                VALUES (?, ?, ?, ?)");
        $stmt2->bind_param("ssss", $id, $name, $address, $created_at);
        $stmt2->execute();
        echo "1";
    }
}
