<?php

/* check call from command line or not */
if (php_sapi_name() === 'cli') {
    require_once ("App/Controllers/LangFilesController.php");
    require_once ("App/Services/LangFilesService.php");
}else{
    require_once ("../../App/Controllers/LangFilesController.php");
    require_once ("../../App/Services/LangFilesService.php");
}



$langFilesCon = new \App\Controllers\LangFilesController(new \App\Services\LangFilesService());
$return = $langFilesCon->reorderingFiles();

echo $return;

