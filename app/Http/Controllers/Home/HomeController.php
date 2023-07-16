<?php

namespace App\Http\Controllers\Home;

use App\Models\User;
use App\Models\Agent;
use App\Models\Inquiry;
use App\Models\Property;
use App\Models\AgentPhoto;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PasswordReset;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $page_title = 'Home';

        $query = Property::query();

        // Check if a search term is provided
        if ($request->has('search')) {
            $searchTerm = $request->input('search');

            $query->where(function ($innerQuery) use ($searchTerm) {
                $innerQuery->where('property_name', 'LIKE', "%$searchTerm%")
                    ->orWhere('property_location', 'LIKE', "%$searchTerm%")
                    ->orWhere('property_description', 'LIKE', "%$searchTerm%")
                    ->orWhere('property_type', 'LIKE', "%$searchTerm%")
                    ->orWhere('price_rent', 'LIKE', "%$searchTerm%")
                    // Add more search conditions for other attributes as needed
                    ->orWhere('bedrooms', 'LIKE', "%$searchTerm%");
            });
        }

        // Retrieve all properties if no search term is provided
        if (!$request->has('search')) {
            $properties = Property::all();
        } else {
            $properties = $query->get();
        }

        return view('home.index', [
            'page_title' => $page_title,
            'properties' => $properties,
        ]);
    }


    public function view($id)
    {
        $page_title = 'View Property';

        $property = Property::findOrFail($id);

        return view('home.view_property', [
            'page_title' => $page_title,
            'property' => $property,
        ]);
    }

    public function addAgent()
    {
        $page_title = 'Register to be an Agent';

        return view('home.add_agent', [
            'page_title' => $page_title,
        ]);
    }

    public function registerAgent(Request $request)
    {
        // Validate the user's inputs
        $validatedData = $request->validate([
            'full_name' => 'required|string',
            'phone_number' => 'required|string',
            'email' => 'required|email|unique:agents',
            'address' => 'required|string',
            'identification' => 'required|string|unique:agents',
            'zip_code' => 'required|string',
            'agency_name' => 'required|string',
            'agency_phone_number' => 'required|string',
            'agency_email' => 'required|email',
            'agency_address' => 'required|string',
            'agency_license' => 'required|string|unique:agents',
            'years_of_experience' => 'required|integer',
            'background_check' => 'required|boolean',
            'compliance_documentation' => 'required|boolean',
            'terms_accepted' => 'required|boolean',
            'agent_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:4096',
        ]);


        // Create a new agent
        $agent = new Agent();
        $agent->fill($validatedData); // Fill the agent attributes with the validated data
        $agent->save(); // Save the agent to the database


        if ($agent->save()) {

            if ($request->hasFile('agent_image')) {
                $image = $request->file('agent_image');
                $imagePath = $image->store('agent_image', 'public');
                $agentImage = new AgentPhoto();
                $agentImage->agent_id = $agent->id;
                $agentImage->image_path = $imagePath;
                $agentImage->save();
            }


            // Assign the default password
            $password = "12345678.";

            // Encrypt the password using Laravel's built-in Hash facade
            $encryptedPassword = Hash::make($password);

            // Create a new user
            $user = new User;
            $user->name = $request->input('full_name');
            $user->username = $request->input('email');
            $user->agent_id = $agent->id;
            $user->email = $request->input('email');
            $user->mobile = $request->input('phone_number');
            $user->password = $encryptedPassword;


            // Assign Role
            $userRole = Role::where('name', 'Agent')->first();
            $user->assignRole($userRole);



            // Generate an email password reset token
            $token = Str::random(64);

            // Insert email and token in password resets table
            $passwordResetToken = PasswordReset::where('email', $request->email)->first();
            if ($passwordResetToken) {

                PasswordReset::where('email', $request->email)->update([
                    'email' => $request->email,
                    'token' => $token,
                ]);
            } else {

                PasswordReset::create([
                    'email' => $request->email,
                    'token' => $token,
                ]);
            }

            // Save the new user
            $user->save();



            // Send password reset link email with the token
            if (Mail::send('emails.agent-registration', ['token' => $token, 'user' => $user], function ($message) use ($request) {
                $message->to($request->email);
                $message->subject("Account Creation Notification");
            })) {



                return redirect()
                ->route('home.addAgent')
                ->with(['success' => 'Hello, ' . $user->name . ' . Thanks for wanting to partner with us as an agent. An email with the password reset link was sent to ' . $user->email]);
            } else {

                return redirect()
                    ->back()
                    ->with(['error' => 'There was an error sending the email. Please try again. ']);
            }

        }
    }

    public function storeInquiry(Request $request)
    {
        // Validate the form inputs
        $validatedData = $request->validate([
            'property_id' => 'required|integer',
            'name' => 'required|string',
            'mobile_no' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        // Create a new Inquiry instance
        $inquiry = new Inquiry();
        $inquiry->property_id = $validatedData['property_id'];
        $inquiry->name = $validatedData['name'];
        $inquiry->mobile_no = $validatedData['mobile_no'];
        $inquiry->email = $validatedData['email'];
        $inquiry->message = $validatedData['message'];
        $inquiry->save();

        // Return a success response
        return response()->json(['message' => 'Inquiry submitted successfully'], 200);
    }
}
