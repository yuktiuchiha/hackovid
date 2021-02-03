<?php
include"connection.php";
  include"navbar.php";
require "phpmailer/PHPMailerAutoload.php";

    $mail=new PHPMailer;
    $mail->isSMTP();                                           
    $mail->Host       = 'smtp.gmail.com';                    
    $mail->SMTPAuth   = true;                                  
    $mail->Username   = 'yukti.btech.ec18@iiitranchi.ac.in';   
    $mail->Password   = 'uzumaki102';                          
    $mail->SMTPSecure = 'tls';        
    $mail->Port       = 587;              
?>                      
<!DOCTYPE html>
<html>
<head>
    <title>create e-mail</title>
    <style type="text/css">
        body
        {
            width: 100%;
            height: 650px;
            background-color: coral;
        }
        .mail
        {
            width: 60%;
            height: 80%;
            background-color: lightblue;
            box-shadow: 2px 8px 16px black;        
            opacity: .8;
            color: black;
            margin-bottom: 40px;    
        }
        input
        {
            border-radius: 2px;

        }
    </style>
</head>
<body><center>
 <br><br>   <div class="mail">
        <br><h1><u>Create your E-mail</u></h1>
        <br>
        <form  name="form1" action="" method="post">
        <input style="width: 250px;" type="text" class="form-control" name="subject" placeholder="SUBJECT" required=""><br>
        <input style="width: 250px;" type="file" class="form-control" name="file" placeholder="Attach file if any.."><br>
        <input style="width: 250px;" type="text" class="form-control" name="date" placeholder="YYYY/MM/DD" required=""><br>
        <textarea style="width: 250px;" rows="4" cols="50" class="form-control" placeholder="Write your message..." name="content"></textarea><br>
        <button class="btn btn-default" type="submit" name="submit"> SEND </button><br><br>
        </form>
</div></center>

<?php 

if(isset($_POST['submit'])) 
{
    mysqli_query($db,"INSERT INTO `emails.` VALUES('$_POST[date]', '$_SESSION[login_user]', '$_POST[subject]','$_POST[file]','$_POST[content]') ;");

    $mail->setFrom("yukti.btech.ec18@iiitranchi.ac.in");//FROM
   
     
    $sql="SELECT * from `register` where status='student' ";
    $res=mysqli_query($db,$sql);
    if(mysqli_num_rows($res)>0)
    {
        
        while($x=mysqli_fetch_assoc($res))
        {
            $mail->addBCC("$x[email]");
        
        
        $mail->isHTML(true);  
        $mail->Subject = $_POST['subject'];
        $mail->addAttachment("$_POST[file]");    
        $mail->Body    = $_POST['content'];
    
                if($mail->send())
                {
                    ?>
                    <script type="text/javascript">
                        alert("Mail sent Successfully.");
                    </script>
          
            <?php   
                } 
                else
                {
                        ?>
                    <script type="text/javascript">
                        alert("Unsuccessful attempt!!!!");
                    </script>
                }
        }
    <?php
    }}}
    else
    {
        echo "No student registered!!!";
    }
}
?>
    
</body>
</html>



