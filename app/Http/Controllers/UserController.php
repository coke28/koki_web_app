<?php

namespace App\Http\Controllers;

use App\Models\AuditLog;
use App\Models\User;
use App\Models\UserRole;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
// use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManager;
use Intervention\Image\Facades\Image as Image;
use Throwable;

class UserController extends Controller
{
  //
  public function listUsers(Request $request)
  {
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
    header('Access-Control-Allow-Headers: *');

    $tableColumns = array(
      'id',
      'username',
      'first_name',
      'last_name',
      'user_role_id',
      'contact_number',
      'email',
    );

    // offset and limit
    $offset = 0;
    $limit = 10;
    if (isset($request->length)) {
      $offset = isset($request->start) ? $request->start : $offset;
      $limit = isset($request->length) ? $request->length : $limit;
    }

    // searchText
    $search = '';
    if (isset($request->search) && isset($request->search['value'])) {
      $search = $request->search['value'];
    }

    // ordering
    $sortIndex = 0;
    $sortOrder = 'desc';
    if (isset($request->order) && isset($request->order[0]) && isset($request->order[0]['column'])) {
      $sortIndex = $request->order[0]['column'];
    }
    if (isset($request->order) && isset($request->order[0]) && isset($request->order[0]['dir'])) {
      $sortOrder = $request->order[0]['dir'];
    }

    // $users = User::where('deleted', '0')->where('username', '!=', "root");

    $users = DB::table('users')
    ->join('user_roles', 'users.user_role_id', '=', 'user_roles.id')
    ->select('users.*', 'user_roles.user_role')
    ->where('users.deleted', '0')
    ->where('username', '!=', "root");
  

    // $users = User::where('deleted', '0');
    $users = $users->where(function ($query) use ($search) {
      return $query->where('username', 'like', '%' . $search . '%')
        ->orWhere('first_name', 'like', '%' . $search . '%')
        ->orWhere('last_name', 'like', '%' . $search . '%')
        ->orWhere('contact_number', 'like', '%' . $search . '%')
        ->orWhere('email', 'like', '%' . $search . '%');
    })
      ->orderBy($tableColumns[$sortIndex], $sortOrder);
    $usersCount = $users->count();
    $users = $users->offset($offset)
      ->limit($limit)
      ->get();


    $result = [
      'recordsTotal'    => $usersCount,
      'recordsFiltered' => $usersCount,
      'data'            => $users,
    ];

    // reponse must be in  array
    return json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
  }


  public function checkUser($username, $type, $id = 0)
  {
    // $toCheck = strtolower($username);
    $toCheck = $username;
    $checkExist = 0;
    if ($type == 'add') {
      // $checkExist = User::whereRaw('LOWER(`username`) = "'.$toCheck.'"')->where('deleted', '0')->count();
      // dd($checkExist = User::where('username', $toCheck)->where('deleted', '0')->count());
      if (User::where('username', $toCheck)->where('deleted', '0')->count() > 0){
        $checkExist = 1;
        // dd("in yor");
      }

      //If deleted user has the same username
      if (User::where('username', $toCheck)->where('deleted', '1')->count() > 0) {
        $checkExist = 2;
      }
    }

    if ($type == 'edit') {
      // $checkExist = User::whereRaw('LOWER(`username`) = "'.$toCheck.'"')->where('id', '!=', $id)->where('deleted', '0')->count();
      $checkExist = User::where('username', $toCheck)->where('id', '!=', $id)->where('deleted', '0')->count();
      //If deleted user has the same username
      if (User::where('username', $toCheck)->where('id', '!=', $id)->where('deleted', '1')->count() > 0) {
        //
        $checkExist = 2;
      }
    }
    // dd($checkExist);
    return $checkExist;
  }

  public function addUser(Request $request)
  {
   
    $username = trim($request->username);
    if ($this->checkUser($username, 'add') > 0) {
      if ($this->checkUser($username, 'add') == 2) {
        return json_encode(array(
          'success' => false,
          'message' => 'Username already in use by a deactivated user.'
        ));
      } else {
        return json_encode(array(
          'success' => false,
          'message' => 'Username already in use.'
        ));
      }
    }

    $user = new User();
    $user->username = $username;
    $user->password = Hash::make($request->password);
    $user->first_name = $request->first_name;
    $user->middle_name = $request->middle_name;
    $user->last_name = $request->last_name;
    $user->email = $request->email;
    $user->user_role_id =  $request->user_role_id;
    $user->contact_number = $request->contact_number;
    // $user->avatar = $request->file;
    if(!empty($request->file)){
      try {
        $avatar = $request->file;
        $filename = date('ymd') . strtoupper(Str::random(15)) . '.' . strtolower($avatar->getClientOriginalExtension());
        Image::make($avatar)->save(storage_path('app/public/avatars/' . $filename));
        $user->avatar = 'storage/avatars/' . $filename;
      } catch (Throwable $e) {
        return json_encode(array(
          'success' => false,
          'message' => 'Image Type not supported.' . $e
        ));
      }
    }
    $user->save();

    $auditLog = new AuditLog();
    $auditLog->user = auth()->user()->id;
    $auditLog->action = "Added User";
    $auditLog->table = "users";
    $auditLog->nID = json_encode($user->attributesToArray());
    $auditLog->ip_address = \Request::ip();
    $auditLog->save();

    return json_encode(array(
      'success' => true,
      'message' => 'User added successfully.'
    ));
  }

  public function getEditUser(Request $request)
  {
    // $getUser = User::where('id', $request->id)->first();

    $getUser = DB::table('users')
    ->join('user_roles', 'users.user_role_id', '=', 'user_roles.id')
    ->select('users.*', 'user_roles.id AS "user_role_id"')
    ->where('users.deleted', '0')
    ->where('users.username', '!=', "root")
    ->where('users.id', $request->id)
    ->first();
    // dd($getUser);
    // $getUser = DB::table('users')
    // ->join('user_roles', 'users.user_role_id', '=', 'user_roles.id')
    // ->select('users.*', 'user_roles.user_role')
    // ->where('id', $request->id)->first();
    return json_encode($getUser);
  }

  public function editUser(Request $request)
  {

    if ($this->checkUser($request->username, 'edit', $request->id) > 0) {
      if ($this->checkUser($request->username, 'edit') == 2) {
        return json_encode(array(
          'success' => false,
          'message' => 'Username already in use by a deactivated user.'
        ));
      } else {
        return json_encode(array(
          'success' => false,
          'message' => 'Username already in use.'
        ));
      }
    }
    $user = User::where('id', $request->id)->first();

    if (!empty($user) || $user != null) {
      $user->username = $request->username;
      if (!empty($request->password) && $request->password != null) {
        Log::info('password is not empty and is not null.');
        $user->password = Hash::make($request->password);
      } else {
        Log::info('password is empty and is null.');
      }

      if (!empty($request->file) && $request->file != null) {
        Log::info('File is not empty and is not null.');
        if (\File::exists(public_path($user->avatar))) {
          \File::delete(public_path($user->avatar));
        }

        try {
          $avatar = $request->file;
          $filename = date('ymd') . strtoupper(Str::random(15)) . '.' . strtolower($avatar->getClientOriginalExtension());
          Image::make($avatar)->save(storage_path('app/public/avatars/' . $filename));
          $user->avatar = 'storage/avatars/' . $filename;
        } catch (Throwable $e) {
          return json_encode(array(
            'success' => false,
            'message' => 'Image Type not supported.' . $e
          ));
        }
      } else {
        Log::info('File is empty and is null.');
      }
      
      $user->username = $request->username;
      $user->first_name = $request->first_name;
      $user->middle_name = $request->middle_name;
      $user->last_name = $request->last_name;
      $user->email = $request->email;
      $user->user_role_id =  $request->user_role_id;
      $user->contact_number = $request->contact_number;
      $user->save();

      $auditLog = new AuditLog();
      $auditLog->user = auth()->user()->id;
      $auditLog->action = "Edited User";
      $auditLog->table = "users";
      $auditLog->nID = json_encode($user->attributesToArray());
      $auditLog->ip_address = \Request::ip();
      $auditLog->save();

      return json_encode(array(
        'success' => true,
        'message' => 'User updated successfully.'
      ));
    } else {

      return json_encode(array(
        'success' => false,
        'message' => 'User not found.'
      ));
    }
  }

  public function deleteUser(Request $request)
  {
    $deleteUser = User::where('id', $request->id)->first();
    if ($deleteUser) {

      if (\File::exists(public_path($deleteUser->avatar))) {
        \File::delete(public_path($deleteUser->avatar));
        $deleteUser->avatar = null;
        $deleteUser->deleted = 1;
        $deleteUser->save();

        $auditLog = new AuditLog();
        $auditLog->user = auth()->user()->id;
        $auditLog->action = "Deleted ID #" . " $deleteUser->id " . "User";
        $auditLog->table = "users";
        $auditLog->nID = "Deleted =" . $deleteUser->deleted;
        $auditLog->ip_address = \Request::ip();
        $auditLog->save();
        return 'User deleted successfully.';
      }     
    } else {
      return 'User not found.';
    }
  }
}
