<?php

namespace App\Http\Controllers;

use App\Models\Deployment;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    
    public function index()
    {
        $deployments = Deployment::with('repository', 'environment')
            ->latest('created_at')
            ->take(5)
            ->get();
        return view('dashboard', compact('deployments'));
    }
}
