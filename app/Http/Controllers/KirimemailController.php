<?php

namespace App\Http\Controllers;

use App\Mail\kirimemail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class KirimemailController extends Controller
{
    public function index(){
        Mail::to('ali.nrdn14005@gmail.com')->send(new kirimemail);
        return '<h1> kirim email berhasil</h1>';
    }
}
