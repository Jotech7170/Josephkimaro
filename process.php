<?php
$con=mysqli_connect('localhost','root','','contact_message');
if(!$con){
    echo "Connection error!";
}
else{
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $message = $_POST['message'];
        
        $sql = "INSERT INTO messages(name,email,phone,message) VALUES('$name','$email','$phone','$message')";
        
        $result = mysqli_query($con,$sql);

        if ($result) {
            echo"registered successfully";
        }
        else{
            echo"unsuccessful! registration";
        }
    }
}

    $to = "joseph.kimaro2000@gmail.com";
    $from = $_REQUEST['email'];
    $name = $_REQUEST['name'];
    $headers = "From: $from";
    $subject = "You have a message.";

    $fields = array();
    $fields{"name"} = "name";
    $fields{"email"} = "email";
    $fields{"phone"} = "phone";
    $fields{"message"} = "message";

    

    $body = "Here is what was sent:\r\n"; 

    foreach($fields as $a => $b){$body .= $b." : ".$_REQUEST[$a]."\r\n"; }


    $send = mail($to, $subject, $body, $headers);

?>