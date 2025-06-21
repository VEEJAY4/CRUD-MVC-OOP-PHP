/*---------- JQUERY - AJAX ----------*/
$(document).ready(() => {
    $('#myTable').DataTable({
        scrollY: '500px',
        scrollCollapse: true
    });

    /*---------- PASSING DATA ----------*/
    // INSERT
    $(".form-insert").submit((event) => {
        event.preventDefault();

        var fname = $("#fname-insert").val();
        var lname = $("#lname-insert").val();
        var age = $("#age-insert").val();
        var submit = $("#submit-insert").val();

        $(".form-error-message-insert").load("includes/insertStudent.inc.php", {
            fname: fname,
            lname: lname,
            age: age,
            submit: submit
        });
    });
});

/*---------- RESET MODAL FORM (Insert New Student) ----------*/
function resetForm()
{
    document.getElementById("insertForm").reset();
    document.getElementById('form-error-message-insert').innerHTML = '';
    document.getElementById("form-error-message-insert").classList.remove("error-insert");
}

/*---------- SWEET ALERT (Insert Successfully) ----------*/
function notifInserted()
{
    Swal.fire({
        icon: 'success',
        title: 'Record Saved!',
        text: 'Successfully inserted a new student!',
        confirmButtonText: 'Ok'
    }).then((confirm) => {
        if (confirm.isConfirmed)
            location.reload();
    });
}

/*---------- SWEET ALERT (Update Confirming) ----------*/
function confirmUpdate(form)
{
    Swal.fire({
        title: 'Are you sure?',
        text: "The data will be updated based on your inputs.",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Update'
    }).then((clicked) => {
        if(clicked.isConfirmed)
            form.submit();
    });

    return false;
}

/*---------- SWEET ALERT (Delete Successfully) ----------*/
function deleteSubmitForm(form)
{
    Swal.fire({
        icon: 'success',
        title: 'Deleted Successfully!',
        text: 'Record has been deleted!',
        showConfirmButton: false,
        timer: 2000
    }).then(() => {
        form.submit();
    });

    return false;
}

/*---------- SWEET ALERT (Retrieve Successfully) ----------*/
function retrieveSubmitForm(form)
{
    Swal.fire({
        icon: 'success',
        title: 'Successfully Retrieved!',
        text: 'Record has been restored!',
        showConfirmButton: false,
        timer: 2000
    }).then(() => {
        form.submit();
    });

    return false;
}