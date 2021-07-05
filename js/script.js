function delete_row(id, enrollment_num) {
    if (confirm("Are you sure you want to delete " + enrollment_num + " data?")) {
        window.open("http://localhost/hms/delete.php?id=" + id, "_self");
    }
}

function update_row(id) {
    window.open("http://localhost/hms/student_form.php?id=" + id, "_self");
}