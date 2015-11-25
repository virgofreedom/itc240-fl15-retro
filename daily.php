<?php
//daily.php
?>
<?php include 'includes/config.php';?>


<?php
if(isset($_GET['myDay']))
{
    $myDay = $_GET['myDay'];
}else{
    $myDay = date('l');    
}

switch($myDay)
{
    case 'Monday';
        $myPic = 'pumpkin-spice-latte.jpg';
        break;
    case 'Tuesday';
        $myPic = 'breakfast2.jpg';
        break;
    case 'Wednesday';
        $myPic = 'burger.jpg';
        break;
    case 'Thursday';
        $myPic = 'iced-coffee.jpg';
        break;
    case 'Friday';
        $myPic = 'hotdog.jpg';
        break;
    case 'Saturday';
        $myPic = 'shake.jpg';
        break;
    case 'Saturday';
        $myPic = 'shake.jpg';
        break;
    default:
        $myPic = 'burger-specials.png';
        break;
}

?>
<?php include 'includes/header.php';?>
                    <!--header ends here -->
            <h1><?=$pageID?></h1>
	    <img src="images/<?=$myPic?>" alt="Our Pumpkin Spice Latte tastes great on a Fall Day!" id="coffee" />
            <strong class="feature"><?=$myDay?>'s Coffee Special:</strong> <?=$myDay?>'s daily coffee special is <strong class="feature">Pumpkin Spice Latte</strong>, which makes us wish it was always Fall, as this is one of our top sellers!</p>
        <p><span class="feature">Pumpkin Spice is </span> Gluten-free selfies normcore chillwave. Listicle 90's chambray, seitan cold-pressed try-hard Etsy authentic flexitarian vinyl. Meditation bespoke freegan, single-origin coffee cred seitan 90's gentrify brunch Williamsburg squid cold-pressed. Brooklyn readymade Tumblr wayfarers ethical.</p>
        <p><a href="daily.php?myDay=Sunday">Sunday</a></p>
        <p><a href="daily.php?myDay=Monday">Monday</a></p>
        <p><a href="daily.php?myDay=Tuesday">Tuesday</a></p>
        <p><a href="daily.php?myDay=Wednesday">Wednesday</a></p>
        <p><a href="daily.php?myDay=Thursday">Thursday</a></p>
        <p><a href="daily.php?myDay=Friday">Friday</a></p>
        <p><a href="daily.php?myDay=Saturday">Saturday</a></p>
<?php include 'includes/footer.php'?>