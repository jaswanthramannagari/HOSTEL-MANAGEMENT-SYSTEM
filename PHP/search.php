<!DOCTYPE html>
<html>
    <head>
        <title>Student Display</title>
        <link rel="stylesheet" href="styles.css">
        <style>
             .update{
                 background-color: green;
    padding: auto;
    border: none;
    color: white;
    text-align:center;
    width: 150px;
    height: 50px;;
    display: inline-block;
    margin: 4px 2px;
    cursor : pointer;
}
        .delete{
    background-color: red;
    padding: auto;
    border: none;
    color: white;
    text-align:center;
    width: 150px;
    height: 50px;;
    display: inline-block;
    margin: 4px 2px;
    cursor : pointer;
}
        
        </style>
    </head>
<body>
    <table style="width: 100%;text-align: center;">
        <tr>
            <td class="logo" ><img src="download.jfif"></td>
            <td ><h2>COLLEGE OF ENGINEERING - GUINDY</h2><h4>Anna University, Chennai</h4></td>
                <td class="logo" ><img src="CEGlogo.jpg"></td>
        </tr>
    </table><br>
    <br><br>
    <button class="back" onclick="document.location.href='student_entry_display.php'";>
        BACK
    </button>
    <center>
        <table class="table1">
            <tr>
                <th>Student's Id</th>
                <th>Student's Name</th>
                <th>Father's Name</th>
                <th>Department</th>
                <th>Phone number</th>
                <th>Gender</th>
                <th>Age</th>
                <th>Date of Birth</th>
                <th>Email ID</th>
                <th>Room id</th>
                <th>Food type</th>
                <th>Build no.</th>
                <th>Room Type</th>
                <th>Fees</th>
                <th>Edit</th>
            </tr>

<?php
    include 'config.php';
    $s = $_POST['sname'];
    $query = "SELECT * FROM `student_entry` WHERE s_name LIKE '".$s."%' OR s_name LIKE '%".$s."%' OR s_name LIKE '".$s."%' OR sid LIKE '".$s."%' OR sid LIKE '%".$s."%' OR sid LIKE '%".$s."' OR father_name LIKE '%".$s."' OR father_name LIKE '%".$s."%' OR father_name LIKE '".$s."%' ";
    $results = mysqli_query($conn,$query);
    while($row = mysqli_fetch_array($results)){
        $i=0;
?>
<tr>
    <td><label><?php echo $row['sid']; ?></label></td>
    <td><label><?php echo $row['s_name']; ?></label></td>
    <td><label><?php echo $row['father_name']; ?></label></td>
    <td><label><?php echo $row['department']; ?></label></td>
    <td><label><?php echo $row['ph_no']; ?></label></td>
    <td><label><?php echo $row['gender']; ?></label></td>
    <td><label><?php echo $row['age']; ?></label></td>
    <td><label><?php echo $row['DOB']; ?></label></td>
    <td><label><?php echo $row['email']; ?></label></td>
    <td><label><?php echo $row['Room_id']; ?></label></td>
    <td><label><?php echo $row['food_type']; ?></label></td>
    <td><label><?php echo $row['Build_no']; ?></label></td>
    <td><label><?php echo $row['room_type']; ?></label></td>
    <td><label><?php echo $row['fee']; ?></label></td>
    <td>
        <a class="update" href="update_student.php?sid=<?php echo $row["sid"]; ?>">Update</a>
        <a class="delete" href="delete_student.php?sid=<?php echo $row["sid"]; ?>">Delete</a>
    </td>
</tr>
<?php $i++; } ?>
</table>
</center>
</body>
</html>
?>