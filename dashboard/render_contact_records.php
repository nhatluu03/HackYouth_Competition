<?php
	// id VARCHAR(50) NOT NULL,
    // name VARCHAR(50) NOT NULL,
    // email VARCHAR(100) NOT NULL,
    // message TEXT NOT NULL,
    // created_at DATETIME NOT NULL,

    include('../db/connect.php');
    if (isset($_POST[''])) {
        $query = "SELECT * FROM contact";
        $res = mysqli_query($conn, $query);
        if (mysqli_num_rows($res) > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                $id = $row['id'];
                $name = $row['name'];
                $email = $row['email'];
                $message = $row['message'];
                $created_at = $row['created_at'];
                
                echo '<tr>
                        <td>'.$id.'</td>
                        <td>'.$name.'</td>
                        <td>'.$email.'</td>
                        <td>'.$message.'</td>
                        <td>'.$created_at.'</td>
                    </tr>';
            }
        }
    }
