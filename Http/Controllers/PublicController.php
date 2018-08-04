<?php

namespace Modules\Socialize\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Vinkla\Instagram\Instagram;

class PublicController extends Controller
{
    public function index()
    {
        //https://www.instagram.com/oauth/authorize/?client_id=a2869857166e41e0a9edfe341735b498&redirect_uri=http://www.ekippharma.com&response_type=token
        $instagram = new Instagram('5576167663.a286985.08b12a4dc6cb4fb38a4c07e02d442a07');
        $feed = $instagram->get('ismailsagsoz');
    }
}
