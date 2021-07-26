<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Biblestudy;
use App\Utils\Twilio;

class BiblestudyController extends Controller

{
    public function index(Request $request) {

       $bsrequest = new Biblestudy();
        return view('/index ', compact('bsrequest'));
       
    }

    public function create(Request $request ) {

        $bsrequest  = new Biblestudy();
        $bsrequest->fullname = $request-> fullname;
        $bsrequest->email = $request->email;
        $bsrequest->contactnumber = $request->contactnumber;
        $bsrequest->birthdate = $request->birthdate;
        $bsrequest->religion = $request->religion;
        $bsrequest->bsdate = $request->bsdate;
        $bsrequest->bstime = $request->bstime;
        $bsrequest->address = $request->address;

        if ($bsrequest->save()) {
            return redirect('/thank-you');
        }
        
        return redirect('/thank-you');
    }

    public function tableform(Request $request) {
        
        $bsrequest = Biblestudy::all();
        return view('/bible-study-requests', compact('bsrequest'));

    }

    public function popup(Request $request) {

        return view('/thank-you');
    }

}
