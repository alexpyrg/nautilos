<?php

namespace App\Http\Controllers;

use App\Models\Email;
use App\Models\EmailTemplate;
use App\Models\Locale;
use Illuminate\Http\Request;

class MailingController extends Controller
{
    public function upload(Request $request){

        // error_log($request);
        return response('success', 200);

    }

    public function saveMail(Request $request){
//        dd($request->all());
        $validated = $request->validate([
            'subject' => 'required',
            'body' => 'required',
        ]);
//        dd('kalimeRRRRRa');
            $loc_id = Locale::where('code', $request->locale)->first();
        if($validated){
//            dd($request->id, $request->locale, $loc_id);

            EmailTemplate::updateOrCreate([
               'email_id' => $request->id,
                'locale_id' => $loc_id->id,
            ],
            [
                'subject' => $request->subject,
                'body' => $request->body,
            ]);
//            dd('kalispera');
           return redirect()->back()->with(['success', 'Το email αποθηκεύτηκε!']);

        }else{
            return redirect()->back()->with('general_error', 'Το email δεν αποθηκεύτηκε!');
        }


    }//saveMail

    public function loadMail(){
        return view('backend.components.mailList')->with([
            'mails' => Email::all(),
            'locales' => Locale::all(),
        ]);
    }

    public function loadEditMail(Request $request){
//        dd($request->id);
        $selected_locale = Locale::where('code', $request->locale)->first();
//        dd($selected_locale, $request->locale);
        $emailContent = EmailTemplate::where('email_id', $request->id,)->where('locale_id', $selected_locale->id)->first();
//            dd($emailContent, $request, $selected_locale);

        return view('backend.components.mailEdit')->with([
            'mail' => Email::where('id', $request->id)->firstOrFail(),
            'locales' => Locale::all(),
            'selected_locale' => $selected_locale,
            'mailContent' => $emailContent,
        ]);
    }//loadEditMail
    public function sendMail(Request $request){
        if($request->mail_address != null && $request->mail_address != ""){
            try{
                //send email
                $message = $request->message;
                $message = str_replace("%__NAME__%", $request->user_name, $message);
                $message = str_replace("%__TITLE__%", $request->user_title, $message);
                $message = str_replace("%__BOOKING_ID__%", $request->booking_id, $message);
                $message = str_replace("%__CHECK_IN__%", $request->check_in_date, $message);
                $message = str_replace("%__CHECK_OUT__%", $request->check_out_date, $message);
                $message = str_replace("%__BOOKING_LINK__%", $request->booking_link, $message);
            }catch(\Exception $ex){
                //create new record on Errors table and add the error
                return response($ex->getMessage(), 500);
            }
        }

        return response('failed', 500);
    }

    public function sendSMS(Request $request){

    }
}
