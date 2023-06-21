<?php

namespace App\Http\Controllers;

use App\Models\AuditLog;
use App\Models\UserRole;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    //
    public function listUserRoles(Request $request)
    {
      header('Content-Type: application/json');
      header('Access-Control-Allow-Origin: *');
      header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
      header('Access-Control-Allow-Headers: *');
  
      $tableColumns = array(
        'id',
        'user_role',
        'application_access',
        'user_role_description',
        'status'
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

  
      $userRole = UserRole::where('deleted', '0');
      $userRole = $userRole->where(function ($query) use ($search) {
        return $query->where('id', 'like', '%' . $search . '%')
          ->orWhere('user_role', 'like', '%' . $search . '%')
          ->orWhere('user_role_description', 'like', '%' . $search . '%')
          ->orWhere('id', 'like', '%' . $search . '%');
      })
        ->orderBy($tableColumns[$sortIndex], $sortOrder);
      $userRoleCount = $userRole->count();
      $userRole = $userRole->offset($offset)
        ->limit($limit)
        ->get();
  
      foreach ($userRole as $p) {
  
        switch ($p->status) {
          case "0":
            // code block
            $p->status = "DISABLED";
            break;
          case "1":
            // code block
            $p->status = "ACTIVE";
            break;
          default:
            // code block
        }
      }

      foreach ($userRole as $p) {
  
        switch ($p->application_access) {
          case "0":
            // code block
            $p->application_access = "Mobile Application";
            break;
          case "1":
            // code block
            $p->application_access = "Web Application";
            break;
          case "2":
            // code block
            $p->application_access = "Mobile & Web Application";
            break;
          default:
            // code block
        }
      }
  
      $result = [
        'recordsTotal'    => $userRoleCount,
        'recordsFiltered' => $userRoleCount,
        'data'            => $userRole,
      ];
  
      // reponse must be in  array
      return json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }
  
    public function addUserRole(Request $request)
    {
      $userRole = UserRole::where('user_role', $request->user_role)->where('deleted', '0')->get()->count();
      // ->where('deleted', '0')
      if ($userRole > 0) {
        return json_encode(array(
          'success' => false,
          'message' => 'User Role already in use.'
        ));
      }
  
      $userRole = new UserRole();
      $userRole->user_role = $request->user_role;
      $userRole->user_role_description = $request->user_role_description;
      $userRole->status = $request->status;
      $userRole->application_access = $request->application_access;
      $userRole->save();
  
      $auditLog = new AuditLog();
      $auditLog->user = auth()->user()->id;
      $auditLog->action = "Added User Role";
      $auditLog->table = "user_role";
      $auditLog->nID = json_encode($userRole->attributesToArray());
      $auditLog->ip_address = \Request::ip();
      $auditLog->save();
  
      return json_encode(array(
        'success' => true,
        'message' => 'User Role added successfully.'
      ));
    }
  
    public function getEditUserRole(Request $request)
    {
      $getUserRole = UserRole::where('id', $request->id)->first();
      return json_encode($getUserRole);
    }
  
    public function editUserRole(Request $request)
    {
  
      $userRole = UserRole::where('user_role', $request->user_role)->where('id', '!=', $request->id)->where('deleted', '0')->get()->count();
      // ->where('deleted', '0')
    
      // dd($productName);
      if ($userRole > 0) {
        return json_encode(array(
          'success' => false,
          'message' => 'User Role already in use.'
        ));
      }
  
  
      $userRole = UserRole::where('id', $request->id)->first();
      if (!empty($userRole) || $userRole != null) {
  
        $userRole->user_role = $request->user_role;
        $userRole->user_role_description = $request->user_role_description;
        $userRole->status = $request->status;
        $userRole->application_access = $request->application_access;
        $userRole->save();
    
        $auditLog = new AuditLog();
        $auditLog->user = auth()->user()->id;
        $auditLog->action = "Edited User Role";
        $auditLog->table = "user_role";
        $auditLog->nID = json_encode($userRole->attributesToArray());
        $auditLog->ip_address = \Request::ip();
        $auditLog->save();

        return json_encode(array(
          'success' => true,
          'message' => 'User Role updated successfully.'
        ));
      } else {
        return json_encode(array(
          'success' => false,
          'message' => 'User Role not found.'
        ));
      }
    }
  
    public function deleteUserRole(Request $request)
    {
      $deleteUserRole = UserRole::where('id', $request->id)->first();
  
      if ($deleteUserRole) {
  
  
        $deleteUserRole->deleted = 1;
        $deleteUserRole->save();
  
        $auditLog = new AuditLog();
        $auditLog->user = auth()->user()->id;
        $auditLog->action = "Deleted ID #" . " $deleteUserRole->id " . "User Role";
        $auditLog->table = "user_role";
        $auditLog->nID = "Deleted =" . $deleteUserRole->deleted;
        $auditLog->ip_address = \Request::ip();
        $auditLog->save();
        return 'User Role deleted successfully.';
      } else {
  
        return 'User Role deleted unsuccessfully.';
      }
    }
}
