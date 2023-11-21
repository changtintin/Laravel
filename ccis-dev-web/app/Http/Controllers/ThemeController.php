<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Theme;


class ThemeController extends Controller {
    
    public function show(string $title, string $subtitle=""):View {          
        if(!Theme::where("title", $title) -> exists()){
            return view('page.index');
        }
        
        if(empty($subtitle)){
            return view('page.theme', [
                'title' => $title
            ]);
        }

        return view('page.theme', [
            'title' => $title,
            'subtitle' => $subtitle
        ]);
    }
}
