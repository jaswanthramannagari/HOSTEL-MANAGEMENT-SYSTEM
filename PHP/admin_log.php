<!DOCTYPE html>
<html>
    <head>
        <title>Admin login</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body style="background-image : url('clg01.jpg'); background-repeat: no-repeat; ">
        <table style="width: 100%; height: auto; text-align: center; color: rgb(255, 255, 255);">
            <tr>
                <td class="logo" ><img src="download.jfif"></td>
                <td ><h1 style="font-size: 30px;">COLLEGE OF ENGINEERING - GUINDY</h1><h4>Anna University, Chennai</h4></td>
                <td class="logo" ><img src="CEGlogo.jpg"></td>
            </tr>
        </table><br><br>
        <br><br>
        <button class="back" onclick="document.location.href='main.html'";>
            BACK
        </button>
        <br><br>
    
            <center>
               
                <form method = "POST" >
                    <table class="form_table">
                        <tr>
                            <td><label for="adm">Admin name</label></td>
                            <td><input type="text"  id="adm" name = "adm" /></td>
                        </tr>
                        <tr>
                            <td><label for="pwd">Password</label></td>
                            <td><input type="password"  id="pwd" name = "pwd" /></td>
                        </tr>
                    </table>
                    <button class="mbutton" name="signin">Sign in</button>
            </center>
            <?php
            if(isset($_POST['signin'])){
                    $adm = $_POST['adm'];
                    $pwd = $_POST['pwd'];
                
                if( $adm == 'admin' && $pwd == 'ceg123'){
                    echo '<script type="text/javascript"> alert("Login successfull!")</script>';
                    header('Location: admin.html');
                }
                else{
                    echo '<script type="text/javascript"> alert("Admin Error!")</script>';
            }
            }
    ?>
    </body>
</html>