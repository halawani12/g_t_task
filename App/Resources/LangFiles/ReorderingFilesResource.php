<?php


namespace App\Resources\LangFiles;


class ReorderingFilesResource
{
    public static function returnArray($state , $msg){
        return json_encode([
            "state" => $state,
            "msg" => $msg,
        ]);
    }

}