<?php
$contenuFichier = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/data/message.json',true);

$fichierDecoder = json_decode($contenuFichier,true);




