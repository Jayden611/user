<?php
    //file: login_form.inc

$fields_1 = array("fusername" => "User Name",
                    "fpassword" => "Password");
$fields_2 = array("loginName" => "User Name",
                    "password" => "Password",
                    "email" => "Email",
                    "firstName" => "First name",
                    "lastName" => "Last Name"
                    );
?>
<html><head>
<title>Customer Login Page</title>
<style type='text/css'>
    <!--
        label {font-weight: bold; float: left; width: 27%;
        margin-right: .5em; text-align: right;}
        fieldset{border: 2px solid #000000}
        legend{font-weight: bold; font-size: 1.5em;
                margin-bottom: .5em;}
        h3{text-align: center; margin: 2em;}
        #wrapper{margin: 0; padding: 0;}
        #login{position: absolute; left: 0; width: 40%;
        padding: 1em 0;}
        #reg {position: absolute; left: 40%; width: 60%;
                padding: 1em 0;}
        #field {padding-bottom: .5em;}
        .errors {font-weight: bold; font-style: italic;
        font-size: 90%; color: red; margin-top: 0;}
    -->
</style>
</head>
<body style="margin: 0">
<div id="wrapper">
    <div id="login">
        <form action="<?php echo $_SERVER['PHP_SELF']?>"
        method="post">
        <fieldset><legend>Login Form</legend>
    <?php
        if(isset($message_1))
        {
            echo "<p class='errors'>$message_1</p>\n";
        }
        foreach($fields_1 as $field => $value)
        {
            if(preg_match("/pass/i", $field))
                $type = "password";
            else
                $type = "text";
            echo "<div id='field'>
                    <label for='$field'>$value</label>
                        <input id='$field' name='$field'
                            type='$type' value='".@$$field."'
                            size='20' maxlength='50' /></div>\n";
        }
    ?>
    <input type="submit" name="Button"
            style='margin-left: 45%; margin-bottom: .5em'
            value="Log in"/>
    </fieldset>
    </from>
    <h3>IF you already have an account, log in.</h3>
    <h3>If you do not have an account, register now.</h3>
    </div>

    <div id="reg">
        <form action="<?php echo $_SERVER['PHP_SELF']?>"
                method="post">
        <fieldset><legend>Registration Form</legend>
    <?php
        if(isset($message_2))
        {
            echo "<p class='errors'>$message_2</p>\n";
        }
        foreach($fields_2 as $field => $value)
        {
            if(preg_match("/pass/i", $field))
                $type = "password";
            else
            {
                $type = "text";
            }// end else 
            echo "<div id='field'>
                    <label for='$field'>$value</label>
                    <input id='$field' name='$field'
                        type='$type' value='".@$$field."'
                        size='40' maxlength='65' /></div>\n";
               
        }// end foreach field
    ?>
    <input type="submit" name="Button"
            style='margin-left: 45%; margin-bottom: .5em'
            value="Register" />
    </fieldset>
    </form>
    </div>
</div></body></html>