<?php

namespace App\Http\Controllers;

use auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //GET
        return view('Posts_CRUD.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //GET
        return view('users.registration');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //POST
        $formFields = $request->validate([
            'name' => ['required', 'min:3', 'max:255'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'min:8', 'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/']
        ]);
        //Hash Password
        $formFields['password'] = bcrypt($request->post('password'));
        $user = User::create($formFields);
        if ($user) {
            return redirect()->route('users.loginUser')->withSuccess(__('User created successfully.'));
        } else {
            return redirect()->route('users.loginUser')->withFailure(__('Something went wrong, please try again.'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function loginUser()
    {
        return view('users.login');
    }

    public function loginAuthenticate(Request $request)
    {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']

        ]);
        // $userInfo = User::where('email', $formFields['email'])->first();
        // dd($userInfo);
     // $decrypted = bcrypt($userInfo->password);

        // dd($decrypted);
        // $pass= Hash::check($userInfo['password'],$decrypted);
        // dd($pass);

        /*if (!$userInfo) {

            return back()->withFailure(__("We don't recognize your email address."));
        } else {
            if (Hash::check($userInfo['password'],bcrypt($userInfo->password))) {

                $request->session()->put('loggedUser', $userInfo->id);

                return redirect()->route('home.index')->withSuccess(__('Logged in successfully.'));
            } else {
                return back()->withFailure(__("Incorrect password."));
            }
        }*/

        // return $formFields;
        if(auth()->attempt($formFields)){
            $request->session()->regenerate();
            return redirect()->route('home.index')->withSuccess(__('Logged in successfully.'));
        }else {
            return back()->withErrors(['email'=> 'invalid Credentials'])->onlyInput('email');
        }

    }


    public function logOut(Request $request){
        // if(session()->has('loggedUser')){
        // $request->session()->pull('loggedUser');
        // return back()->withSuccess(__('Logged out successfully.'));
        // }

        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return back()->withSuccess(__('Logged out successfully.'));
    }
}
