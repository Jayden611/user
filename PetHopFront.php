<?php
    // Program: MainFront.php
?>
<html>
<head>
<title>Home Front Page</title>
<style type="text/css">
    <!--
        #banner {text-align: center;}
        #main {text-align: center; position: relative;}
        .first {padding-top: 3em;}
        #rightcol {background-color: black; color: white;
        link: white; position: absolute; top: 0;
        right: 0; width: 18%;}
        #rightcol ul {text-align: left;}
        #last {padding-bottom: 3em;};
    --> 
</style>
</head>
<body>
<div id="banner">
    <img src="images/awning-top.gif" alt="awning" />
    <img src="images/Name.gif" alt="Store" />
</div>
<div id="main">
    <p class="first">
    <img src="images/lizard-front.jpg"
            alt="lizard picture"
            height="186" width="280" /></p>
    <h2>Looking for a new friend?</h2>
    <p>Check out our 
    <a href="petCatalog.php">Pet Catalog.</a>
    <br/> We may have just what you're looking for.</p>

    <div id="rightcol">
            <p class="first">
            <b>Looking for <br />more?</br></p>
            <ul>
                <li>special deals?</li>
                <li>pet information?</li>
                <li>good conversation?</li>
            </ul>
            <p>Try the
                <br/><a href="login.php"
                    style="color: white">Members Only</a>
                <br/>section<br/>of our store</></p>
            <p id="last"><b>It's free!</b></p>
        </div>
    </div>
    </body>
</html>