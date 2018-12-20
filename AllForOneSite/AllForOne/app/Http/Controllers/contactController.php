<?php

namespace App\Http\Controllers;
use App\Categorie;
use App\Catgegorie;
use App\Event;
use Illuminate\Http\Request;
use Mail;
use Session;

class contactController extends Controller
{

    // heeft de pagina
    public function index()
    {

        return view('contact');
    }

    // bewerkt de contact from data
    public  function SenForm(Request $request)
    {
        $fieldString ='';
        $fields = array('secret' => '6LfHE4MUAAAAAJ9kR96hXsjBXyNXJWz1YaWCPiZy', 'response' => $request['g-recaptcha-response']);
        foreach ($fields as $key=>$value)
        {
            $fieldString .= $key . '='.$value.'&';

        }
        $fieldString = rtrim($fieldString,'&');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
        curl_setopt($ch, CURLOPT_POST, count($fields));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fieldString);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($ch);
        curl_close($ch);
        $array = json_decode($result,true);
        if ($array['success']){

            if (isset($request))
            {
                if (isset($request['name'], $request['email'], $request['message']))
                {
                    if (preg_match('/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/' ,$request['email'])) {


                        $data = [
                            'email' => $request['email'],
                            'name' => $request['name'],
                            'body' => $request['message'],
                            'subject' => 'contact mail from ' . $request['name']];

                        Mail::send('emails.contact', $data, function ($message) use ($data) {

                            $message->to('vincent.wathelet@student.ehb.be')->subject($data['subject'])->replyTo($data['email']);
                        });

                            return view('contact', ['succes' => 'succes']);

                    }
                    else
                        {
                            return view('contact',['error' => 'No Valid Email']);
                        }

                }
                else
                {
                    return view('contact',['error' => 'Not All Values Are Entered']);
                }
            }
            else
                {
                    return view('contact',['error' => 'Request Error']);
                }

        }
        else
            {
                return view('contact',['error' => 'Captacha Error']);
            }


    }
}