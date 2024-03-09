<?php

use App\Models\Section;

function getSectionName(){
    return Section::section();
}