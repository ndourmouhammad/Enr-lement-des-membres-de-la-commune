<?php
require_once("config.php");

$matricule = $_GET['matricule'];
$membre->delete($matricule);