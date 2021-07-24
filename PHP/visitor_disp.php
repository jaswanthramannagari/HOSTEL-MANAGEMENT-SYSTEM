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
    <button class="back" onclick="document.location.href='admin.html'";>
        BACK
    </button>
    <br><br>
    <table class="table1">
            <tr>
                <th>Visitor Name</th>
                <th>Student Name</th>
                <th>Student ID</th>
                <th>>Visitor Date</th>
                <th>Time in</th>
                <th>Time out</th>
                <th>Edit</th>
            </tr>
    <?php
        $database = mysqli_connect('localhost','root','','hostel');
        if($database){
            $query = "SELECT * FROM visitor";
            $results = mysqli_query($database,$query);
            while($row = mysqli_fetch_array($results)){
    ?>
        <tr>
            <td><label><?php echo $row['v_name']; ?></label></td>
            <td><label><?php echo $row['s_name']; ?></label></td>
            <td><label><?php echo $row['sid']; ?></label></td>
            <td><label><?php echo $row['v_date']; ?></label></td>
            <td><label><?php echo $row['time_in']; ?></label></td>
            <td><label><?php echo $row['time_out']; ?></label></td>
            <td>
                <a class="update" href="update_visitor.php?vis_name=<?php echo $row["v_name"]; ?>">Update</a>
                <a class="delete" href="delete_visitor.php?vis_name=<?php echo $row["v_name"]; ?>">Delete</a>
            </td>
        </tr>
<?php
        }
    }

    else{
        echo "Not Connected";
    }
?>
</table>
</center>
</body>
</html>