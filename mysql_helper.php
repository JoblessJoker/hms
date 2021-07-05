<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'mysql');

# Function to start sql connection
function startConnection()
{
    $link = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME) or die($link->error);

    $check_table = "SELECT * FROM students;";
    $data = $link->query($check_table);

    if (!$data) {
        $create_table = "CREATE TABLE students(
            id INT(30) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
            enrollment_num VARCHAR(30) NOT NULL,
            student_name VARCHAR(30) NOT NULL,
            father_name VARCHAR(30) NOT NULL,
            dob date NOT NULL,
            course VARCHAR(30) NOT NULL,
            cgpa FLOAT(10) NOT NULL,
            mess_id VARCHAR(30) NOT NULL, 
            hostel_id VARCHAR(30) NOT NULL,
            room_num VARCHAR(500) NOT NULL );";

        $link->query($create_table) or die($link->error);
    }

    return $link;
}

# Function to Insert Student's data into students table
function insert_table_content($data){
    $enrollment_num = $data['enrollment_num'];
    $student_name = $data['student_name'];
    $father_name = $data['father_name'];
    $dob = $data['dob'];
    $course = $data['course'];
    $cgpa = $data['cgpa'];
    $mess_id = $data['mess_id'];
    $hostel_id = $data['hostel_id'];
    $room_num = $data['room_num'];

    $link = startConnection();
    # Query to insert student's data 
    $insert_query = "INSERT INTO students(id, enrollment_num, student_name, father_name, dob, course, cgpa, mess_id, hostel_id, room_num)
                    VALUES (NULL, '$enrollment_num', '$student_name', '$father_name', '$dob', '$course', '$cgpa', '$mess_id', '$hostel_id', '$room_num');";
    #Run query
    $link->query($insert_query) or die($link->error);
    $link->close();
}

function update_table_content($data){
    $id = $data['id'];
    $enrollment_num = $data['enrollment_num'];
    $student_name = $data['student_name'];
    $father_name = $data['father_name'];
    $dob = $data['dob'];
    $course = $data['course'];
    $cgpa = $data['cgpa'];
    $mess_id = $data['mess_id'];
    $hostel_id = $data['hostel_id'];
    $room_num = $data['room_num'];

    
    $link = startConnection();

    $update_query = "UPDATE students SET enrollment_num='$enrollment_num', student_name='$student_name', father_name='$father_name',
                    dob='$dob', course='$course', cgpa='$cgpa', mess_id='$mess_id', hostel_id='$hostel_id', room_num='$room_num' 
                    WHERE id=$id";

    $link->query($update_query) or die($link->error);
    $link->close();
}

function delete_table_content($id){
    $link = startConnection();

    $delete_query = "DELETE FROM students WHERE id=$id;";
    $link->query($delete_query) or die($link->error);
}
?>