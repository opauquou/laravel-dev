<?php

namespace App\Http\Controllers;

use App\Mail\accountCreate;
use App\Models\Reservation;
use App\Models\Vol;
use App\User;
use Bpocallaghan\Notify\Facades\Notify;
use Illuminate\Http\Request;
use App\Traits\SendMail;
use Illuminate\Support\Facades\Mail;
use Validator;

class WelcomeController extends Controller
{
    use SendMail;

    public function __construct()
    {

    }

    public function index()
    {
        $data = new \stdClass();
        $data->currentMenu = 'dashboard';
        $data->currentSubMenu = '';
        $data->currentSubMenu1 = '';

        return view('home.home', ['data' => $data]);

    }

    public function widget()
    {
        $data = new \stdClass();
        $data->currentMenu = 'widgets';
        $data->currentSubMenu = '';
        $data->currentSubMenu1 = '';

        $viewHtml = view('pages.widget', ['data' => $data])->render();

        return response()->json(array('html' => $viewHtml));
    }

    public function calendar()
    {
        $data = new \stdClass();
        $data->currentMenu = 'calendar';
        $data->currentSubMenu = '';
        $data->currentSubMenu1 = '';

        return view('pages.calendar', ['data' => $data]);
    }


    /*************
     * MAILS Views
     *************/
    public function mailBox()
    {
        $data = new \stdClass();
        $data->currentMenu = 'mailBox';
        $data->currentSubMenu = 'inbox';
        $data->currentSubMenu1 = '';

        return view('pages.Mails.box', ['data' => $data]);
    }

    public function mailCompose()
    {
        $data = new \stdClass();
        $data->currentMenu = 'mailBox';
        $data->currentSubMenu = 'composeMail';
        $data->currentSubMenu1 = '';

        return view('pages.Mails.compose', ['data' => $data]);
    }

    public function mailRead()
    {
        $data = new \stdClass();
        $data->currentMenu = 'mailBox';
        $data->currentSubMenu = 'readMail';
        $data->currentSubMenu1 = '';

        return view('pages.Mails.read', ['data' => $data]);
    }


    /*************
     * CHARTS Views
     *************/
    public function jsCharts()
    {
        $data = new \stdClass();
        $data->currentMenu = 'charts';
        $data->currentSubMenu = 'js';
        $data->currentSubMenu1 = '';

        return view('pages.Charts.js', ['data' => $data]);
    }

    public function morrisCharts()
    {
        $data = new \stdClass();
        $data->currentMenu = 'charts';
        $data->currentSubMenu = 'morris';
        $data->currentSubMenu1 = '';

        return view('pages.Charts.morris', ['data' => $data]);
    }

    public function flotCharts()
    {
        $data = new \stdClass();
        $data->currentMenu = 'charts';
        $data->currentSubMenu = 'flot';
        $data->currentSubMenu1 = '';

        return view('pages.Charts.flot', ['data' => $data]);
    }

    public function inlineCharts()
    {
        $data = new \stdClass();
        $data->currentMenu = 'charts';
        $data->currentSubMenu = 'inline';
        $data->currentSubMenu1 = '';

        return view('pages.Charts.inline', ['data' => $data]);
    }

    public function dataCharts()
    {
        $data = new \stdClass();
        $data->currentMenu = 'charts';
        $data->currentSubMenu = 'data';
        $data->currentSubMenu1 = '';

        $vols = Vol::all();
        $data->vols = $vols;

        return view('pages.Charts.data', ['data' => $data]);
    }

    public function getDataChartStats(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
           'numVol'     =>  'required|exists:vols,numero',
        ]);

        if($validator->fails()){
            return response()->json(array('level' => 'danger', 'msg' => 'Une erreur s\'est produite! Veuillez actualiser puis recommencer.'));
        }

        try{
            $dates = $series = [];
            $vol = Vol::where('numero', $data['numVol'])->first();
            $arDate = Reservation::select('date')->distinct()->where('vol_id', $vol->id)->orderBy('date', 'asc')->get();
            $bDate = Reservation::select('date')->distinct()->where('vol_id', $vol->id)->orderBy('date', 'asc')->first();
            foreach ($arDate as $date){
                $dates[] = $date->date;
            }
            $totalDate = count($dates);

            for($i = 0; $i < $totalDate; $i++){
                $r = Reservation::where('vol_id', $vol->id)->where('date', $dates[$i])->count();
                $series[] = $r;
            }

            if(count($series) != 0){
                return response()->json(array('success' => true, 'begin' => $bDate, 'series' => $series));
            }else{
                return response()->json(array('success' => false,'level' => 'warning', 'msg' => 'Ce Vol n\'a aucune reservation.'));
            }

        }
        catch(\Exception $e){
            return response()->json(array('level' => 'danger', 'msg' => 'Une erreur s\'est produite! Veuillez actualiser puis recommencer.'));
        }

    }


    /*************
     * UI Views
     *************/
    public function generalUi()
    {
        $data = new \stdClass();
        $data->currentMenu = 'UI';
        $data->currentSubMenu = 'generalUi';
        $data->currentSubMenu1 = '';

        return view('pages.UI.general', ['data' => $data]);
    }

    public function iconsUi()
    {
        $data = new \stdClass();
        $data->currentMenu = 'UI';
        $data->currentSubMenu = 'icons';
        $data->currentSubMenu1 = '';

        return view('pages.UI.icons', ['data' => $data]);
    }

    public function buttonsUi()
    {
        $data = new \stdClass();
        $data->currentMenu = 'UI';
        $data->currentSubMenu = 'buttons';
        $data->currentSubMenu1 = '';

        return view('pages.UI.buttons', ['data' => $data]);
    }

    public function slidersUi()
    {
        $data = new \stdClass();
        $data->currentMenu = 'UI';
        $data->currentSubMenu = 'sliders';
        $data->currentSubMenu1 = '';

        return view('pages.UI.sliders', ['data' => $data]);
    }

    public function timeLinesUi()
    {
        $data = new \stdClass();
        $data->currentMenu = 'UI';
        $data->currentSubMenu = 'timeLines';
        $data->currentSubMenu1 = '';

        return view('pages.UI.timeLines', ['data' => $data]);
    }

    public function modalsUi()
    {
        $data = new \stdClass();
        $data->currentMenu = 'UI';
        $data->currentSubMenu = 'modals';
        $data->currentSubMenu1 = '';

        return view('pages.UI.modals', ['data' => $data]);
    }


    /*************
     * FORMS Views
     *************/
    public function generalForm()
    {
        $data = new \stdClass();
        $data->currentMenu = 'forms';
        $data->currentSubMenu = 'generalForms';
        $data->currentSubMenu1 = '';

        return view('pages.Forms.general', ['data' => $data]);
    }

    public function advancedForm()
    {
        $data = new \stdClass();
        $data->currentMenu = 'forms';
        $data->currentSubMenu = 'advanced';
        $data->currentSubMenu1 = '';

        return view('pages.Forms.advanced', ['data' => $data]);
    }

    public function editorsForm()
    {
        $data = new \stdClass();
        $data->currentMenu = 'forms';
        $data->currentSubMenu = 'editors';
        $data->currentSubMenu1 = '';

        return view('pages.Forms.editors', ['data' => $data]);
    }


    /*************
     * TABLES Views
     *************/
    public function simpleTables()
    {
        $data = new \stdClass();
        $data->currentMenu = 'tables';
        $data->currentSubMenu = 'simple';
        $data->currentSubMenu1 = '';

        return view('pages.Tables.simple', ['data' => $data]);
    }

    public function dataTables()
    {
        $data = new \stdClass();
        $data->currentMenu = 'tables';
        $data->currentSubMenu = 'data';
        $data->currentSubMenu1 = '';

        return view('pages.Tables.data', ['data' => $data]);
    }


    /*************
     * EXAMPLES  Views
     *************/
    public function invoicePage()
    {
        $data = new \stdClass();
        $data->currentMenu = 'examples';
        $data->currentSubMenu = 'invoice';
        $data->currentSubMenu1 = '';

        return view('pages.examples.invoice', ['data' => $data]);
    }

    public function profilePage()
    {
        $data = new \stdClass();
        $data->currentMenu = 'examples';
        $data->currentSubMenu = 'profile';
        $data->currentSubMenu1 = '';

        return view('pages.examples.profile', ['data' => $data]);
    }

    public function loginPage()
    {
        return view('pages.examples.login');
    }

    public function registerPage()
    {
        return view('pages.examples.register');
    }

    public function lockPage()
    {
        return view('pages.examples.lockScreen');
    }

    public function error404()
    {
        $data = new \stdClass();
        $data->currentMenu = 'examples';
        $data->currentSubMenu = 'error 404';
        $data->currentSubMenu1 = '';

        return view('pages.examples.error404', ['data' => $data]);
    }

    public function error500()
    {
        $data = new \stdClass();
        $data->currentMenu = 'examples';
        $data->currentSubMenu = 'error 500';
        $data->currentSubMenu1 = '';

        return view('pages.examples.error500', ['data' => $data]);
    }

    public function mail(){
        $user = User::where('id', 1)->first();
        $ccEmails = 'warckhen@gmail.com';
        $bccEmails = 'michel.okou@inpulsion.net';
        Mail::to($user->email)
            ->cc($ccEmails)
            ->bcc($bccEmails)
            ->send(new accountCreate($user));
        return redirect('/')->with('success', 'Mail Sent !');
    }

}
