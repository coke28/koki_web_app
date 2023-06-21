<?php

namespace App\Core\Adapters;
use Illuminate\Support\Str;

class RvnDev
{
    public function getRandom($length = 5){

        return Str::random($length);



    }

}

