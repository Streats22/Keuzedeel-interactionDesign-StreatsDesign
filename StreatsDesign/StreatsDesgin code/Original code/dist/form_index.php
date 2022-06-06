<?php

if (!empty($_POST['Naam']) && !empty($_POST['Email']) && !empty($_POST['Bericht'])) {

  $grafischeWerk = 'Niets Geselecteerd';
if (isset($_POST['grafischeWerk'])){
  $grafischeWerk = implode(' , ' , $_POST['grafischeWerk']);
}
  $subject='Contact Streatsdesign';
  $name = $_POST['Naam'];
  $email = $_POST['Email'];
  $message = $_POST['Bericht'];
  $formcontent= " Email: $email  \n  From: $name  \n  Message: $message \n  keuzen: $grafischeWerk ";
  $recipient = "$email";
  $mailheader = "from:info@streatsdesign.com \r\n";
  $mailheader .= "Bcc:streatsdesign@outlook.com, info@streatsdesign.com \r\n";
  $header = ('Refresh: 5; URL=streatsdesign.com/index.html');
  mail($recipient, $subject, $formcontent, $mailheader) or die("Oops er ging iets fout!");

  echo "Bedankt! Wij zullen snel contact met u opnemen"; 
} else {
  echo "Een van de volgende invoer velden: Naam, Email, Bericht of keuze Is niet ingevuld!";
  
}


?>

