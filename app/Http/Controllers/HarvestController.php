<?php

namespace App\Http\Controllers;

use App\Models\AuditLog;
use App\Models\Batch;
use App\Models\Harvest;
use DB;
use Illuminate\Http\Request;

class HarvestController extends Controller
{
    //
    public function listHarvest(Request $request)
    {
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        header('Access-Control-Allow-Headers: *');

        $tableColumns = array(
            'harvests.id',
            'harvest_name',
            'harvest_date',
            'username',
            'total_stock',
            'current_stock',
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

        if (isset($request->statusFilter)) {
            $statusFilter = $request->statusFilter;
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

        $harvests = DB::table('harvests')
        ->join('users', 'harvests.user_id', '=', 'users.id')
        ->join('batches', 'batches.harvest_id', '=', 'harvests.id')
        ->select('harvests.id','harvests.harvest_name', 'harvests.harvest_date', 'users.username')
        ->selectRaw("SUM(batches.quantity) AS 'total_stock'")
        ->selectRaw("SUM(batches.quantity_out) AS 'current_stock'")
        ->where('harvests.deleted','0')
        ->where('batches.deleted','0');
        

        $harvests = $harvests->where(function ($query) use ($search) {
            return $query->where('harvests.id', 'like', '%' . $search . '%')
              ->orWhere('harvest_date', 'like', '%' . $search . '%')
              ->orWhere('harvest_name', 'like', '%' . $search . '%');
          })
          ->groupBy('harvests.id','harvests.harvest_name', 'harvests.harvest_date', 'users.username')
          ->orderBy($tableColumns[$sortIndex], $sortOrder);

        $harvestsCount = $harvests->count();
        $harvests = $harvests->offset($offset)
            ->limit($limit)
            ->get();

        $result = [
            'recordsTotal'    => $harvestsCount,
            'recordsFiltered' => $harvestsCount,
            'data'            => $harvests,
        ];

        // reponse must be in  array
        return json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }

    public function deleteHarvest(Request $request)
    {
        $deleteHarvest = Harvest::where('id', $request->id)->where('deleted','0')->first();

      
        if(!empty($deleteHarvest)){
            $deleteBatches = Batch::where('harvest_id', $request->id)->where('deleted','0')->get();
            if (!empty($deleteBatches)){
                foreach ($deleteBatches as $deleteBatch) {

                    $deleteBatch->deleted = 1;
                    $deleteBatch->save();
                }
                $deleteHarvest->deleted = 1;
                $deleteHarvest->save();

                $auditLog = new AuditLog();
                $auditLog->user = auth()->user()->id;
                $auditLog->action = "Deleted ID #" . " $deleteHarvest->id " . "Harvest";
                $auditLog->table = "harvests";
                $auditLog->nID = "Deleted =" . $deleteHarvest->deleted;
                $auditLog->ip_address = \Request::ip();
                $auditLog->save();

                return 'Harvest deleted successfully.';

            }else{
                'Batch already deleted';
            }
        }else{
            return 'Harvest already deleted';
        }
        
       
        
        
    }
}
