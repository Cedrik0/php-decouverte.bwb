<?php
$contenuFichierUsers = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/data/users.json',true);

$fichierDecoderUsers = json_decode($contenuFichierUsers,true);

?>