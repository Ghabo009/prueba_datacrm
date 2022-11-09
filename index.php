<?php
//Incluyo los archivos necesarios
require("./model/Challenge.php");
require("./model/ChallengeDAO.php");
require("./controller/ChallengeController.php");

//Instancio el controlador
$controller = new ChallengeController;

//Ejecuto el método
$controller->index();
