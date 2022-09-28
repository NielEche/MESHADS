<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactMailController extends Controller
{
    public function index()
    {
        $data = \request()->all();

        Mail::to('info@mesh.app')
            ->sendNow(new ContactMail($data));

        return redirect()->back();
    }
}
