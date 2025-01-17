<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::join('role', 'role.id', '=', 'users.role_id')
        ->select('users.*', 'role.role AS Role') // Mengakses kolom 'role' dari tabel role
        ->get();
    
        return view('user.index', ['users' => $users]);
    }
    

}
