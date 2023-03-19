<?php
// id VARCHAR(50) NOT NULL,
// username VARCHAR(50) UNIQUE NOT NULL,
// password VARCHAR(50) NOT NULL,
// name VARCHAR(50) NOT NULL,
// created_at DATETIME NOT NULL,
// phone VARCHAR(10) NULL,
// email VARCHAR(100) NULL,

// user_id VARCHAR(50) NOT NULL,

include('../db/connect.php');
include('../php/format.php');
$query = "SELECT *
        FROM user, admin
        WHERE user.id = admin.user_id
        ORDER BY user.created_at";
$res = mysqli_query($conn, $query);
if (mysqli_num_rows($res) > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
        $avatar = $row['avatar'] ? $row['avatar'] : 'default_avatar.png';
        $username = $row['username'] ? $row['username'] : "Null";
        $password = $row['password'] ? $row['password'] : "Null";
        $name = $row['name'] ? $row['name'] : "Null";
        $phone = $row['phone'] ? $row['phone'] : "Null";
        $created_at = $row['created_at'];

        echo '<tr>
                        <td><img src="../db/uploads/users/'.$avatar.'" alt=""></td>
                        <td>' . $username . '</td>
                        <td>' . format_length($password, 15) . '</td>
                        <td>' . $name . '</td>
                        <td>' . $phone . '</td>
                        <td>' . $created_at . '</td>
                    </tr>';
    }
}
