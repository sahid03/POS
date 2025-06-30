<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Menu;
use App\Models\Transaction;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        return view('pages.admin.dashboard', [
            'title' => 'Dashboard',
            'products' => Menu::count(),
            'cashiers' => User::where('role', 'kasir')->count(),
            'income' => Transaction::whereYear('created_at', date('Y'))
                ->whereMonth('created_at', date('m'))
                ->whereDate('created_at', now()->format('Y-m-d'))
                ->sum('total'),
            'transaction' => Transaction::whereYear('created_at', date('Y'))
                ->whereMonth('created_at', date('m'))
                ->whereDate('created_at', now()->format('Y-m-d'))
                ->count()
        ]);
    }
}
