
<?php
    $conn = new mysqli('localhost', 'root', '');
    mysqli_select_db($conn, 'hostel');
    $sql = "SELECT * FROM student_entry";
    $setRec = mysqli_query($conn, $sql);
    $columnHeader ='';
    $columnHeader = "Student's Name"."\t"."Student's id"."\t"."Father's name"."\t"."Department"."\t"."Phone no."."\t"."Gender"."\t"."Age"."\t"."Date of Birth"."\t"."Email ID"."\t"."Room ID"."\t"."Food Status"."\t"."Build No."."\t"."Room type"."\t"."Fees"."\t";
    $setData = '';  
    while ($rec = mysqli_fetch_row($setRec)) {  
        $rowData = '';  
        foreach ($rec as $value) {  
            $value = '"' . $value . '"' . "\t";  
            $rowData .= $value;  
        }  
    $setData .= trim($rowData) . "\n";  
    } 
    header("Content-type: application/octet-stream");  
    header("Content-Disposition: attachment; filename=User_Detail.xls");  
    header("Pragma: no-cache");  
    header("Expires: 0");
    echo ucwords($columnHeader) . "\n" . $setData . "\n";  
 ?> 