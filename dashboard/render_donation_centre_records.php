<?php
// id VARCHAR(50) NOT NULL,
// username VARCHAR(50) UNIQUE NOT NULL,
// password VARCHAR(50) NOT NULL,
// name VARCHAR(50) NOT NULL,
// created_at DATETIME NOT NULL,
// phone VARCHAR(10) NULL,
// email VARCHAR(100) NULL,

// user_id VARCHAR(50) NOT NULL,
// blood_group_id VARCHAR(500) NOT NULL,
// birth_date DATETIME NULL,
// sex ENUM("male", "female", "other") NULL,
// address TEXT NULL,
// height INT NULL,
// weight INT NULL,
// is_addicted_alcohol ENUM("1", "0") NULL,
// is_positive_drug ENUM("1", "0") NULL,
include('../db/connect.php');
$query = "SELECT * FROM hospital, donation_centre 
        WHERE hospital.id = donation_centre.hospital_id 
        ORDER BY donation_centre.created_at";
$res = mysqli_query($conn, $query);
if (mysqli_num_rows($res) > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
        $id = $row['id'] ? $row['id'] :"Null";
        $name = $row['name'] ? $row['name'] :"Null";
        $address = $row['address'] ? $row['address'] :"Null";
        $created_at = $row['created_at'] ? $row['created_at'] :"Null";

        echo '<tr>
                        <td>' . $id . '</td>
                        <td>' . $name . '</td>
                        <td>' . $address . '</td>
                        <td>' . $created_at . '</td>
                    </tr>';
    }
}
