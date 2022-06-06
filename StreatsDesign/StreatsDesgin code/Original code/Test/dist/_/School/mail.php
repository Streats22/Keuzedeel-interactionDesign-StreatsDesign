<?php

if (!empty($_POST['Naam']) && !empty($_POST['Email']) && !empty($_POST['Bericht']) && !empty($_POST['Adress'])) {

  $grafischeWerk = 'Niets Geselecteerd';
if (isset($_POST['Grafische werk of '])){
  $languages = implode('u heeft een aanvraag gedaan naar', $_POST['language']);
}
  $name = $_POST['Naam'];
  $email = $_POST['Email'];
  $adress= $_POST['Adress'];
  $message = $_POST['Bericht'];
  $formcontent="From: $name \n Message: $message Adress: $adress Email: $email";
  $recipient = "info@streatsdesign.com";
  $subject = "Contact Streatsdesign";
  $mailheader = "From Streatsdesign: $email \r\n";

  mail($recipient, $subject, $formcontent, $mailheader) or die("Oops er ging iets fout!");

  echo "Bedankt! Wij zullen snel contact met u opnemen";
} else {
  echo "Eén van de volgende invoer velden: Naam, Email, Bericht of adress. Is niet ingevuld!";
}


?>

