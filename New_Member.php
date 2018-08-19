<?php
    //Program: New_Member.php

    session_start();

    if(@$_SESSION['auth'] != "yes")
    {
        header("Location: login.php");
        exit();
    }

    include("dogs.inc");
    $cxn = mysqli_connect($host, $user, $passwd, $dbname)
        or die("Couldn't connect to server.");
    $sql = "SELECT firstName, lastName FROM Member 
    WHERE loginName='{$_SESSION['logname']}'";
    $result = mysqli_query($cxn, $sql)
        or die("Couldn't execute query");
    $row = mysqli_fetch_assoc($result);
    extract($row);
    echo "<html>
            <head><title>New Member Welcome</title></head>
            <body>
            <h2 style='margom-top: .7in; text-align: center'>
            Welcome $firstName $lastName</h2>\n";
?>

<p>Your new member ID and password were emailed to you.</p>
<div style="text-align: center">
<p style="margin-top: .5in; font-weight: bold">
<form action="member_page.php" method="post">
    <input type="submit"
        value="Enter the members only section">
</form>
<form action="petHopFront.php" method="post">
    <input type="submit" value="Go to Pet Store main page">
</form>
</div>
</body></html>
