<?php
if (isset($_GET['edit_hospital_id'])) {
    $hospital_id = $_GET['edit_hospital_id'];
    $stmt = $conn->prepare("SELECT name, address FROM hospital WHERE id = ?");
    $stmt->bind_param("s", $hospital_id);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($name, $address);
    $stmt->fetch();
} else {
    exit;
}
?>
<form action="POST" class="edit-hospital-form toggle-form">
    <h2 class="form-name">Edit hospital</h2>
    <i class="fa-solid fa-xmark close-ic"></i>
    <input type="hidden" name="edit_hospital_id" id="edit-hospital-id" class="form-field__input" value="<?php echo $hospital_id ?>">
    <div class="form-field">
        <label for="edit-hospital-name" class="form-field__label">Name</label>
        <input type="text" name="edit_hospital_name" id="edit-hospital-name" class="form-field__input" placeholder="<?php echo !empty($name) ? $name : "Enter hospital name" ?>" value="<?php echo !empty($name) ? $name : "" ?>">
    </div>

    <div class="form-field">
        <label for="edit-hospital-address" class="form-field__label">Address</label>
        <input type="text" name="edit_hospital_address" id="edit-hospital-address" class="form-field__input" placeholder="<?php echo !empty($address) ? $address : "Enter hospital address" ?>" value="<?php echo !empty($address) ? $address : "" ?>">
    </div>

    <div class="form-field">
        <input type="submit" name="edit_hospital_btn" id="edit-hospital-btn" class="form-field__input btn-hover color-4" value="Accept changes">
    </div>
</form>

<script src="../assets/js/updateUrl.js"></script>
<script>
    document.querySelector('.overlay').classList.remove('hide');
    function closeEditHospitalForm() {
        document.querySelector('.edit-hospital-form').classList.add('hide');
        document.querySelector('.overlay').classList.add('hide');
        updateUrl('./hospital_db.php');
    }
    let editHospitalForm = document.querySelector('.edit-hospital-form');
    editHospitalForm.querySelector('.close-ic').onclick = closeEditHospitalForm;

    editHospitalForm.querySelector('#edit-hospital-btn').onclick = function() {
        let editHospitalForm = document.querySelector('.edit-hospital-form');
        let fd = new FormData(editHospitalForm);

        // Validation here

        $.ajax({
            url: "./update_hospital.php",
            type: "POST",
            data: fd,
            processData: false,
            contentType: false,
            success: function(response) {
                alert(response);
                renderHospitalRecords();
                closeEditHospitalForm();
                updateUrl('./hospital_db.php');
                createPopupMsg("success", "Successfully edit the hospital");
            },
            fail: function() {
                createPopupMsg("fail", "Something went wrong. Please try again!");
            },
            error: function() {
                createPopupMsg("warning", "Something went wrong. Please try again!");
            }
        })
    }

    function closeEditcourseForm() {
        document.querySelector('.edit-course-form').classList.add('non-display');
    }
</script>