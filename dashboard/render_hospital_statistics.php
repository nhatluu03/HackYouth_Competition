<?php
include('../db/connect.php');

?>
<div class="db-header">
    <h2 class="db-header__heading">General statistics</h2>
</div>
<ul class="db-general-container">
    <li class="db-general-item">
        <h3 class="db-general-item__title">Registered hospitals</h3>
        <p class="db-general-item__number">
            <?php
            $query1 = "SELECT COUNT(*) as no_registered_hospitals FROM hospital";
            $res1 = mysqli_query($conn, $query1);
            echo mysqli_fetch_assoc($res1)['no_registered_hospitals'];
            ?>
        </p>
    </li>
    <li class="db-general-item">
        <h3 class="db-general-item__title">Donation centres</h3>
        <p class="db-general-item__number">
            <?php
            $query2 = "SELECT COUNT(*) as no_registered_donation_centres FROM donation_centre";
            $res2 = mysqli_query($conn, $query2);
            echo mysqli_fetch_assoc($res2)['no_registered_donation_centres'];
            ?>
        </p>
    </li>
    <li class="db-general-item">
        <h3 class="db-general-item__title">Processing requests</h3>
        <p class="db-general-item__number">
            <?php
            $query3 = "SELECT COUNT(*) as no_processing_requests
                    FROM request
                    WHERE status IN ('waiting', 'delivering');";
            $res3 = mysqli_query($conn, $query3);
            echo mysqli_fetch_assoc($res3)['no_processing_requests'];
            ?>
        </p>
    </li>
    <li class="db-general-item">
        <h3 class="db-general-item__title">Successful requests</h3>
        <p class="db-general-item__number">
            <?php
            $query3 = "SELECT COUNT(*) as no_successful_requests
                    FROM request
                    WHERE status = 'delivered'";
            $res3 = mysqli_query($conn, $query3);
            echo mysqli_fetch_assoc($res3)['no_successful_requests'];
            ?>
        </p>
    </li>
</ul>