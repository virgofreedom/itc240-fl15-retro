<?php
//Customers_view.php - shows details of a single customer
?>
<?php include 'includes/config.php';?>
<?php

//process query string here
if(isset($_GET['id']))
{//process data
    //Cast the data to an integer, for security pruposes
    $id = (int)$_GET['id'];
}else{//
    header('Location:customers_list.php');
}
$sql = "select * from test_Customers where CustomerID=$id";

//We connect to the db here
$iConn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

//We extract the data here
$result = mysqli_query($iConn,$sql);

if(mysqli_num_rows($result) > 0)
{//show records
    
    while ($row = mysqli_fetch_assoc($result))
        {
            $FirstName = stripcslashes($row['FirstName']);
            $LastName = stripcslashes($row['LastName']);
            $Email = stripcslashes($row['Email']);
            $title = "Title Page for ". $FirstName;
            $pageID = $FirstName;
            $Feedback = '';//no feedback necessary
        }
    
    
    
}else{//ifrom there are no records
    $Feedback = '<p>This customer does not exitst</p>';
}

?>
<?php include 'includes/header.php';?>
                    <!--header ends here -->
<h1><?=$pageID?></h1>
<?php

if($Feddback == '')
{//data exists,show it
    
echo '<p>';
echo 'FirstName: <b>'. $FirstName . '</b>';
echo ' LastName: <b>'. $LastName . '</b>';
echo ' Email: <b>'. $Email . '</b>';

//echo '<a href="customer_view.php?id='. $row['CustomerID'] . '">'. $row['FirstName'] . '</a>';

echo '</p>';
}else{//warn user no data
    echo $Feddback;
}

 echo '<p><a href="customers_list.php">Go Back</a></p>';           
//release web serrver resource
@mysqli_free_result($result);

//close connection to mysql
@mysqli_close($iConn);
?>
<?php include 'includes/footer.php'?>