<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CustomField;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PagesController extends Controller
{
    public function __construct(Request $request)
    {
        if (request()->hasCookie('lang')) {
            $lang = request()->cookie('lang');
        } else {

            $languages = explode(',',  request()->header('Accept-Language'));
            $languages  = explode(';', $languages[0]);
            $lang   = explode('-', $languages[0])[0];
        }
        app()->setLocale($lang);
    }

    public function viewMainPAge()
    {

        $texts = CustomField::where('page', 'home')->get();
        foreach ($texts as $text) {

            $ttt[$text['section']][$text['name']] = $text['data'];
        }
        view()->share(['texts' =>  $ttt]);
        return view('home');
    }
}
