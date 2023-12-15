<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ResearchActivity;

class ResearchActivityController extends Controller{
    public static function cols(){
        $r = new ResearchActivity;
        $columns = $r -> getTableCols();
        return $columns;
    }
}
