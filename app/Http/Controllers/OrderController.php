<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function listOrder(Request $request)
  {
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
    header('Access-Control-Allow-Headers: *');

    $tableColumns = array(
    'orders.id',
    'orders.batch_id',
    'orders.quantity_to_remove',
    'orders.quantity_batch',
    'orders.quantity_left',
    'buildings.building_name', 
    'products.product_name'
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

    $orders = DB::table('orders')
      ->join('receipts', 'orders.receipt_id', '=', 'receipts.id')
      ->join('buildings', 'orders.building_id', '=', 'buildings.id')
      ->join('products', 'products.id', '=', 'orders.product_id')
      ->select('orders.id','orders.batch_id','orders.quantity_to_remove', 'orders.quantity_batch', 'orders.quantity_left', 'buildings.building_name', 'products.product_name')
      ->where('orders.deleted', '0')
      ->where('receipts.deleted', '0')
      ->where('receipts.id', '=', $request->id);

    $orders = $orders->where(function ($query) use ($search) {
      return $query->where('orders.id', 'like', '%' . $search . '%')
        ->orWhere('orders.batch_id', 'like', '%' . $search . '%')
        ->orWhere('buildings.building_name', 'like', '%' . $search . '%')
        ->orWhere('products.product_name', 'like', '%' . $search . '%');
    })
      ->orderBy($tableColumns[$sortIndex], $sortOrder);


    $ordersCount = $orders->count();
    $orders = $orders->offset($offset)
      ->limit($limit)
      ->get();

    $result = [
      'recordsTotal'    => $ordersCount,
      'recordsFiltered' => $ordersCount,
      'data'            => $orders,
    ];

    // reponse must be in  array
    return json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
  }
}
