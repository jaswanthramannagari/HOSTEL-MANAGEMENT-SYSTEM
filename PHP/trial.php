<?php
  if(count($_POST) > 0){
    include 'config.php';

  $sql = "CALL rooms('".$_POST['name'] ."')";
  $results = mysqli_query($conn, $sql);
  while(($row = oci_fetch_array($results, OCI_ASSOC+OCI_RETURN_NULLS)) != false){
    echo $row['c_rid'];
    echo $row['c_fno'];
    echo $row['c_cap'];
    echo $row['c_bno'];
    }
  }
?>
<html>
  <body>
    <form method="POST" action = "">
      <input type="text" name="name"/>
      <button name = "submit">GO</button>
    </form>
  </body>
</html>