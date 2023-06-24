<?php
// session start if to link this file's direct info and lines with other files with the command
session_start();
// to connect with the data base
include 'databaseConn.php';
// requets data from the registration form
if (isset($_POST['regBtn'])){

    $firstname = mysqli_real_escape_string($db, $_POST['firstname']);

    $lastname = mysqli_real_escape_string($db, $_POST['lastname']);

    $email = mysqli_real_escape_string($db, $_POST['email']);

    $password = (md5($_POST['password']));//encryption

    $password_1 = (md5($_POST['password_1']));//encryption

    //process Verification Key creation
    $vKey = md5($email.time().$firstname);
    
    if ($password != $password_1) {
        header('location:register.php?signup=Passwords');
        exit();                   
    }else{
        // check data from database table named registration for a specific email id which should be the only one
        $user_check_query = "SELECT * FROM dbTableName WHERE email = '$email' LIMIT 1 ";

        $result =mysqli_query($db, $user_check_query);
        
        $user = mysqli_fetch_assoc($result); 

        if(empty($user['email'])){
            $query = "INSERT INTO dbTableName (firstName, lastName, email, pass_word, vKey, regDate) VALUES('$firstname', '$lastname', '$email', '$password', '$vKey', NOW())";
            if($run_insert = mysqli_query($db, $query)) {
// sending a verification email to user with their unique verification key
                $subject = "Email Verification.";
                $headers = "From: The organisation name<theOfficialDomainEmail>\r\n";
                $headers .="MIME-Version: 1.0\r\n";
                $headers .="Content-Type: text/html; charset-ISO-8859-1\r\n";
                
                $name = $firstname;//will refer to the receiver by the first name, this is gotten from the database. It is not Mandatory
                $verKey = "url link to the Verify?vkey=$vKey";
                //these will connect the logic of sending the email with the passMailTamp.php file, html and css, that will be seen by receiver
                ob_start();
                include 'emailTamplate.php';
                $message = ob_get_contents();
                ob_get_clean();
                
                $mail_sent = mail($email, $subject, $message, $headers);
                if($mail_sent){
                    //response if email is sent successfully
                    header('location: Register?signup=verification');
                }else{
                    //response if email is not sent
                    header('location:Register?signup=failedMail');
                }
            }else{
                header('location: Register?signup=error');
            } 
        }else{ 
            //echo "This email id has already regitered.";
            header('location:Register?signup=Email');
            exit();
        }        
    }
}


?>
