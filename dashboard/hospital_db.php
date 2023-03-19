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
    <style>
        .ver-nav-item:nth-of-type(3) {
            background-color: #ffdcd1;
            color: #c64444;
        }

        .ver-nav-item:nth-of-type(3) i {
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
            <!-- General hospital statistics will be rendered here -->
        </section>

        <section class="db-record">
            <div class="db-header">
                <h2 class="db-header__heading">Donation centre info</h2>
                <i class="fa-regular fa-plus db-header__ic open-add-centre-btn"></i>
            </div>
            <table class="db-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Created at</th>
                    </tr>
                </thead>
                <tbody class="db-table__donation-centre-records">
                    <!-- Donation centre records will be rendered here -->
                </tbody>
            </table>
        </section>


        <section class="db-record">
            <div class="section-header">
                <div>
                    <h2 class="db-header__heading">Hospital info</h2>
                    <i class="fa-regular fa-plus db-header__ic open-add-hospital-btn"></i>
                </div>
                <a href="../hr_registration.php" class="add-staff-btn">Add HR</a>

            </div>
            <table class="db-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Created at</th>
                        <th>Update</th>
                    </tr>
                </thead>
                <tbody class="db-table__hospital-records">
                    <!-- Hospital records will be rendered here -->
                </tbody>
            </table>
        </section>
    </main>

    <?php
    include('../db/connect.php');
    if (isset($_GET['edit_hospital_id'])) {
        include('./edit_hospital.php');
    } else if (isset($_GET['delete_hospital_id'])) {
        include('./delete_hospital.php');
    }
    ?>

    <!-- Add donation centre form -->
    <form action="" method="POST" class="add-centre-form toggle-form hide">
        <div class="form-name">Add donation centre</div>
        <i class="fa-solid fa-xmark close-ic"></i>
        <div class="form-field">
            <label for="hospital-id" class="form-field__label">Hospital ID</label>
            <input type="text" name="hospital_id" id="hospital-id" class="form-field__input" placeholder="Enter hospital ID">
            <span class="form-field__message"></span>
        </div>
        <div class="form-field">
            <input type="submit" name="add_centre_btn" id="add-centre-btn" class="form-field__input btn-hover color-4" value="Accept">
        </div>
    </form>

    <!-- Add hospital form -->
    <form action="" method="POST" class="add-hospital-form toggle-form hide">
        <div class="form-name">Add hospital</div>
        <i class="fa-solid fa-xmark close-ic"></i>
        <div class="form-field">
            <label for="hospital-name" class="form-field__label">Name</label>
            <input type="text" name="hospital_name" id="hospital-name" class="form-field__input" placeholder="Enter hospital name">
            <span class="form-field__message"></span>
        </div>
        <div class="form-field">
            <label for="hospital-address" class="form-field__label">Address</label>
            <input type="text" name="hospital_address" id="hospital-address" class="form-field__input" placeholder="Enter hospital address">
            <span class="form-field__message"></span>
        </div>
        <div class="form-field">
            <input type="submit" name="add_hospital_btn" id="add-hospital-btn" class="form-field__input btn-hover color-4" value="Accept">
        </div>
    </form>

    <script src="../assets/js/popupMsg.js"></script>
    <script src="../assets/js/validator.js"></script>
    <script src="../assets/js/preventDefaultSubmission.js"></script>

    <script>
        function renderHospitalStatistics() {
            $.ajax({
                url: "./render_hospital_statistics.php",
                type: "POST",
                processData: false,
                contentType: false,
                success: function(response) {
                    // alert(response);
                    document.querySelector('.db-general').innerHTML = response;
                },
                fail: function() {
                    document.querySelector('.db-general').innerHTML = "Something went wrong. Reload the page!";
                },
                error: function() {
                    document.querySelector('.db-general').innerHTML = "Something went wrong. Reload the page!";
                }
            })
        }
        renderHospitalStatistics();
    </script>

    <script>
        function renderDonationCentreRecords() {
            $.ajax({
                url: "./render_donation_centre_records.php",
                type: "POST",
                processData: false,
                contentType: false,
                success: function(response) {
                    // alert(response);
                    document.querySelector('.db-table__donation-centre-records').innerHTML = response;
                },
                fail: function() {
                    document.querySelector('.db-table__donation-centre-records').innerHTML = "Something went wrong. Reload the page!";
                },
                error: function() {
                    document.querySelector('.db-table__donation-centre-records').innerHTML = "Something went wrong. Reload the page!";
                }
            })
        }

        function renderHospitalRecords() {
            $.ajax({
                url: "./render_hospital_records.php",
                type: "POST",
                processData: false,
                contentType: false,
                success: function(response) {
                    // alert(response);
                    document.querySelector('.db-table__hospital-records').innerHTML = response;
                },
                fail: function() {
                    document.querySelector('.db-table__hospital-records').innerHTML = "Something went wrong. Reload the page!";
                },
                error: function() {
                    document.querySelector('.db-table__hospital-records').innerHTML = "Something went wrong. Reload the page!";
                }
            })
        }

        renderDonationCentreRecords();
        renderHospitalRecords();
    </script>

    <script src="../assets/js/toggleDisplayForm.js"></script>
    <script>
        let addCentreForm = document.querySelector('.add-centre-form');
        let openAddCentreFormBtn = document.querySelector('.open-add-centre-btn');
        let closeAddCentreFormBtn = document.querySelector('.add-centre-form .close-ic');
        toggleDisplayForm(addCentreForm, openAddCentreFormBtn, closeAddCentreFormBtn);
    </script>

    <script>
        let addHospitalForm = document.querySelector('.add-hospital-form');
        let openAddHospitalFormBtn = document.querySelector('.open-add-hospital-btn');
        let closeAddHospitalFormBtn = document.querySelector('.add-hospital-form .close-ic');
        toggleDisplayForm(addHospitalForm, openAddHospitalFormBtn, closeAddHospitalFormBtn);
    </script>

    <script src="../assets/js/preventDefaultSubmission.js"></script>
    <script src="../assets/js/popupMsg.js"></script>
    <script src="../assets/js/validator.js"></script>
    <script>
        document.querySelector("#add-hospital-btn").addEventListener("click", function() {
            let addHospitalForm = document.querySelector('.add-hospital-form');
            let fd = new FormData(addHospitalForm);

            // Validation here

            $.ajax({
                url: "./add_hospital.php",
                type: "POST",
                data: fd,
                processData: false,
                contentType: false,
                success: function(response) {
                    alert(response);
                    if (response == "1") {
                        closeForm(document.querySelector('.add-hospital-form'))
                        renderHospitalRecords();
                        renderHospitalStatistics();
                        createPopupMsg("success", "Successfully add the hospital");
                    } else if (response == "0") {
                        showError(document.querySelector("#hospital-name"), "Hospital name already exists");
                    }
                },
                fail: function() {
                    createPopupMsg("fail", "Something went wrong. Please try again!");
                },
                error: function() {
                    createPopupMsg("fail", "Something went wrong. Please try again!");
                }
            })
        })

        document.querySelector("#add-centre-btn").addEventListener("click", function() {
            let addHospitalForm = document.querySelector('.add-centre-form');
            let fd = new FormData(addHospitalForm);

            // Validation here

            $.ajax({
                url: "./add_donation_centre.php",
                type: "POST",
                data: fd,
                processData: false,
                contentType: false,
                success: function(response) {
                    alert(response);
                    if (response == "1") {
                        closeForm(document.querySelector('.add-centre-form'))
                        renderDonationCentreRecords();
                        renderHospitalStatistics();
                        createPopupMsg("success", "Successfully add the centre");
                    } else if (response == "0") {
                        showError(document.querySelector("#hospital-id"), "Hospital is already a donation centre ");
                    }
                },
                fail: function() {
                    createPopupMsg("fail", "Something went wrong. Please try again!");
                },
                error: function() {
                    createPopupMsg("fail", "Something went wrong. Please try again!");
                }
            })
        })
    </script>
    <script src="../assets/js/toggleVerNavDb.js"></script>
</body>

</html>

<?php
ob_end_flush();
?>