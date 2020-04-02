<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Jobs\SendContactEmail;
use Illuminate\Http\Request;

class SendContactEmailController extends Controller
{
    /**
     * Send contact e-mail
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        
    }
}