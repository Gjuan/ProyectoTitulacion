<?php

include("configuration/configuration.php");

require_once "models/enlaces.php";
require_once "models/ingreso.php";
require_once "models/gestorusuario.php";
require_once "models/combo_select_model.php";
require_once "models/gestorCombos_Modell.php";

require_once "models/proyecto_model.php";

#############################################

require_once "controllers/template.php";
require_once "controllers/enlaces.php";
require_once "controllers/ingreso.php";
require_once "controllers/gestorusuario.php";
require_once "controllers/combo_select_controller.php";
require_once "controllers/gestorCombos_Controller.php";

require_once "controllers/proyecto_controller.php";



$template = new TemplateController();
$template -> template();

?>