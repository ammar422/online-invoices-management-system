<?php


function uploadImage($photo, $folder)
{
    $image = $photo->getClientOriginalName();
    $photo->move(public_path('attachmetnts/' . $folder), $image);
    return $image;
}
