<?php

namespace LaravelCMS\Exceptions;

use Exception;

class NoTableForSortable extends Exception
{
    public function __construct()
    {
        parent::__construct("No table found for sorting datas");
    }
}
