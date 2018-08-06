<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\URL;

class UserController extends Controller
{


    /**
     * UserController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function switchLang(Request $request){

        $hideDefaultUrl = Config::get('laravellocalization.hideDefaultLocaleInURL');
        $locale = $request['locale'];
        $url = URL::previous();
        $path_root = $request->root();
        $link = '';
        $finalLink ='';

        if($hideDefaultUrl){

            if($locale == 'en'){

                $link = explode($path_root, $url);
                $finalLink = '/en'.$link[1];
                return response()->json(array('result'=>'success', 'msg'=>$finalLink));

            }

            if($locale == 'fr'){

                $link = explode($path_root.'/en', $url);
                $finalLink = '/fr'.$link[1];
                return response()->json(array('result'=>'success', 'msg'=>$finalLink));

            }

        }else{

            if($locale == 'en'){

                $link = explode($path_root.'/fr', $url);
                $finalLink = '/en'.$link[1];
                return response()->json(array('result'=>'success', 'msg'=>$finalLink));

            }

            if($locale == 'fr'){

                $link = explode($path_root.'/en', $url);
                $finalLink = '/fr'.$link[1];
                return response()->json(array('result'=>'success', 'msg'=>$finalLink));

            }

        }

    }

}
