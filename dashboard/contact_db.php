<?php
session_start();
ob_start();
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

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/form.css">
    <link rel="stylesheet" href="../assets/css/dashboard.css">
    <link rel="stylesheet" href="../assets/css/headernfooter.css">
    <link rel="icon" href="../assets/img/logo.png">
    <style>
        .ver-nav-item:nth-of-type(4) {
            background-color: #ffdcd1;
            color: #c64444;
        }

        .ver-nav-item:nth-of-type(4) i {
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
        <!-- General statistics -->
        <section class="db-general">
            <div class="db-header">
                <h2 class="db-header__heading">General statistics</h2>
            </div>
            <ul class="db-general-container">
                <li class="db-general-item">
                    <h3 class="db-general-item__title">Processing contacts</h3>
                    <p class="db-general-item__number">0</p>
                </li>
                <li class="db-general-item">
                    <h3 class="db-general-item__title">Processed contacts</h3>
                    <p class="db-general-item__number">0</p>
                </li>
            </ul>
        </section>

        <section class="db-record">
            <div class="db-header">
                <h2 class="db-header__heading">Contact info</h2>
            </div>
            <table class="db-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Created at</th>
                    </tr>
                </thead>
                <tbody class="db-table__contact-records">
                    <!-- Contact records will be rendered here -->
                </tbody>
            </table>
        </section>
    </main>

    <script src="../assets/js/popupMsg.js"></script>
    <script src="../assets/js/validator.js"></script>
    <script src="../assets/js/preventDefaultSubmission.js"></script>

    <script>
        function renderContactRecords() {
            $.ajax({
                url: "./render_contact_records.php",
                type: "POST",
                data: fd,
                processData: false,
                contentType: false,
                success: function(response) {
                    alert(response);
                    document.querySelector('.db-table__contact-records').innerHTML = response;
                },
                fail: function() {
                    document.querySelector('.db-table__contact-records').innerHTML = "Something went wrong. Reload the page!";
                },
                error: function() {
                    document.querySelector('.db-table__contact-records').innerHTML = "Something went wrong. Reload the page!";
                }
            })
        }

        renderContactRecords();
    </script>
    <script src="../assets/js/toggleVerNavDb.js"></script>
</body>

</html>