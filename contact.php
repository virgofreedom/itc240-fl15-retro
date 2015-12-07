<?php
//daily.php
?>
<?php include 'includes/config.php';?>

<?php include 'includes/header.php';?>
                    <!--header ends here -->
            <h1><?=$pageID?></h1>
	<?php
    if(isset($_POST['Submit']))
        {//if data, process it!
            /*
            echo '<pre>';
            var_dump($_POST);
            echo '</pre>';*/
            $to = 'rneak001@seattlecentral.edu';
            $message = process_post();
            $subject = 'Contact Form from retro site';
            safeEmail($to, $subject, $message);
            
                //connect to the database in order to add contact data
    $iConn = @mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die(myerror(__FILE__,__LINE__,mysqli_connect_error()));

    //process each post var, adding slashes, using mysqli_real_escape(), etc.
    $Name = dbIn($_POST['Name'],$iConn);
    $DoB = dbIn($_POST['DoB'],$iConn);
    $Phone = dbIn($_POST['Phone'],$iConn);
    $Email = dbIn($_POST['Email'],$iConn);
    $Comments = dbIn($_POST['Comments'],$iConn);

    //place question marks in place of each item to be inserted
    $sql = "INSERT INTO test_Contacts (Name,DoB,Phone,Email,Comments,DateAdded) VALUES(?,?,?,?,?,NOW())";
    $stmt = @mysqli_prepare($iConn,$sql) or die(myerror(__FILE__,__LINE__,mysqli_error($iConn)));
    
    /*
     * second parameter of the mysqli_stmt_bind_param below 
     * identifies each data type inserted: 
     *
     * i == integer
     * d == double (floating point)
     * s == string
     * b == blob (file/image)
     *
     *example: an integer, 2 strings, then a double would be: "issd"
     */

    mysqli_stmt_bind_param($stmt, 'sssss',$Name,$DoB,$Phone,$Email,$Comments);

    //execute sql command
    mysqli_stmt_execute($stmt) or die();
    
    //close statement
    @mysqli_stmt_close($stmt);
    
    //close connection
    @mysqli_close($iConn);
            
            
            
            
            
            
            echo '
            <p>Thank you for the info!</p>
            ';
        }else{//no data, show form
            echo '
            <form method="POST" action="">
            Name: <input type="text" name="Name" required="required" /><br/>
            Date of Birth: <input type="date" name="DoB" required="required" /><br/>
            Phone: <input type="text" name="Phone" required="required" /><br/>
            Email: <input type="email" name="Email" required="required" /><br/>
            Comments: <br/><textarea name="Comments"></textarea><br/>
            <input type="submit" value="Send" name="Submit" />
            </form>
            
            
            ';
        }
    ?>
<?php include 'includes/footer.php'?>
