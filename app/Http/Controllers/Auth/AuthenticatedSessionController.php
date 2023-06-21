<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\AuditLog;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use DB;
use Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        
        $request->authenticate();
        $user = User::where('id', auth()->user()->id)->where('deleted', '0')->first();
        if (!empty($user)) {
            $user->online = "1";
            $user->save();
        }
       
        $request->session()->regenerate();
        $auditLog = new AuditLog();
        $auditLog->user = auth()->user()->id;
        $auditLog->action = "Logged in";
        $auditLog->table = "";
        $auditLog->nID = "username: " . auth()->user()->username;
        $auditLog->ip_address = \Request::ip();
        $auditLog->save();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        $user = User::where('id', auth()->user()->id)->where('deleted', '0')->first();
        if (!empty($user)) {
            $user->online = "0";
            $user->save();

            $auditLog = new AuditLog();
            $auditLog->user = auth()->user()->id;
            $auditLog->action = "Logged Out";
            $auditLog->table = "";
            $auditLog->nID = "username: " . auth()->user()->username;
            $auditLog->ip_address = \Request::ip();
            $auditLog->save();
        } else {
            return "something went wrong";
        }

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function loginMobileApp(Request $request)
    {
        // $user = User::where('username', $request->username)->where('deleted','0')->first();

        $user = DB::table('users')
            ->join('user_roles', 'users.user_role_id', '=', 'user_roles.id')
            ->select('users.*', 'user_roles.application_access')
            ->where('users.deleted', '0')
            ->where('username',$request->username)->first();

            // $result = [
            //     'res' => json_encode($user),
            //     'success' => false,
            // ];
    
            // return json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);

        // check if user is deleted or if password does not match 
        if (!empty($user) && $user != null) {
            if ($user->deleted === '1') {
                $result = [
                    'res' => "User is deactivated or deleted!",
                    'success' => false,
                ];
                return json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
            } 
            if(!Hash::check($request->password, $user->password)){
                $result = [
                    'res' => "Incorrect Password",
                    'success' => false,
                ];
                return json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
            }

            if($user->application_access == 1){
                $result = [
                    'res' => "User does not have access to this application",
                    'success' => false,
                ];
                return json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
            }
            
        } else {

            $result = [
                'res' => "User does not exist",
                'success' => false,
            ];
            return json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        }
        $result = [
            'username'    => $request->username,
            'res' => "Login successful!"." Welcome ".$user->first_name." ".$user->last_name,
            'success' => true,
        ];

        return json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }
}
