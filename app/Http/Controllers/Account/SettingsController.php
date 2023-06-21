<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;

use App\Models\User;

use App\Http\Requests\Account\SettingsEmailRequest;
use App\Http\Requests\Account\SettingsInfoRequest;
use App\Http\Requests\Account\SettingsPasswordRequest;
use App\Models\AuditLog;
use Auth;
// use App\Models\UserInfo;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $info = auth()->user()->info;

        // // get the default inner page
        return view('pages.account.settings.settings', compact('info'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $user
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(SettingsInfoRequest $request)
    {
        // save user name
        $validated = $request->validate([
            'first_name'    => 'required|string|max:255',
            'middle_name'   => 'nullable|string|max:255',
            'last_name'     => 'required|string|max:255',
            'email'         => 'required|email',
            'mobile'        => 'required|numeric|digits:11',
            // 'address'       => 'nullable|string|max:255',
            // 'city'          => 'nullable|string|max:255',
            // 'province'      => 'nullable|string|max:255',
            // 'country'       => 'nullable|string|max:255',
            'birthdate'     => 'nullable|string|max:255',
            'age'           => 'nullable|numeric',
            
        ]);
        $user = User::where('id', $request->id)->first();
        if (!empty($request->file('avatar')) &&  $request->file('avatar') != null) {
            Log::info('File is not empty and is not null.');
            if (\File::exists(public_path($user->avatar))) {
              \File::delete(public_path($user->avatar));
            }
            $avatar =  $request->file('avatar');
            $filename = date('ymd') . strtoupper(Str::random(15)) . '.' . strtolower($avatar->getClientOriginalExtension());
            Image::make($avatar)->save(storage_path('app/public/avatars/' . $filename));
            $user->avatar = 'storage/avatars/' . $filename;
            $user->save();
          } else {
            Log::info('File is empty and is null.');
          }

          $auditLog = new AuditLog();
          $auditLog->agent = auth()->user()->id;
          $auditLog->action = "Updated User Info";
          $auditLog->table = "users";
          $auditLog->nID =$user->id . " | " . $request->first_name . " | " . $request->middle_name . " | " . $request->last_name . " | " 
          . $request->email . " | " . $request->mobile . " | " . $request->birthdate. " | " .$request->age;
          $auditLog->ip = \Request::ip();
          $auditLog->save();
        auth()->user()->update($validated);

       
        
        // save on user info
        // $info = UserInfo::where('user_id', auth()->user()->id)->first();

        // if ($info === null) {
        //     // create new model
        //     $info = new UserInfo();
        // }

        // // $info->first_name       = $request->first_name;
        // // $info->middle_name      = $request->middle_name;
        // // $info->last_name        = $request->last_name;
        // // $info->email            = $request->email;
        // // $info->mobile           = $request->mobile;
        // // $info->address          = $request->address;
        // // $info->birthdate        = $request->birthdate;
        // // $info->age              = $request->age;

        // // attach this info to the current user
        // $info->user()->associate(auth()->user());

        // foreach ($request->only(array_keys($request->rules())) as $key => $value) {
        //     if (is_array($value)) {
        //         $value = serialize($value);
        //     }
        //     $info->$key = $value;
        // }

        // // include to save avatar
        // if ($avatar = $this->upload()) {
        //     $info->avatar = $avatar;
        // }

        // if ($request->boolean('avatar_remove')) {
        //     Storage::delete($info->avatar);
        //     $info->avatar = null;
        // }

        // $info->save();

        // return redirect()->back();
    }

    /**
     * Function for upload avatar image
     *
     * @param  string  $folder
     * @param  string  $key
     * @param  string  $validation
     *
     * @return false|string|null
     */
    public function upload($folder = 'images', $key = 'avatar', $validation = 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|sometimes')
    {
        request()->validate([$key => $validation]);

        $file = null;
        if (request()->hasFile($key)) {
            $file = Storage::disk('public')->putFile($folder, request()->file($key), 'public');
        }

        return $file;
    }

    /**
     * Function to accept request for change email
     *
     * @param  SettingsEmailRequest  $request
     */
    // public function changeEmail(SettingsEmailRequest $request)
    // {
    //     // prevent change email for demo account
    //     if ($request->input('current_email') === 'demo@demo.com') {
    //         return redirect()->intended('account/settings');
    //     }

    //     auth()->user()->update(['email' => $request->input('email')]);

    //     if ($request->expectsJson()) {
    //         return response()->json($request->all());
    //     }

    //     return redirect()->intended('account/settings');
    // }

    /**
     * Function to accept request for change password
     *
     * @param  SettingsPasswordRequest  $request
     */
    public function changePassword(Request $request)
    {
        // prevent change password for admin account
        // if ($request->input('current_email') === 'rvnapp@gmail.com') {
        //     return redirect()->intended('account/settings');
        // }

        auth()->user()->update(['password' => Hash::make($request->input('password'))]);

        // if ($request->expectsJson()) {
        //     return response()->json($request->all());
        // }

        // auth()->logout();
        // Session::flush();
        
        // Auth::logout();

        // return redirect('login');
        // return redirect()->route('logout');
        $user = User::where('id', auth()->user()->id)->where('deleted', '0')->first();
        if (!empty($user)) {
            $user->online = "0";
            $user->save();
        } else {
            return "something went wrong";
        }
        //Add Log
        $auditLog = new AuditLog();
        $auditLog->agent = auth()->user()->id;
        $auditLog->action = "Changed Password";
        $auditLog->table = "users";
        $auditLog->nID ="Password was changed for user with id : ". $user->id;
        $auditLog->ip = \Request::ip();
        $auditLog->save();
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
