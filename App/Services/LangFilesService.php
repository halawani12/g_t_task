<?php
namespace App\Services;


require_once(__DIR__."/../ServicesInterface/LangFilesServiceInterface.php");
require_once(__DIR__."/../Resources/LangFiles/ReorderingFilesResource.php");

use App\Resources\LangFiles\ReorderingFilesResource;
use App\ServicesInterface\LangFilesServiceInterface;


class LangFilesService implements LangFilesServiceInterface
{

    /* Implement method reordering files */
    public function reorderingFiles()
    {
        try{

            $extFile = ".txt";


            /* check call from command line or not */
            if (php_sapi_name() === 'cli') {
                $pathToFolder = "public/files/LangFiles/";
            }else{
                $pathToFolder = "../../public/files/LangFiles/";
            }


            if (is_dir($pathToFolder)) {

                if (!is_readable($pathToFolder)) {
                    return ReorderingFilesResource::returnArray(false , "The directory exists but it is not readable" ) ;
                }
                if (!is_writable($pathToFolder)) {
                    return ReorderingFilesResource::returnArray(false , "The directory exists but it is not writeable" ) ;
                }

                $getAllFiles = glob($pathToFolder . '*txt');
                foreach ($getAllFiles as $file) {

                    /* get file name ex: file.txt */
                    $fileName = basename($file);

                    /* remove score,number and file ext from file name */
                    $folderName = preg_replace('/[-\d'.$extFile.']+/', '', $fileName);

                    /* define path to sub folder */
                    $pathToSubFolder = $pathToFolder . $folderName ."/";

                    if(!is_dir($pathToSubFolder) ){
                        /* make sub folder */
                        mkdir($pathToSubFolder, 0777, true);
                    }

                    $newPathFile = $pathToSubFolder . $fileName;


                    /* delete file if exist in sub folder */
                    if(file_exists($newPathFile)){
                        unlink($newPathFile);
                    }

                    /* cut file to sub folder */
                    if (!rename($file, $newPathFile)) {
                        /* the file not move to sub folder */
                        return ReorderingFilesResource::returnArray(false , "This file ".$fileName. "can not move to sub folder" ) ;
                    }

                }




            }
            else {
                return ReorderingFilesResource::returnArray(false , "The directory does not exist" );
            }

            if(count($getAllFiles) < 1)
                return ReorderingFilesResource::returnArray(true , "No files exist to reordering !!");


            return ReorderingFilesResource::returnArray(true , "Successfully");

        }
        catch (\Exception $e){
            return ReorderingFilesResource::returnArray(false , $e->getMessage() );
        }
    }

}