<?php
namespace App\ServicesInterface;


interface LangFilesServiceInterface
{

    /**
     * Reordering files .. ex : set file arabic-1.txt in sub folder arabic folder .
     *
     * @return array
     */
    public function reorderingFiles();

}