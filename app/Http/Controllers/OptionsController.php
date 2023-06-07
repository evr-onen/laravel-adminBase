<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CustomField;

class OptionsController extends Controller
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

    public function getHomeOptions(Request $request)
    {
        $lang = request()->cookie('lang');
        $fields = CustomField::where('page', 'home')->get();

        view()->share(['fields' => $fields, 'lang' =>  $lang]);

        return view('dashboard.options.pages.homeOptions');
    }
    public function updateHomeOptions(Request $request)
    {

        $validator = validator()->make(request()->all(), [
            'id'                => 'required | numeric',
            'content_data'      => 'required | array',
        ]);

        if ($validator->fails()) {
            return response($validator->errors());
        };

        $field =  CustomField::where('id', request()->get('id'))
            ->update([

                'data' => request()->get('content_data'),
            ]);

        return $field;
    }
}


// {"en": "WHO WE ARE?", "tr": "BİZ KİMİZ?"}
// {"en": "WHO WE ARE? 22222", "tr": "BİZ KİMİZ? 11111"}
