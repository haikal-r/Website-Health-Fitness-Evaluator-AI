<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    protected $user, $data;

    public function __construct()
    {
        //== Mengambil Informasi Role dan Permissions dari User yg Login
        $this->middleware(['auth']);
        $this->middleware(function ($request, $next) {
            $this->user = User::find(auth()->user()->id);

            return $next($request);
        });
    }
}
