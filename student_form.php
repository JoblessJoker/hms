<?php require 'mysql_helper.php'; ?>

<?php
$data = array(
    "id" => null, "enrollment_num" => "", "student_name" => "", "father_name" => "", "dob" => "",
    "course" => "", "cgpa" => "", "mess_id" => "", "hostel_id" => "", "room_num" => ""
);

$id = null;

if (isset($_GET['id'])) {

    $link = startConnection();
    $id = $_GET['id'];
    $data_query = "SELECT * FROM students WHERE id = $id;";
    $data = $link->query($data_query)->fetch_assoc();
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">

    <title>IET HMS</title>
</head>

<body>
    <div class="logo-container horizontal-center">
        <img src="image/Ietlogo.png" alt="">
    </div>

    <div class="card horizontal-center" style="width: fit-content; margin-top: 1em; padding-left: 1em; padding-right:1em;">
        <div class="card-body" style="text-align: center; padding:0.5em;">
            <h3>Student Details Form</h3>

            <form action="" method="post" style="text-align: left;">
                <table class="horizontal-center">
                    <tr>
                        <td><label for="enrollment_num">Enrollment Number</label></td>
                        <td><input name="enrollment_num" type="text" value="<?php echo $data['enrollment_num']; ?>" placeholder="Enrollment Number" required></td>
                    </tr>
                    <tr>
                        <td><label for="student_name">Student Name</label></td>
                        <td><input name="student_name" type="text" value="<?php echo $data['student_name']; ?>" placeholder="Student Name" required></td>
                    </tr>
                    <tr>
                        <td><label for="father_name">Father Name</label></td>
                        <td><input name="father_name" type="text" value="<?php echo $data['father_name']; ?>" placeholder="Father Name" required></td>
                    </tr>
                    <tr>
                        <td><label for="dob">Date Of Birth</label></td>
                        <td><input name="dob" type="date" value="<?php echo $data['dob']; ?>" placeholder="Date Of Birth" required></td>
                    </tr>
                    <tr>
                        <td><label for="course">Course</label></td>
                        <td><input name="course" type="text" value="<?php echo $data['course']; ?>" placeholder="Course" required></td>
                    </tr>
                    <tr>
                        <td><label for="cgpa">CGPA</label></td>
                        <td><input name="cgpa" type="number" step="0.01" value="<?php echo $data['cgpa']; ?>" placeholder="CGPA" required></td>
                    </tr>
                    <tr>
                        <td><label for="mess_id">Mess ID</label></td>
                        <td><input name="mess_id" type="text" value="<?php echo $data['mess_id']; ?>" placeholder="Mess ID" required></td>
                    </tr>
                    <tr>
                        <td><label for="hostel_id">Hostel ID</label></td>
                        <td><input name="hostel_id" type="text" value="<?php echo $data['hostel_id']; ?>" placeholder="Hostel ID" required></td>
                    </tr>
                    <tr>
                        <td><label for="room_num">Room Number</label></td>
                        <td><input name="room_num" type="text" value="<?php echo $data['room_num']; ?>" placeholder="Room Number" required></td>
                    </tr>
                </table>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div style="text-align: center; margin-top:1em; margin-bottom:2em;">
                    <button type="submit">Submit</button>
                </div>
            </form>

            <div>
                <a href="index.php">Return to Home</a>
            </div>
        </div>
    </div>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        if (
            !empty($_POST['enrollment_num']) && !empty($_POST['student_name']) && !empty($_POST['father_name']) &&
            !empty($_POST['dob']) && !empty($_POST['course']) && !empty($_POST['cgpa']) &&
            !empty($_POST['mess_id']) && !empty($_POST['hostel_id']) && !empty($_POST['room_num'])
        ) {
            $data['id'] = null;
            $data['enrollment_num'] = $_POST['enrollment_num'];
            $data['student_name'] = $_POST['student_name'];
            $data['father_name'] = $_POST['father_name'];
            $data['dob'] = $_POST['dob'];
            $data['course'] = $_POST['course'];
            $data['cgpa'] = $_POST['cgpa'];
            $data['mess_id'] = $_POST['mess_id'];
            $data['hostel_id'] = $_POST['hostel_id'];
            $data['room_num'] = $_POST['room_num'];

            if (!empty($_POST['id'])) {
                $data['id'] = $_POST['id'];
                update_table_content($data);
                echo "Data Updated Successfully!";
            } else {
                insert_table_content($data);
                echo "Data Created Successfully";
            }
        }
    }
    ?>
</body>

</html>