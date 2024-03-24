<?php


function uploadImage($folder, $photo)
{
    $photo->store('/',$folder);
    $filename=$photo->hashName();
    $path='imags/'. $folder . '/' . $filename ;
    return $path;
}
