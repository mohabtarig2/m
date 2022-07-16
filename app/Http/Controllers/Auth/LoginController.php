<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request as HttpRequest;
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

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


       protected function authenticated(Request $request , $user)
        {
           // $token = $user->createToken('my-app-token');


                if($request->isXmlHttpRequest()){
                    return response(null,204);

                }
        }

        

        // public function login(Request $request)
        // {   
        //     $input = $request->all();
      
        //     $this->validate($request, [
        //         'identify' => 'required',
        //         'password' => 'required',
        //     ]);
      
        //     $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'mobile';
        //     if(auth()->attempt(array($fieldType => $input['identify'], 'password' => $input['password'])))
        //     {
        //         return redirect()->route('home');
        //     }else{
        //         return redirect()->route('login')
        //             ->with('error','Email-Address And Password Are Wrong.');
        //     }
              
        // }
    public function username()
    {
       $value = request() -> input('identify');
       $filed = filter_var($value,FILTER_VALIDATE_EMAIL) ?  'email' : 'mobile';
        request()->merge([$filed => $value]);
        return $filed;

    }

    protected function loggedOut(Request $request)
    {
        if ($request->isXmlHttpRequest()) {
            return response(null, 204);
        }
    }


}
