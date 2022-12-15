<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AdmsController extends Controller
{
    public function index()
    {
        $adm=auth()->user();
        return view('ADM.ListagemPersonaisADM',['usuario'=>$adm]);
    }
}
