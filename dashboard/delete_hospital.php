<?php
if (isset($_GET['delete_hospital_id'])) {
    $hospital_id = $_GET['delete_hospital_id'];
    $stmt = $conn->prepare("SELECT name FROM hospital WHERE id = ?");
    $stmt->bind_param("s", $hospital_id);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($name);
    $stmt->fetch();
} else {
    exit;
}
?>
<form action="POST" class="delete-hospital-form toggle-form">
    <h2 class="form-name">Delete hospital</h2>
    <i class="fa-solid fa-xmark close-ic"></i>
    <input type="hidden" name="delete_hospital_id" id="delete-hospital-id" class="form-field__input" value="<?php echo $_GET['delete_hospital_id']?>" >
    <p style="font-size: 1.6rem; font-weight: 600;" class="form__extra-msg"><?php echo $name ?> </p>
    <p class="form__extra-msg">All information related to the hospital will be deleted</p>
    <div class="form-field">
        <input type="submit" name="delete_hospital_btn" id="delete-hospital-btn" class="form-field__input btn-hover color-4" value="Accept changes">
    </div>
</form>

<script src="../assets/js/updateUrl.js"></script>
<script>
    document.querySelector('.overlay').classList.remove('hide');
    function closeDeleteHospitalForm() {
        document.querySelector('.delete-hospital-form').classList.add('hide');
        document.querySelector('.overlay').classList.add('hide');
        updateUrl('./hospital_db.php');
    }
    let deleteHospitalForm = document.querySelector('.delete-hospital-form');
    deleteHospitalForm.querySelector('.close-ic').onclick = closeDeleteHospitalForm;

    deleteHospitalForm.querySelector('#delete-hospital-btn').onclick = function() {
        let deleteHospitalForm = document.querySelector('.delete-hospital-form');
        let fd = new FormData(deleteHospitalForm);
        console.log(fd.get('delete_hospital_name'))
        console.log(fd.get('delete_hospital_address'))

        $.ajax({
            url: "./update_hospital.php",
            type: "POST",
            data: fd,
            processData: false,
            contentType: false,
            success: function(response) {
                alert(response);
                renderHospitalRecords();
                closeDeleteHospitalForm();
                updateUrl('./hospital_db.php');
                createPopupMsg("success", "Successfully delete the hospital");
            },
            fail: function() {
                createPopupMsg("fail", "Something went wrong. Please try again!");
            },
            error: function() {
                createPopupMsg("warning", "Something went wrong. Please try again!");
            }
        })
    }

    function closeDeletecourseForm() {
        document.querySelector('.delete-course-form').classList.add('non-display');
    }
</script>