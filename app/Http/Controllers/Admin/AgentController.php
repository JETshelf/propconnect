<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Agent;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PasswordReset;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AgentController extends Controller
{
    public function index()
    {
        $page_title = 'Agents';

        return view('admin.agents', [
            'page_title' => $page_title,
        ]);
    }

    public function create()
    {
        $page_title = 'Add New Agent';

        return view('admin.add_agent', [
            'page_title' => $page_title,
        ]);
    }

    public function store(Request $request)
    {
        // Validate the user's inputs
        $validatedData = $request->validate([
            'full_name' => 'required|string',
            'phone_number' => 'required|string',
            'email' => 'required|email|unique:agents',
            'address' => 'required|string',
            'profile_picture' => 'nullable|string',
            'identification' => 'required|string|unique:agents',
            'date_of_birth' => 'required|date',
            'agency_name' => 'required|string',
            'agency_phone_number' => 'required|string',
            'agency_email' => 'required|email',
            'agency_address' => 'required|string',
            'agency_license' => 'required|string|unique:agents',
            'years_of_experience' => 'required|integer',
            'qualifications' => 'nullable|string',
            'educational_background' => 'nullable|string',
            'property_types' => 'nullable|string',
            'geographic_areas' => 'nullable|string',
            'languages' => 'nullable|string',
            'references' => 'nullable|string',
            'reviews' => 'nullable|string',
            'background_check' => 'required|boolean',
            'compliance_documentation' => 'required|boolean',
            'terms_accepted' => 'required|boolean',
        ]);

        $agent = Agent::create($validatedData);

        // if($agent){

        //     // Assign the default password
        //     $password = "12345678.";

        //     // Encrypt the password using Laravel's built-in Hash facade
        //     $encryptedPassword = Hash::make($password);

        //     // Create a new user
        //     $user = new User;
        //     $user->name = $validatedData['full_name'];
        //     $user->username = $validatedData['full_name'];
        //     $user->email = $validatedData['email'];
        //     $user->mobile = $validatedData['phone_number'];
        //     $user->password = $encryptedPassword;


        //     // Assign Role
        //     $userRole = Role::where('name', 'Agent')->first();
        //     $user->assignRole($userRole);



        //     // Generate an email password reset token
        //     $token = Str::random(64);

        //     // Insert email and token in password resets table
        //     $passwordResetToken = PasswordReset::where('email', $request->email)->first();
        //     if ($passwordResetToken) {

        //         PasswordReset::where('email', $request->email)->update([
        //             'email' => $request->email,
        //             'token' => $token,
        //         ]);
        //     } else {

        //         PasswordReset::create([
        //             'email' => $request->email,
        //             'token' => $token,
        //         ]);
        //     }

        //     // Save the new user
        //     $user->save();

        //     return redirect()
        //             ->route('admin.agents')
        //             ->with(['success' => $user->first_name . ' ' . $user->last_name . ' has been registered successfully. An email with the password reset link was sent to ' . $user->email]);

        //     // // Send password reset link email with the token
        //     // if (Mail::send('emails.verify-email', ['token' => $token, 'user' => $user], function ($message) use ($request) {
        //     //     $message->to($request->email);
        //     //     $message->subject("Account Creation Notification");
        //     // })) {



        //     //     return redirect()
        //     //         ->route('admin.agents')
        //     //         ->with(['success' => $user->first_name . ' ' . $user->last_name . ' has been registered successfully. An email with the password reset link was sent to ' . $user->email]);
        //     // } else {

        //     //     return redirect()
        //     //         ->back()
        //     //         ->with(['error' => 'There was an error sending the email. Please try again. ']);
        //     // }

        // }
    }
}
