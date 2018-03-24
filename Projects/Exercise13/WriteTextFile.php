<?php

function addContactToFile($fileHandle, $name, $email, $phone) {
    $contact = "$name\t$email\t$phone\n";
    fwrite($fileHandle, $contact);   
}

$dataName = "Marge Simpson";
$dataEmail = "marge@springfield.com";
$dataPhone = "555-332-221";
$filename = 'people.txt';

$file = fopen($filename, 'a');
addContactToFile($file, $dataName, $dataEmail, $dataPhone);

//fwrite($file, $dataName);
//fwrite($file, $dataEmail);
//fwrite($file, $dataPhone);

fclose($file);