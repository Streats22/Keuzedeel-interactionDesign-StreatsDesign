<?php

if (!empty($_POST['Naam']) && !empty($_POST['Email']) && !empty($_POST['Bericht']) && !empty($_POST['Straat']) && !empty($_POST['Land']) && !empty($_POST['Stad']) && !empty($_POST['Postcode'])) {

  $grafischeWerk = 'Niets Geselecteerd';
if (isset($_POST['grafischeWerk'])){
    $grafischeWerk = implode(' , ' , $_POST['grafischeWerk']);
  }
  $subject='Contact Streatsdesign';
  $name = $_POST['Naam'];
  $email = $_POST['Email'];
  $straat= $_POST['Straat'];
  $land= $_POST['Land'];
  $postcode= $_POST['Postcode'];
  $stad= $_POST['Stad'];
  $message = $_POST['Bericht'];
  $formcontent="From: $name \n Straat: $straat \n  Stad: $stad \n  Land: $land \n  postcode: $postcode \n  Message: $message \n  keuzen: $grafischeWerk \n  Email: $email";
  $recipient = "$email";
  $subject = "Contact Streatsdesign";
  $mailheader = "from:info@streatsdesign.com \r\n";
  $mailheader .= "Bcc:streatsdesign@outlook.com, info@streatsdesign.com \r\n";

  mail($recipient, $subject, $formcontent, $mailheader) or die("Oops er ging iets fout!");

  echo "Bedankt! Wij zullen snel contact met u opnemen"; 
} else {
  echo "Eén van de volgende invoer velden: Naam, Email, Bericht of adress. Is niet ingevuld!";
}

?>