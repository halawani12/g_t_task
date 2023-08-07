<?php

/* includes classes */
include_once("Config/ConfigMain.php");

/* new object from config main */
$configMain = new \Config\ConfigMain();


/* includes views */

require_once($configMain::getDirView()."/Panels/header.php");

require_once($configMain::getDirView()."/Pages/reordering_files.php");

require_once($configMain::getDirView()."/Panels/footer.php");

?>


