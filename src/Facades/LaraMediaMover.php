<?php

namespace Zakariayacine\LaraMediaMover\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Zakariayacine\LaraMediaMover\LaraMediaMover
 */
class LaraMediaMover extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Zakariayacine\LaraMediaMover\LaraMediaMover::class;
    }
}
