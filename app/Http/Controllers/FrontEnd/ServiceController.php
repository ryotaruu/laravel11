<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function serviced(Request $request): RedirectResponse  {
        $request->validate([
            'service' => 'required'
        ]);
        $data = $request->all();
        return redirect()->route('in.service', ['service' => $data['service']]);
    }
}
