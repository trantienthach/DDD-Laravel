<?php

use Illuminate\Support\Facades\Facade;

class Package extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'package';
    }
}
