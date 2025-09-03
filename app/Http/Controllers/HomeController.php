<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * The root route always must redirect to tasks index,
     * or the login page if user is not yet authenticated.
     */
    public function __invoke()
    {
        return Auth::check()
            ? redirect()->route('tasks.index')
            : redirect()->route('login');
    }
}
