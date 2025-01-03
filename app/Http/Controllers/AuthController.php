<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

use function Symfony\Component\String\b;

class AuthController extends Controller
{
    function login()
    {
        return view('auth.login');
    }
    function loginPost(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required'
            ], [
                'email.required' => 'Email must be filled in.',
                'email.email' => 'Invalid email format.',
                'password.required' => 'Password must be filled in.'
            ]);

            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();

                if (Auth::user()->role === 'admin') {
                    return redirect()->route('admin.dashboard');
                }

                return redirect()->route('home');
            }
        } catch (ValidationException $e) {
            return redirect()->intended(route('login'))->with('error', $e->getMessage());
        } catch (\Throwable $th) {
            return redirect()->intended(route('login'))->with('error', 'Check your email and password!');
        }
    }
    function register()
    {
        return view('auth.register');
    }
    function registerPost(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email|max:255',
                'password' => 'required|string|min:8|confirmed',
            ], [
                // Error message for 'name'
                'name.required' => 'Name must be filled in.',
                'name.string' => 'Name must be text.',
                'name.max' => 'The name cannot exceed 255 characters.',

                // Error message for 'email'
                'email.required' => 'Email must be filled in.',
                'email.email' => 'Invalid email format.',
                'email.unique' => 'Email already registered. Use another email.',
                'email.max' => 'Email cannot exceed 255 characters.',

                // Error message for 'password'
                'password.required' => 'Password must be filled in.',
                'password.string' => 'Password must be text.',
                'password.min' => 'Password must be at least 8 characters',
                'password.confirmed' => 'Password confirmation does not match.'
            ]);

            $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
            ]);

            return redirect()->intended(route('login'))->with('success', 'User created successfully');
        } catch (ValidationException $e) {
            return redirect()->intended(route('register'))->with('error', $e->getMessage());
        } catch (\Throwable $th) {
            return redirect()->intended(route('register'))->with('error', 'User created failed');
        }
    }
    function logout()
    {
        Auth::logout();
        return redirect()->intended(route('login'));
    }
}
