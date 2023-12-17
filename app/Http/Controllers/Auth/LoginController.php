<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Log;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = RouteServiceProvider::HOME;
    protected $loginType;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->loginType = $this->checkLoginInput();
    }

    public function login(Request $request)
    {

        $this->validate($request, [
            'login' => 'required|string',
            'password' => 'required|string'
        ]);
        $credentials = [
            $this->loginType => $request->login,
            'password' => $request->password
        ];
        if (Auth::attempt($credentials)) {
            if (\request()->ajax()) {
                $toJson = Auth::user()->getShortObj();
                Log::apiLogin();
                $token = $request->user()->createToken('auth-token')->plainTextToken;
                return response()->json(['token' => $token, 'user' => $toJson]);
            } else {
                Log::login();
                return redirect()->intended($this->redirectTo);
            }
        }
        if (\request()->ajax()) {
            $err = ['status' => '401'];
            return response()->json($err, 401);
        } else {
            return redirect()->back()
                ->withInput()
                ->withErrors([
                    'login' => 'Ваш обліковий запис не знайдено в системі'
                ]);
        }

    }


    protected function checkLoginInput()
    {
        $inputData = request()->get('login');
        return filter_var($inputData, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';
    }
}
