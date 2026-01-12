<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    /**
     * Store registration form
     */
    public function store(Request $request)
    {
        // 1️⃣ Validate input (match migration exactly)
        $validated = $request->validate([
            // Student info
            'name'        => 'required|string|max:255',
            'email'       => 'required|email|max:255',
            'phone'       => 'required|string|max:30',
            'birth_date'  => 'required|date',
            'gender'      => 'required|in:male,female',
            'address'     => 'required|string',

            // Program info
            'program_name'  => 'required|string|max:255',
            'level'         => 'required|string|max:255',
            'class_type'    => 'required|string|max:255',
            'learning_mode' => 'required|in:online,offline',

            //regist info
            'status'      => 'required|in:regular,trial',
        ]);

        // 2️⃣ Store into database
        Registration::create($validated);

        // 3️⃣ Response
        return redirect()
            ->back()
            ->with('registration_success', true);

    }
}
