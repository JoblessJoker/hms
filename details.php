<?php require 'mysql_helper.php'; ?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">

    <title>IET HMS</title>
</head>

<body>
    <div class="logo-container horizontal-center" style="padding-bottom:2em;">
        <img src="image/Ietlogo.png" alt="">
    </div>

    <div class="card horizontal-center">
        <div style="text-align: center; padding-top:1em">

            <?php
            $link = new mysqli('localhost', 'root', '', 'mysql') or die(mysqli_error("Database Connection Failed"));
            $content_query = "SELECT * FROM students;";
            $content = $link->query($content_query) or die($link->error);
            if (!empty($content->fetch_assoc())) :
            ?>
                <h3>Students Details</h3>

                <table style="width: 100%; padding-bottom: 2em;">
                    <tr>
                        <th>Enrollment Number</th>
                        <th>Name</th>
                        <th>Father's Name</th>
                        <th>Date Of Birth</th>
                        <th>Course</th>
                        <th>CGPA</th>
                        <th>Mess ID</th>
                        <th>Hostel ID</th>
                        <th>Room Number</th>
                        <th>Action</th>
                    </tr>

                    <?php
                    $content = $link->query($content_query) or die($link->error);
                    while ($row = $content->fetch_assoc()) :
                    ?>

                        <tr>
                            <td><?php echo $row['enrollment_num']; ?></td>
                            <td><?php echo $row['student_name']; ?></td>
                            <td><?php echo $row['father_name']; ?></td>
                            <td><?php echo $row['dob']; ?></td>
                            <td><?php echo $row['course']; ?></td>
                            <td><?php echo $row['cgpa']; ?></td>
                            <td><?php echo $row['mess_id']; ?></td>
                            <td><?php echo $row['hostel_id']; ?></td>
                            <td><?php echo $row['room_num']; ?></td>
                            <td><button type="button" onclick="update_row('<?php echo $row['id']; ?>')">Edit</button>
                                &nbsp; &nbsp;<button type="button" onclick="delete_row('<?php echo $row['id']; ?>')">Delete</button></td>
                        </tr>
                <?php
                    endwhile;
                    $link->close();
                endif;
                ?>
                </table>

                <div style="padding-bottom:0.5em;">
                    <a href="http://localhost/hms/student_form.php">Add New Student Detail</a>
                </div>
                <div style="padding-bottom:1em;">
                    <a href="http://localhost/hms/">Return Back To Homepage</a>
                </div>
        </div>
    </div>

    <script>
        function delete_row(id, enrollment_num) {
            if (confirm("Are you sure you want to delete " + enrollment_num + " data?")) {
                window.open("http://localhost/hms/delete.php?id=" + id, "_self");
            }
        }

        function update_row(id) {
            window.open("http://localhost/hms/student_form.php?id=" + id, "_self");
        }
    </script>
</body>

</html>