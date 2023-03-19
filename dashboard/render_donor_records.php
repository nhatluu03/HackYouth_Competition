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
include('../php/format.php');

$query = "SELECT *, user.name as full_name, blood_group.name as blood_group
                FROM user, donor, blood_group
                WHERE user.id = donor.user_id
                AND blood_group.id = donor.blood_group_id 
                ORDER BY created_at";
$res = mysqli_query($conn, $query);
if (mysqli_num_rows($res) > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
        $avatar = $row['avatar'] ? $row['avatar'] : 'default_avatar.png';
        $username = $row['username'] ? $row['username'] : "Null";
        $password = $row['password'] ? $row['password'] : "Null";
        $blood_group = $row['blood_group'] ? $row['blood_group'] : "Null";
        $name = $row['full_name'] ? $row['full_name'] : "Null";
        $phone = $row['phone'] ? $row['phone'] : "Null";
        $address = $row['address'] ? $row['address'] : "Null";
        $birth_date = $row['birth_date'] ? $row['birth_date'] : "Null";
        $sex = $row['sex'] ? $row['sex'] : "Null";
        $address = $row['address'] ? $row['address'] : "Null";
        $height = $row['height'] ? $row['height'] : "Null";
        $weight = $row['weight'] ? $row['weight'] : "Null";
        $is_addicted_alcohol = $row['is_addicted_alcohol'] == 1 ? "Null" : "Null";
        $is_positive_drug = $row['is_positive_drug'] == 1 ? "+" : "Null";
        $created_at = $row['created_at'];

        echo '<tr>
                        <td><img src="../db/uploads/users/'.$avatar.'" alt=""></td>
                        <td>' . $username . '</td>
                        <td>' . format_length($password, 15) . '</td>
                        <td>' . $name . '</td>
                        <td>' . strtoupper($blood_group) . '</td>
                        <td>' . $birth_date . '</td>
                        <td>' . $sex . '</td>
                        <td>' . $phone . '</td>
                        <td>' . $address . '</td>
                        <td>' . $height . ' x ' . $weight . '</td>
                        <td>' . $is_addicted_alcohol . '</td>
                        <td>' . $is_positive_drug . '</td>
                        <td>' . date_format(date_create($created_at), "h:m d.m.20y") . '</td>
                    </tr>';
    }
}