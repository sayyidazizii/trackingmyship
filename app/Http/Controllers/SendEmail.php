<?php

namespace App\Http\Controllers;

use App\Mail\OrderShipped;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendEmail extends Controller
{
    public function index() {
        // $person = Users::all();
        Mail::to('test1@gmail.com')->send(new OrderShipped());
    }
}
