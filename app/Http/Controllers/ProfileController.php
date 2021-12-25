<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class ProfileController extends Controller
{
    public function my_account()
    {
        return Inertia::render('profile/Dashboard', []);
    }
    public function show_account_details()
    {
        return Inertia::render('profile/AccountDetails', []);
    }
}
