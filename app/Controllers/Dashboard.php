<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'page' => 'dashboard',
        ];
        return view('dashboard/index', $data);
    }
}
