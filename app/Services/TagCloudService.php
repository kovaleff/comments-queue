<?php


namespace App\Services;


class TagCloudService
{
    function getTags(){
        return Tag::all();
    }
}
