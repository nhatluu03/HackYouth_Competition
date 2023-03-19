<?php
session_start();
include('../db/connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin dashboard</title>

    <!-- CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- css for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css for font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/form.css">
    <link rel="stylesheet" href="../assets/css/dashboard.css">
    <link rel="stylesheet" href="../assets/css/headernfooter.css">
    <style>
        .ver-nav-item:nth-of-type(2) {
            background-color: #ffdcd1;
            color: #c64444;
        }

        .ver-nav-item:nth-of-type(2) i {
            color: #c64444;
        }
    </style>
</head>

<body>
    <header>
        <?php include('../header.php'); ?>
    </header>
    <?php
    include('./ver_nav_db.php');
    ?>

    <main class="main">
        <section class="db-chart">
            <div class="chart-container">
                <!-- Pie-chart -->
                <div class="chart-item pie-chart">
                    <canvas id="pie-canvas"></canvas>
                </div>

                <!-- Line-chart -->
                <div class="chart-item line-chart">
                    <canvas id="line-canvas"></canvas>
                </div>
            </div>
        </section>

        <!-- General statistics -->
        <section class="db-general">
            <div class="db-header">
                <h2 class="db-header__heading">General statistics</h2>
            </div>
            <ul class="db-general-container">
                <li class="db-general-item">
                    <h3 class="db-general-item__title">Total donors</h3>
                    <p class="db-general-item__number">
                        <?php
                        $query1 = "SELECT COUNT(*) as no_donors FROM donor";
                        $res1 = mysqli_query($conn, $query1);
                        echo mysqli_fetch_assoc($res1)['no_donors'];
                        ?>
                    </p>
                </li>
                <li class="db-general-item">
                    <h3 class="db-general-item__title">Total HR officers</h3>
                    <p class="db-general-item__number">
                        <?php
                        $query1 = "SELECT COUNT(*) as no_hr_officers FROM administrative_manager";
                        $res1 = mysqli_query($conn, $query1);
                        echo mysqli_fetch_assoc($res1)['no_hr_officers'];
                        ?>
                    </p>
                </li>
                <li class="db-general-item">
                    <h3 class="db-general-item__title">Total database officers</h3>
                    <p class="db-general-item__number">
                        <?php
                        $query1 = "SELECT COUNT(*) as no_database_officers FROM database_officer";
                        $res1 = mysqli_query($conn, $query1);
                        echo mysqli_fetch_assoc($res1)['no_database_officers'];
                        ?>
                    </p>
                </li>
                <li class="db-general-item">
                    <h3 class="db-general-item__title">Total delivery officers</h3>
                    <p class="db-general-item__number">
                        <?php
                        $query1 = "SELECT COUNT(*) as no_delivery_officers FROM delivery_officer";
                        $res1 = mysqli_query($conn, $query1);
                        echo mysqli_fetch_assoc($res1)['no_delivery_officers'];
                        ?>
                    </p>
                </li>
            </ul>
        </section>

        <section class="db-record">
            <div class="db-header">
                <h2 class="db-header__heading">Admin info</h2>
            </div>
            <table class="db-table">
                <thead>
                    <tr>
                        <th></th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Created at</th>
                    </tr>
                </thead>
                <tbody class="db-table__admin-records">
                    <!-- Donor records will be rendered here -->
                </tbody>
            </table>
        </section>

        <section class="db-record">
            <div class="db-header">
                <h2 class="db-header__heading">Donor info</h2>
            </div>
            <table class="db-table">
                <thead>
                    <tr>
                        <th></th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Name</th>
                        <th>Blood group</th>
                        <th>Date of birth</th>
                        <th>Sex</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Height (cm) x Weight (kg)</th>
                        <th>Alcohol addiction</th>
                        <th>Drug addiction</th>
                        <th>Created at</th>
                    </tr>
                </thead>
                <tbody class="db-table__donor-records">
                    <!-- Donor records will be rendered here -->
                </tbody>
            </table>
        </section>
    </main>

    <script src="../assets/js/toggleDisplayForm.js"></script>
    <script src="../assets/js/toggleVerNavDb.js"></script>
    <!-- ChartJS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
    <script>
        const lineLabels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'];

        const lineData = {
            labels: lineLabels,
            datasets: [{
                    label: 'Line 1',
                    backgroundColor: '#f65578',
                    borderColor: '#f65578',
                    borderWidth: 1,
                    data: [0, 18, 28, 42, 24, 14],
                },
                {
                    label: 'Line 2',
                    backgroundColor: '#ff914d',
                    borderColor: '#ff914d',
                    borderWidth: 1,
                    data: [8, 28, 13, 35, 32, 21],
                },
                {
                    label: 'Line 3',
                    backgroundColor: '#40271a',
                    borderColor: '#40271a',
                    borderWidth: 1,
                    data: [0, 48, 40, 36, 25, 20],
                },
            ]
        }

        const lineConfig = {
            type: 'line',
            data: lineData,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: true,
                        position: 'bottom',
                        labels: {
                            padding: 20,
                        }
                    }
                }
            }
        }

        const lineCanvas = document.getElementById('line-canvas');
        const lineChart = new Chart(lineCanvas, lineConfig);
    </script>

    <?php
    $query = "SELECT blood_group.name as blood_group_name, COUNT(donor.user_id) as no_bloods
                            FROM donor RIGHT JOIN blood_group
                            ON donor.blood_group_id = blood_group.id
                            GROUP BY blood_group.id";
    $res = mysqli_query($conn, $query);
    $pieLabels = [];
    $pieData = [];

    if (mysqli_num_rows($res) > 0) {
        while ($row = mysqli_fetch_assoc($res)) {
            $pieLabels[] = strtoupper($row['blood_group_name']);
            $pieData[] = $row['no_bloods'];
        }
    }
    ?>
    <script>
        const pieLlabels = 'My database';

        const pieData = {
            labels: <?php echo json_encode($pieLabels) ?>,
            datasets: [{
                label: pieLlabels,
                data: <?php echo json_encode($pieData) ?>,
                backgroundColor: [
                    '#ffaa74',
                    '#e07968',
                    '#b94c5f',
                    '#8c2456',
                    // #59004a

                ],
                borderWidth: 1,
                hoverOffset: 4
            }]

        };
        const pieConfig = {
            type: 'doughnut',
            data: pieData,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: 85,
                plugins: {
                    legend: {
                        display: true,
                        position: 'bottom',
                        labels: {
                            padding: 20,
                        }
                    }
                }
            }
        };

        const pieCanvas = document.getElementById('pie-canvas');
        const pieChart = new Chart(pieCanvas, pieConfig);
    </script>

    <script>
        function renderAdminRecords() {
            $.ajax({
                url: "./render_admin_records.php",
                type: "POST",
                processData: false,
                contentType: false,
                success: function(response) {
                    // alert(response);
                    document.querySelector('.db-table__admin-records').innerHTML = response;
                },
                fail: function() {
                    createPopupMsg("fail", "Something went wrong. Please try again!");
                },
                error: function() {
                    createPopupMsg("fail", "Something went wrong. Please try again!");
                }
            })
        }

        function renderDonorRecords() {
            $.ajax({
                url: "./render_donor_records.php",
                type: "POST",
                processData: false,
                contentType: false,
                success: function(response) {
                    // alert(response);
                    document.querySelector('.db-table__donor-records').innerHTML = response;
                },
                fail: function() {
                    createPopupMsg("fail", "Something went wrong. Please try again!");
                },
                error: function() {
                    createPopupMsg("fail", "Something went wrong. Please try again!");
                }
            })
        }

        renderAdminRecords();
        renderDonorRecords();
    </script>
</body>

</html>