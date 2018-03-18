<?php

namespace Bantenprov\Anggaran\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * The Anggaran facade.
 *
 * @package Bantenprov\Anggaran
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class AnggaranFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'anggaran';
    }
}
