<?php
    //login.php
$host = "localhost";
$user = "root";
$passwd = "";
$dbname = "user";

session_start();
switch (@$_POST['Button'])
{
    case "Log in":
        include("dogs.inc");
        $cxn = mysqli_connect($host, $user, $passwd, $dbname)
            or die("Query died: connect");
        $sql = "SELECT loginName FROM member
                WHERE loginName ='$_POST[fusername]'";
        $result = mysqli_query($cxn, $sql)
                or die("Query died: fusername");
        $num = mysqli_num_rows($result);
        if($num>0) // login name was found
        {
            $sql = "SELECT loginName FROM member
                    WHERE loginName='$_POST[fusername]'
                    AND password=md5('$_POST[fpassword]')";
            $result2 = mysqli_query($cxn, $sql)
                        or die("Query died: fpassword");
            $num2 = mysqli_num_rows($result2);
            if($num2>0) //password matches
            {
                $_SESSION['auth']="yes";
                $_SESSION['logname']=$_POST['fusername'];
                $sql = "INSERT INTO Login (loginName, loginTime)
                        VALUES ('$_SESSION[logname]', NOW())";
                $result = mysqli_query($cxn, $sql)
                        or die("Query died: insert");
                header("Location: SecretPage.php");
            }
            else //Password does not match
            {   
                $message_1="The Login Name, '$_POST[fusername]'
                            exists, but you have not entered the correct password.";
                $fusername=strip_tags(trim($_POST['fusername']));
                include("login_form.inc");
            }
        }
    break;

    case "Register":
    // check for blanks
        foreach($_POST as $field => $value)
        {
                if(empty($value))
                {
                    $blancks[] = $field;
                }
                else
                {
                    $good_data[$field] = strip_tags(trim($value));
                }
                 
        }
        if(isset($blanks))
        {
            $message_2 = "The follwoing fields are blank.
                            Please enter the required information: ";
            foreach($blanks as $value)
            {
                $message_2 .="$value, ";
            }
            extract($good_data);
            include("login_form.inc");
            exit();
        }
        //validate data
        foreach($_POST as $field =>$value)
        {
            if(!empty($value))
            {
                if(preg_match("/name/i", $field) and
                !preg_match("/user/i", $field) and
                !preg_match("/log/i", $field))
                {
                    if(!preg_match("/^[A-Za-z' -]{1,50}$/",$value))
                    {
                        $errors[] = "$value is not a valid name. ";
                    }
                }
                if(preg_match("/email/i", $field))
                {
                    if(!preg_match("/^.+@.+\\..+$/", $value))
                    {
                        $errors[] = "$value is not a valid email addr.";
                    }
                }
            } // end if not empty
        }
        foreach($_POST as $field => $value)
        {
            $$field = strip_tags(trim($value));
        }
        if(@is_array($errors))
        {
            $message_2 = "";
            foreach($errors as $value)
            {
                $message_2 .= $value." Please try again<br />";
            }
            include("login_form.inc");
            exit();
        }// end if errors are found

    //check to see if username already exists
    include("dogs.inc");
    $cxn = mysqli_connect($host, $user, $passwd, $dbname)
        or die("Couldn't connect to server");
    $sql = "SELECT loginName FROM member
            WHERE loginName='$loginName'";
    $result = mysqli_query($cxn, $sql)
        or die("Query died: loginName.");
    $num = mysqli_num_rows($result);
    if($num>0)
    {
        $message_2 = "$loginName already used. Select another user name.";
        include("login_form.inc");
        exit();
    }// end if user name already exists.
    else //add new member to database.
    {
        $sql = "INSERT INTO member (loginName, createDate,
                password, firstName, lastName, email) Values
                ('$loginName', NOW(), md5('$password'),
                '$firstName', '$lastName', '$email')";
        mysqli_query($cxn, $sql);
        $_Session['auth'] = "yes";
        $_SESSION['logname'] = $loginName;
        //send email to new customer
        $emess = "You have successfully registerd.";
        $subj = " Your new customer registration.";
        # $mailsend = mail("$email", "$subj", "$emess");
        header("Location: SecretPage.php");
    }
    break;

    default:
        include("login_form.inc");
}
?>