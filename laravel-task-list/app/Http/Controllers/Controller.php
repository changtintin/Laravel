<?php

namespace App\Http\Controllers;

/*
    MY NOTE    
    =====================================================================
    psr-4: inlcude other code from other namespace and it'll autoloaded
    In composer.json 24)
*/
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
