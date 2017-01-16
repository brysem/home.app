<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VersionController extends Controller
{
    public function index()
    {
        return view('version', [
            'versions' => ['5.3', '5.4', '5.5', '5.6', '7.0', '7.1'],
            'current_version' => $this->getVersion()
        ]);
    }
    
    protected function getVersion()
    {
        $version = phpversion();
        $parts = explode('.', $version);
        return implode('.', array_splice($parts, 0, 2));
    }
}
