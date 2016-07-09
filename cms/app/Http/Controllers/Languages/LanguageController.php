<?php

namespace App\Http\Controllers\Languages;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Languages\LanguageModel;

class LanguageController extends Controller
{
    public function postLaguage(Request $request){
    	$lang = LanguageModel::FindOrFail('1');
    	$lang->lang = $request->switch_language;
    	$lang->save();
   		return redirect()->back();
    }
}
