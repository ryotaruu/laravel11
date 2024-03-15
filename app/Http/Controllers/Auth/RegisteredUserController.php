<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'role' => 'required',
            'service_using' => 'required',
            'fee_service' => 'required',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $data = $request->all();
        $role = $data['role'];
        $service = $data['service_using'];
        $fee = $data['fee_service'];

        $fee_explode = explode('-', $fee);
        $fee_role = $fee_explode[0];
        $fee_service = $fee_explode[1];
        $fee_price = $fee_explode[2];
        if ($role == $fee_role && $service == $fee_service) {
            $fee_payment = $fee_price;
        } else {
            return redirect()->back()->with('error', 'Please choice role and service like with option in select fee!');
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'service_using' => $request->service_using,
            'fee_using' => (float)$fee_payment,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
