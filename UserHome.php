<html>
    <body>
        <h1 align="center">HOME</h1>
<?php
// Print a cookie
$UseridfromCookie=$_COOKIE["UserIDcookie"];
echo $_COOKIE["UserIDcookie"];

// A way to view all cookies
//print_r($_COOKIE);
?> 
        <form id="UserHomeFormID" name="UserHomeForm" method="post" action="UrlsDetailsToDB.php">
            <div align="center">
                <table width="564" border="0" align="center" cellpadding="5" cellspacing="5">
                    <tr>
                        <td><div align="right">URL :</div></td>
                        <td><div align="left">

                                <input type="text" name="urlLink" id="urlLink">
                            </div></td>
                    </tr>
                    <tr>
                        <td colspan="2"><div align="center">
                                <input type="submit" name="submit" id="submit" value="Submit">
                            </div>
                            <div align="left"></div></td>
                    </tr>
                </table>
                <p>&nbsp;</p>
        </form>
        <p>&nbsp;</p>
        <div align="center"></div>

        <h2 align="center">Saved Urls</h2>
        <?php
            $con=mysqli_connect("localhost","root","","urls");
            // Check connection
            if (mysqli_connect_errno()) {
              echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }
            $urlsList=mysqli_query($con,"SELECT Url,TimeStamp FROM urldetails where userID='".$UseridfromCookie."'");
            while($row = mysqli_fetch_array($urlsList)){
                echo $row[0];
                echo $row[1];
                echo "<br />\n";
            }
        ?>
    </body>
</html>