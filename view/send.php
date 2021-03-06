<?php
if($_POST){
  $firstname = htmlspecialchars($_POST['firstname']);
  $email = htmlspecialchars($_POST['email']);
  $name = htmlspecialchars($_POST['name']);
  $message = htmlspecialchars($_POST['message']);
  $subject= htmlspecialchars($_POST['subject']);
  $headers = "MIME-Version: 1.0\r\n";
  $headers .= "From: $name "." $firstname <$email>\r\nReply-to : $name <$email>\nX-Mailer:PHP";
  $headers .= "Content-type: text/plain; charset='iso-8859-1'\r\n";
  $headers .= 'Content-Transfert-Encoding: 8bit';
  $destinataire="contact@jean-pauldev.fr";
  $body="L'utilisateur du mail " . $email . " vous a envoyé ce message : " . $message;
  $request = mail($destinataire,$subject,$body,$headers);

  
  
  if( $request ) {
    $response['status'] = 'success';
    $response['msg'] = 'your mail is sent';
    header("Location: ../view/contact.php");
  } else {
    $response['status'] = 'error';
    $response['msg'] = 'something went wrong';
    header("Location: ../view/index.php");
  }
  // echo $response['msg'];
  
}