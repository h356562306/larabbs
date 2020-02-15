<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function root(User $user){
        return view("pages.root",compact("user"));
    }

    public function permissionDenied(){
        if (config('administrator.permission')()){
            return redirect(url(config("administrator.uri")),302);
        }
        return view("pages.permission_denied");
    }
}
