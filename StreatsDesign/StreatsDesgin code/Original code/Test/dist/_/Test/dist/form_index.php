<?php

if (!empty($_POST['Naam']) && !empty($_POST['Email']) && !empty($_POST['Bericht'])) {

  $grafischeWerk = 'Niets Geselecteerd';
if (isset($_POST['grafischeWerk'])){
  $grafischeWerk = implode(' , ' , $_POST['grafischeWerk']);
}
  $header = 'From: Info@streatsdesign.com';
  $name = $_POST['Naam'];
  $email = $_POST['Email'];
  $message = $_POST['Bericht'];
  $formcontent="From: $name  \n  Message: $message \n  keuzen: $grafischeWerk \n  Email: $email";
  $recipient = "info@streatsdesign.com" "streatsdesign@outlook.com" "$email";
  $subject = "Contact Streatsdesign";
  $mailheader = "Streatsdesign Order Form: $email \r\n";

  mail($recipient, $subject, $formcontent, $mailheader, $header) or die("Oops er ging iets fout!");

  echo "Bedankt! Wij zullen snel contact met u opnemen" 
} else {
  echo "Een van de volgende invoer velden: Naam, Email, Bericht of keuze Is niet ingevuld!";
  
}


?>

