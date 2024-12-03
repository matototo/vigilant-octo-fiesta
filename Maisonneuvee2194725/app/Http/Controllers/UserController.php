<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Models\Student;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::select()
                ->orderby('name')
                ->paginate(10);

        return view('user.index', ["users" => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Student::all();
        return view('user.create', ['students' => $students]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users|exists:students',
            'password' => [ 
            'required', 
            'max:20', 
            'min:6',
            Password::min(2) 
            ->letters() 
            ->mixedCase() 
            ->numbers() , 
            'confirmed', ],
            'password_confirmation' => 'required',
            ]);

        $user = new User;
        $user->fill($request->all());
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect(route('user.index'))->withSuccess('User created successfully !');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $categories = Category::categories();
        $articles = Article::select()->where('user_id', '=', $user->id)->get();
        return view('user.show', ['user' => $user, 'articles' => $articles], compact('categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('user.edit', ['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|unique:users',
        ]); 

        $user->update([
            'name' => $request->name,
            'username' => $request->username,
        ]);

        return redirect()->route('user.show', $user->id)->with('success', 'User # '.$user->id.' : '.$user->name.' updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }

    public function forgot(){
        return view('user.forgot');
    }

    public function email(Request $request){
        $request->validate([
            'email' => 'required|email|exists:users'
        ]);
        $user = User::where('email', $request->email)->first();
        $userId = $user->id;
        $tempPassword = str::random(45);
        $user->temp_password =  $tempPassword;
        $user->save();
        $to_name = $user->name;
        $to_email = $request->email;
        $body="<a href='".route('user.reset', [$userId,$tempPassword])."'>Click here to reset  your password</a>";
    
        Mail::send('user.mail', ['name'=>$to_name,'body' => $body],
            function($message) use ($to_email)
            {
               $message->to($to_email)->subject('Reset Password');
            });
       return redirect(route('login'))->withSuccess('Please check your email to reset your password!');   
    }

    public function reset(User $user, $token) {
        if ($user->temp_password === $token) {

            return view ('user.reset');
        }
        return redirect(route('user.forgot'))->withErrors('Credentials does not match');   
    }

    public function resetUpdate(User $user, $token, Request $request) {
        if ($user->temp_password === $token) {
            $request->validate([
                'password' => 'required|min:6|confirmed',
            ]);
            $user->password = Hash::make($request->password);
            $user->temp_password = NULL;
            $user->save();
            return redirect(route('login'))->withSuccess('Password changed with success');  
        }
        return redirect(route('user.forgot'))->withErrors('Credentials does not match');   
    }
}
