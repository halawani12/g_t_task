<?php
namespace App\Controllers;

use App\ServicesInterface\LangFilesServiceInterface;


class LangFilesController
{
    public $langFilesService;

    public function __construct(LangFilesServiceInterface $langFilesServiceInterface)
    {
        $this->langFilesService = $langFilesServiceInterface;
    }

    public function reorderingFiles(){
        try{
            return $this->langFilesService->reorderingFiles();
        }catch (\Exception $e){
            return $e->getMessage();
        }
    }

}