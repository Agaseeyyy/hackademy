<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display the user management interface.
     */
    public function index()
    {
        // Just return the view that contains the Livewire component
        return view('admin.users.index');
    }
}
