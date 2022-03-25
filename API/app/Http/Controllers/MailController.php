<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller{
    public function contactanos(Request $r)
    {
        Mail::raw($r->msj, function($message) use($r)
            {
                $message->from($r->email, $r->razon);

                $message->to('admin@kibodesign.mx');
            });
    }
}