
<?php
//contact php
  $name = htmlspecialchars($_POST['name']);
  $email = htmlspecialchars($_POST['email']);
  $phone = htmlspecialchars($_POST['phone']);
  $website = htmlspecialchars($_POST['website']);
  $message = htmlspecialchars($_POST['message']);

  if(!empty($email) && !empty($message)){  //if email and message field is not empty
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){ //if user entered email is valid
      $receiver = "divineatansi123@gmail.com"; //enter that email address where you want to receive all messages
      $subject = "From: $name <$email>"; //subject of the email. subject looks like form: divine <abc@gmail.com>

      //merging concating all user values inside body variable. \n is used for new line
      $body = "Name: $name\nEmail: $email\nPhone: $phone\nWebsite: $website\n\nMessage:\n$message\n\nRegards,\n$name";
      $sender = "From: $email"; //sender email
      if(mail($receiver, $subject, $body, $sender)){ //mail() is a inbuilt php function to send email
         echo "Your message has been sent";
      }else{
         echo "Sorry, failed to send your message!";
      }
    }else{
      echo "Enter a valid email address!";
    }
  }else{
    echo "Name, Email and message field is required!";
  }
?>