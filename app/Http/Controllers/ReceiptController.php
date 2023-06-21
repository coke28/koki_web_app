<?php

namespace App\Http\Controllers;

use App\Models\AuditLog;
use App\Models\Order;
use App\Models\Receipt;
use DB;
use Illuminate\Http\Request;

class ReceiptController extends Controller
{
    //
    public function listReceipt(Request $request)
    {
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        header('Access-Control-Allow-Headers: *');

        $tableColumns = array(
            'receipts.id',
            'receipts.receipt_date',
            'users.username',
            'total_orders',
            'total_deduction',
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

        $receipt = DB::table('receipts')
        ->join('users', 'receipts.user_id', '=', 'users.id')
        ->join('orders', 'orders.receipt_id', '=', 'receipts.id')
        ->select('receipts.id','receipts.receipt_date','users.username')
        ->selectRaw("COUNT(orders.id) AS 'total_orders'")
        ->selectRaw("SUM(orders.quantity_to_remove) AS 'total_deduction'")
        ->where('orders.deleted','0')
        ->where('receipts.deleted','0');
        

        $receipt = $receipt->where(function ($query) use ($search) {
            return $query->where('receipts.id', 'like', '%' . $search . '%')
              ->orWhere('users.username', 'like', '%' . $search . '%')
              ->orWhere('receipts.receipt_date', 'like', '%' . $search . '%');
          })
          ->groupBy('receipts.id','receipts.receipt_date','users.username')
          ->orderBy($tableColumns[$sortIndex], $sortOrder);

        $receiptsCount = $receipt->count();
        $receipt = $receipt->offset($offset)
            ->limit($limit)
            ->get();

        $result = [
            'recordsTotal'    => $receiptsCount,
            'recordsFiltered' => $receiptsCount,
            'data'            => $receipt,
        ];

        // reponse must be in  array
        return json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }

    public function deleteHarvest(Request $request)
    {
        $deleteHarvest = Receipt::where('id', $request->id)->where('deleted','0')->first();

      
        if(!empty($deleteHarvest)){
            $deleteBatches = Order::where('harvest_id', $request->id)->where('deleted','0')->get();
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
