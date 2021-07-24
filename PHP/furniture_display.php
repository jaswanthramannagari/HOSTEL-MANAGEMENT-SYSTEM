<!DOCTYPE html>
<html>
    <head>
        <title>Furniture  Display</title>
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
    <button class="back" onclick="document.location.href='furniture.html'";>
        BACK
    </button>
    <br><br>
    <table class="table1">
            <tr>
                <th>Furniture Type </th>
                <th>Furniture ID</th>
                <th>Room ID</th>
                <th>Edit</th>
            </tr>
    <?php
        $database = mysqli_connect('localhost','root','','hostel');
        if($database){
            $query = "SELECT * FROM hostel_furniture";
            $results = mysqli_query($database,$query);
            while($row = mysqli_fetch_array($results)){
    ?>
            <tr>
                <td><label><?php echo $row['furniture_type']; ?></label></td>
                <td><label><?php echo $row['furniture_id']; ?></label></td>
                <td><label><?php echo $row['Room_id']; ?></label></td>
                <td>
                    <a class="update" href="update_furn.php?furn_id=<?php echo $row["furniture_id"]; ?>">Update</a>
                    <a class="delete" href="delete_furn.php?furn_id=<?php echo $row["furniture_id"]; ?>">Delete</a>
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