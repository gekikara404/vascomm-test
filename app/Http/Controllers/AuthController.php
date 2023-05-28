<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\Users\UsersInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public $users;

    public function __construct(UsersInterface $users)
    {
        $this->users = $users;
    }

    public function loginView()
    {
        return view('auth.login');
    }

    public function registerView()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validate = Validator::make($request->all() ,[
            'email'     => 'required|email',
            'name'      => 'required',
            'password'  => 'required|min:8|confirmed',
            'file'      => 'required|mimes:jpg,png,jpeg|max:2048'
        ]);
    
        if ($validate->fails()) {
            return redirect()->back();
        }
    
        DB::beginTransaction();
        try {
            $input = $request->all();
            $file = $request->file('file');
            $fileName = storeImages('public/images/user/',$file);
            $input['profile_pictures'] = $fileName;
            $input['password'] = bcrypt($request->password); // Menggunakan bcrypt untuk mengenkripsi password
            $user = $this->users->registerUsers($input);
            Auth::loginUsingId($user->id);
            DB::commit();
            return redirect()->intended(route('home'));
        } catch (\Exception $err) {
            DB::rollBack();
            return redirect()->back();
        }
    }
    


    public function loginProcess(Request $request)
    {
        $validate = Validator::make($request->all() ,[
            'email'     => 'required',
            'password'  => 'required',
        ]);

        if ($validate->fails()) {
            return redirect()->back();
        }

        $remember = $request->has('remember') ? true : false;
        
        $data = [
            'email'  => $request->email,
            'password'  => $request->password,
        ];

        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return redirect()->back();
        } else {
            if (Auth::attempt($data, $remember)) {
                return redirect()->intended(route('home'));
            }
            return redirect()->back();
        }
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->intended(route('home'));
    }
}
