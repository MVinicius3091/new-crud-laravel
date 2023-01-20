<?php

namespace App\Http\Controllers;

use App\Models\Aluno;

class HomeController extends Controller
{
    public function index() {

        $users = Aluno::orderByDesc('id')->get();

        return view('home', [
            'title' => 'Home',
            'users' => $users
        ]);
    }
}
