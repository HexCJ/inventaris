<?php

namespace App\Http\Controllers;

use App\Models\DataBarang;
use App\Models\DataPemakaian;
use App\Models\DataPembelian;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function dashboard()
    {
        $role = Auth::user()->role;
        $username = Auth::user()->username;
        $databarangall = DataBarang::count();
        $datauserall = User::count();
        $datapembelianall = DataPembelian::count();
        $datapemakaianall = DataPemakaian::count();
        $name = Auth::user()->name;
        $user = User::where('username', $username)->first();
        return view('/dashboard', [
            'role' => $role,
            'username' => $username,
            'name' => $name,
            'user' => $user,
            'databarangall' => $databarangall,
            'datauserall' => $datauserall,
            'datapembelianall' => $datapembelianall,
            'datapemakaianall' => $datapemakaianall,
        ]);
    }

    public function navbar()
    {
        $username = Auth::user()->username;
        $user = User::where('username', $username)->first();
        return view('/navbar', [
            'user' => $user
        ]);

    }
}
