<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    /**
     * Display the loggedin user profile edit view.
     */
    public function create(): View
    {
        return view('profile.edit');
    }

    /**
     * update the loggedin user profile image.
     */
    public function storeProfileImage(Request $request): RedirectResponse
    {
        if(!$request->hasFile('profile_image')){
            $image = "";
        } else {
            if($request->profile_image->isValid()){
                $image = $request->file('profile_image')->store('img/profiles', 'public');
            }else{
                $image = "";
            }
        }
        
        $user = User::find(Auth::id());
        $user->img = $image;
        $user->save();
        return redirect(route('admin.profile-edit'))->with('success', 'Profile image uploaded successfully.');
    }

    /**
     * update the loggedin user profile image.
     */
    public function storeProfileInfo(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string'],
        ]);
                
        $user = User::find(Auth::id());

        $user->name = $validatedData['name'];
        $user->save();
        return redirect(route('admin.profile-edit'))->with('success', 'Profile Info updated successfully.');
    }

    /**
     * update the loggedin user profile image.
     */
    public function storePassword(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'password' => ['required', 'min:8', 'confirmed'],
        ]);
                
        $user = User::find(Auth::id());

        $user->password = Hash::make($validatedData['password']);
        $user->save();
        return redirect(route('admin.profile-edit'))->with('success', 'Password updated successfully.');
    }

    /**
     * Display the users list view.
     */
    public function createUsers(): View
    {
        $users = User::get();
        return view('users.list', compact('users'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function storeUser(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'user_type' => ['string']
        ]);

        if(!$request->hasFile('profile_image')){
            $image = "";
        } else {
            if($request->profile_image->isValid()){
                $image = $request->file('profile_image')->store('img/profiles', 'public');
            }else{
                $image = "";
            }
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'img' => $image,
            'logged_in' => now(),
            'user_type' => $request->user_type,
        ]);

        event(new Registered($user));

        return redirect(route('admin.users', absolute: false))->with('success', 'Registration successful.');
    }

    public function deleteUsers(User $user) {
        if(!($user->delete())){
            return redirect(route('admin.users', absolute: false))->with('error', 'An error occured. Try again.');    
        }
        return redirect(route('admin.users', absolute: false))->with('success', 'User deleted successfully.');
    }

    public function createUpdateUsers(User $user) {
        return view('users.edit-info', compact('user'));
    }

    public function updateUsers(Request $request) {
        $request->validate([
            'name' => ['required', 'string', 'max:255']
        ]);

        $user = User::get()->where('email', $request->get('email'))->first();
        $user->name = $request->get('name');
        $user->updated_at = now();
        $user->save();
        return redirect(route('admin.user.update', compact('user')))->with('success', 'User record updated successfully.');
    }

    public function updateUserPassword(Request $request) {
        $request->validate([
            'password' => ['required', 'confirmed', Rules\Password::defaults()]
        ]);

        $user = User::get()->where('email', $request->get('email'))->first();
        $user->password = $request->get('password');
        $user->save();
        return redirect(route('admin.user.update', compact('user')))->with('success', 'User password updated successfully.');
    }

    /**
     * update the loggedin user profile image.
     */
    public function updateUsersImage(Request $request): RedirectResponse
    {
        if(!$request->hasFile('profile_image')){
            $image = "";
        } else {
            if($request->profile_image->isValid()){
                $image = $request->file('profile_image')->store('img/profiles', 'public');
            }else{
                $image = "";
            }
        }
        
        $user = User::get()->where('email', $request->get('email'))->first();
        $user->img = $image;
        $user->save();
        return redirect(route('admin.user.update', compact('user')))->with('success', 'User profile image uploaded successfully.');
    }
}