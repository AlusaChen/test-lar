<?php
namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class EditorFacade extends Facade
{

    protected static function getFacadeAccessor() { return 'Editor'; }

}