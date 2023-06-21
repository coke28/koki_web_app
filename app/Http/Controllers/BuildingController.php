<?php

namespace App\Http\Controllers;

use App\Models\AuditLog;
use App\Models\Building;
use Illuminate\Http\Request;

class BuildingController extends Controller
{
    //
    public function listBuildings(Request $request)
    {
      header('Content-Type: application/json');
      header('Access-Control-Allow-Origin: *');
      header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
      header('Access-Control-Allow-Headers: *');
  
      $tableColumns = array(
        'id',
        'building_name',
        'building_description',
        'location',
        'remark',
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

  
      $buildings = Building::where('deleted', '0');
      $buildings = $buildings->where(function ($query) use ($search) {
        return $query->where('id', 'like', '%' . $search . '%')
          ->orWhere('building_name', 'like', '%' . $search . '%')
          ->orWhere('building_description', 'like', '%' . $search . '%')
          ->orWhere('remark', 'like', '%' . $search . '%')
          ->orWhere('location', 'like', '%' . $search . '%');
      })
        ->orderBy($tableColumns[$sortIndex], $sortOrder);
      $buildingCount = $buildings->count();
      $buildings = $buildings->offset($offset)
        ->limit($limit)
        ->get();
  
      foreach ($buildings as $p) {
  
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

      foreach ($buildings as $p) {
  
        switch ($p->location) {
          case "0":
            // code block
            $p->location = "Mobile Application";
            break;
          case "1":
            // code block
            $p->location = "Web Application";
            break;
          default:
            // code block
        }
      }
  
      $result = [
        'recordsTotal'    => $buildingCount,
        'recordsFiltered' => $buildingCount,
        'data'            => $buildings,
      ];
  
      // reponse must be in  array
      return json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }
  
    public function addBuilding(Request $request)
    {
      $buildings = Building::where('building_name', $request->building_name)->where('deleted', '0')->get()->count();
      // ->where('deleted', '0')
      if ($buildings > 0) {
        return json_encode(array(
          'success' => false,
          'message' => 'Building Name already in use.'
        ));
      }
  
      $buildings = new Building();
      $buildings->building_name = $request->building_name;
      $buildings->building_description = $request->building_description;
      $buildings->status = $request->status;
      $buildings->location = $request->location;
      $buildings->remark = $request->remark;
      $buildings->save();
  
      $auditLog = new AuditLog();
      $auditLog->user = auth()->user()->id;
      $auditLog->action = "Added Building";
      $auditLog->table = "buildings";
      $auditLog->nID = json_encode($buildings->attributesToArray());
      $auditLog->ip_address = \Request::ip();
      $auditLog->save();
  
      return json_encode(array(
        'success' => true,
        'message' => 'Building added successfully.'
      ));
    }
  
    public function getEditBuilding(Request $request)
    {
      $getBuilding = Building::where('id', $request->id)->first();
      return json_encode($getBuilding);
    }
  
    public function editBuilding(Request $request)
    {
  
      $buildings = Building::where('building_name', $request->building_name)->where('id', '!=', $request->id)->where('deleted', '0')->get()->count();
      // ->where('deleted', '0')
    
      // dd($productName);
      if ($buildings > 0) {
        return json_encode(array(
          'success' => false,
          'message' => 'Building already in use.'
        ));
      }
  
  
      $buildings = Building::where('id', $request->id)->first();
      if (!empty($buildings) || $buildings != null) {
  
        $buildings->building_name = $request->building_name;
        $buildings->building_description = $request->building_description;
        $buildings->status = $request->status;
        $buildings->remark = $request->remark;
        $buildings->location = $request->location;
        $buildings->save();
    
        $auditLog = new AuditLog();
        $auditLog->user = auth()->user()->id;
        $auditLog->action = "Edited Building";
        $auditLog->table = "buildings";
        $auditLog->nID = json_encode($buildings->attributesToArray());
        $auditLog->ip_address = \Request::ip();
        $auditLog->save();

        return json_encode(array(
          'success' => true,
          'message' => 'Building updated successfully.'
        ));
      } else {
        return json_encode(array(
          'success' => false,
          'message' => 'Building not found.'
        ));
      }
    }
  
    public function deleteBuilding(Request $request)
    {
      $deleteBuilding = Building::where('id', $request->id)->first();
  
      if ($deleteBuilding) {
  
  
        $deleteBuilding->deleted = 1;
        $deleteBuilding->save();
  
        $auditLog = new AuditLog();
        $auditLog->user = auth()->user()->id;
        $auditLog->action = "Deleted ID #" . " $deleteBuilding->id " . "Building";
        $auditLog->table = "buildings";
        $auditLog->nID = "Deleted =" . $deleteBuilding->deleted;
        $auditLog->ip_address = \Request::ip();
        $auditLog->save();
        return 'Building deleted successfully.';
      } else {
  
        return 'Building deleted unsuccessfully.';
      }
    }
}
