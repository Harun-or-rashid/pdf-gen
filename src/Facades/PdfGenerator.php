<?php
namespace ringku\PdfGenerator\Facades;

use Illuminate\Support\Facades\Facade;

class PdfGenerator extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'pdf-generator';
    }
}
