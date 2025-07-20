<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\Users\Subjects;
use App\Models\Users\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $subjects = Subjects::all();
        return view('auth.register.register', compact('subjects'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @param \App\Http\Requests\Auth\RegisterRequest $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(RegisterRequest $request)
    {
        DB::beginTransaction();

        try{
            $validated = $request->validated();

            $birthDate = sprintf('%04d-%02d-%02d', $validated['old_year'], $validated['old_month'], $validated['old_day']);

            $user = User::create([
                'over_name'       => $validated['over_name'],
                'under_name'      => $validated['under_name'],
                'over_name_kana'  => $validated['over_name_kana'],
                'under_name_kana' => $validated['under_name_kana'],
                'mail_address'    => $validated['mail_address'],
                'sex'             => $validated['sex'],
                'birth_day'       => $birthDate,
                'role'            => $validated['role'],
                'password'        => Hash::make($validated['password']),
            ]);

            if ($validated['role'] == 4) {
                $user->subjects()->attach($validated['subject']);
            }

            DB::commit();
            return view('auth.login.login');
        }catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('loginView');
        }
    }
}
