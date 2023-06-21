<?php

namespace App\Http\Controllers;

use App\Imports\GenericImport;
use App\Models\AuditLog;
use App\Models\Batch;
use App\Models\Building;
use App\Models\Harvest;
use App\Models\Product;
use DB;
use Excel;
use Illuminate\Http\Request;
use Response;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Storage;
use Throwable;

class BatchController extends Controller
{
  //
  public function listBatch(Request $request)
  {
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
    header('Access-Control-Allow-Headers: *');

    $tableColumns = array(
      'batches.id',
      'harvest_date',
      'building_name',
      'product_name',
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

    // ordering
    $sortIndex = 0;
    $sortOrder = 'desc';
    if (isset($request->order) && isset($request->order[0]) && isset($request->order[0]['column'])) {
      $sortIndex = $request->order[0]['column'];
    }
    if (isset($request->order) && isset($request->order[0]) && isset($request->order[0]['dir'])) {
      $sortOrder = $request->order[0]['dir'];
    }

    // $batches = DB::table('harvests')
    // ->join('batches', 'batches.harvest_id', '=', 'harvests.id')
    // ->join('buildings', 'batches.building_id', '=', 'buildings.id')
    // ->join('products', 'products.id', '=', 'batches.product_id')
    // ->select('batches.id','harvests.harvest_date', 'buildings.building_name','products.product_name')
    // ->selectRaw("SUM(batches.quantity) AS 'total_stock'")
    // ->selectRaw("SUM(batches.quantity_out) AS 'current_stock'")
    // ->where('harvests.deleted','0')
    // ->where('batches.deleted','0')
    // ->where('harvests.id','=', $request->id);

    $batches = DB::table('harvests')
      ->join('batches', 'batches.harvest_id', '=', 'harvests.id')
      ->join('buildings', 'batches.building_id', '=', 'buildings.id')
      ->join('products', 'products.id', '=', 'batches.product_id')
      ->select('batches.id', 'harvests.id as harvest_id', 'harvests.harvest_name', 'harvests.harvest_date', 'buildings.building_name', 'products.product_name')
      ->selectRaw("SUM(batches.quantity) AS 'total_stock'")
      ->selectRaw("SUM(batches.quantity_out) AS 'current_stock'")
      ->where('harvests.deleted', '0')
      ->where('batches.deleted', '0')
      ->where('harvests.id', '=', $request->id);

    $batches = $batches->where(function ($query) use ($search) {
      return $query->where('batches.id', 'like', '%' . $search . '%')
        ->orWhere('harvest_date', 'like', '%' . $search . '%')
        ->orWhere('product_name', 'like', '%' . $search . '%')
        ->orWhere('building_name', 'like', '%' . $search . '%');
    })
      ->groupBy('batches.id', 'harvests.id', 'harvests.harvest_name', 'harvests.harvest_date', 'buildings.building_name', 'products.product_name')
      ->orderBy($tableColumns[$sortIndex], $sortOrder);


    $batchCount = $batches->count();
    $batches = $batches->offset($offset)
      ->limit($limit)
      ->get();

    $result = [
      'recordsTotal'    => $batchCount,
      'recordsFiltered' => $batchCount,
      'data'            => $batches,
    ];

    // reponse must be in  array
    return json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
  }


  public function getEditBatch(Request $request)
  {
    $getBatch = Batch::where('id', $request->id)->first();
    return json_encode($getBatch);
  }


  public function editBatch(Request $request)
  {
    $batch = Batch::where('id', $request->id)->first();
    if (!empty($batch) || $batch != null) {

      $batch->building_id = $request->building;
      $batch->product_id = $request->product;
      $batch->quantity = $request->added_stock;
      $batch->quantity_out = $request->current_stock;

      $batch->save();

      $auditLog = new AuditLog();
      $auditLog->user = auth()->user()->id;
      $auditLog->action = "Edited Batch";
      $auditLog->table = "batches";
      $auditLog->nID = json_encode($batch->attributesToArray());
      $auditLog->ip_address = \Request::ip();
      $auditLog->save();

      return json_encode(array(
        'success' => true,
        'message' => 'Batch updated successfully.'
      ));
    } else {
      return json_encode(array(
        'success' => false,
        'message' => 'Batch not found.'
      ));
    }
  }

  public function deleteBatch(Request $request)
  {
    $deleteBatch = Batch::where('id', $request->id)->first();

    if ($deleteBatch) {


      $deleteBatch->deleted = 1;
      $deleteBatch->save();

      $auditLog = new AuditLog();
      $auditLog->user = auth()->user()->id;
      $auditLog->action = "Deleted ID #" . " $deleteBatch->id " . "Batch";
      $auditLog->table = "batches";
      $auditLog->nID = "Deleted =" . $deleteBatch->deleted;
      $auditLog->ip_address = \Request::ip();
      $auditLog->save();
      return 'Batch deleted successfully.';
    } else {

      return 'Batch deleted unsuccessfully.';
    }
  }

  public function upload(Request $request){
    try {
      //code...
      $file = $request->file('file');
      $import = new GenericImport();
      $import->import($file);
    } catch (\Throwable $th) {
      return json_encode(array(
        'success' => false,
        'message' =>"Please check file format/headers. Error message:".$th->getMessage()
    ));
  }
    return json_encode(array(
      'success' => true,
      'message' =>"Uploaded succesfully!"
  ));
  }

  public function monthlyEggProduce()
  {
    $results = DB::table('harvests')
      ->join('batches', 'batches.harvest_id', '=', 'harvests.id')
      ->select(DB::raw('SUM(batches.quantity) as total_amount'), DB::raw('MONTH(harvests.harvest_date) as month'))
      ->groupBy(DB::raw('MONTH(harvests.harvest_date)'))
      ->where('harvests.deleted', '0')
      ->where('batches.deleted', '0')
      ->get();
    foreach ($results as $result) {
      switch ($result->month) {
        case '1':
          # code...
          $result->month = 'January';
          break;
        case '2':
          # code...
          $result->month = 'Febuary';
          break;
        case '3':
          # code...
          $result->month = 'March';
          break;
        case '4':
          # code...
          $result->month = 'April';
          break;
        case '5':
          # code...
          $result->month = 'May';
          break;

        case '6':
          # code...
          $result->month = 'June';
          break;

        case '7':
          # code...
          $result->month = 'July';
          break;

        case '8':
          # code...
          $result->month = 'August';
          break;

        case '9':
          # code...
          $result->month = 'September';
          break;

        case '10':
          # code...
          $result->month = 'October';
          break;

        case '11':
          # code...
          $result->month = 'November';
          break;
        case '12':
          # code...
          $result->month = 'December';
          break;

        default:
          # code...
          break;
      }
    }
    return $results;
  }
  public function yearlyEggProduce()
  {
    $results = DB::table('harvests')
      ->join('batches', 'batches.harvest_id', '=', 'harvests.id')
      ->select(DB::raw('SUM(batches.quantity) as total_amount'), DB::raw('YEAR(harvests.harvest_date) as year'))
      ->groupBy(DB::raw('YEAR(harvests.harvest_date)'))
      ->where('harvests.deleted', '0')
      ->where('batches.deleted', '0')
      ->get();
    return $results;
  }

  public function productByBuilding()
  {
    //Query to get total stock of each product from each building
    $results = DB::table('harvests')
      ->join('batches', 'batches.harvest_id', '=', 'harvests.id')
      ->join('buildings', 'buildings.id', '=', 'batches.building_id')
      ->join('products', 'products.id', '=', 'batches.product_id')
      ->select(DB::raw('SUM(batches.quantity) as total_amount'), 'buildings.building_name', 'products.product_code')
      ->groupBy('buildings.building_name', 'products.product_code')
      ->where('buildings.status', '1')
      ->where('buildings.deleted', '0')
      ->where('products.status', '1')
      ->where('products.deleted', '0')
      ->where('harvests.deleted', '0')
      ->where('batches.deleted', '0')
      ->groupBy('buildings.building_name')->get();
    //Query to get all active products as column headers
    $products = Product::where('deleted', '0')->where('status', '1')->get();
    //collect query into a collection and group by building_name
    $order_grouped_by_building_id = collect($results)->groupBy('building_name');
    //initialize return data 
    $data = [];
    //iterate through collection grouped by buildings
    foreach ($order_grouped_by_building_id as $building_name => $building_stock_info) {
      //set building based on current iteration
      $buildings = [
        'building_name' => $building_name,
      ];
      //set buildings array's products based on product query result
      foreach ($products as $product) {
        $buildings += [$product->product_code => 0];
      }
      //get stock of each product from the current building
      foreach ($building_stock_info as $info) {
        $buildings[$info->product_code] += $info->total_amount;
      }

      $data[] = $buildings;
    }
    $result = [
      'data'    => $data,
      'products' => $products,
    ];
    return $result;
  }

  public function stockByBuilding()
  {
    //Query to get total stock of each product from each building
    $results = DB::table('harvests')
      ->join('batches', 'batches.harvest_id', '=', 'harvests.id')
      ->join('buildings', 'buildings.id', '=', 'batches.building_id')
      ->join('products', 'products.id', '=', 'batches.product_id')
      ->select(DB::raw('SUM(batches.quantity_out) as total_amount'), 'buildings.building_name', 'products.product_code')
      ->groupBy('buildings.building_name', 'products.product_code')
      ->where('buildings.status', '1')
      ->where('buildings.deleted', '0')
      ->where('products.status', '1')
      ->where('products.deleted', '0')
      ->where('harvests.deleted', '0')
      ->where('batches.deleted', '0')
      ->groupBy('buildings.building_name')->get();
    //Query to get all active products as column headers
    $products = Product::where('deleted', '0')->where('status', '1')->get();
    //collect query into a collection and group by building_name
    $order_grouped_by_building_id = collect($results)->groupBy('building_name');
    //initialize return data 
    $data = [];
    //iterate through collection grouped by buildings
    foreach ($order_grouped_by_building_id as $building_name => $building_stock_info) {
      //set building based on current iteration
      $buildings = [
        'building_name' => $building_name,
      ];
      //set buildings array's products based on product query result
      foreach ($products as $product) {
        $buildings += [$product->product_code => 0];
      }
      //get stock of each product from the current building
      foreach ($building_stock_info as $info) {
        $buildings[$info->product_code] += $info->total_amount;
      }

      $data[] = $buildings;
    }
    $result = [
      'data'    => $data,
      'products' => $products,
    ];
    return $result;
  }

  public function buildingHarvestContribution()
  {
    $results = DB::table('harvests')
      ->join('batches', 'batches.harvest_id', '=', 'harvests.id')
      ->join('buildings', 'batches.building_id', '=', 'buildings.id')
      ->select(DB::raw('SUM(batches.quantity) as total_amount'), 'buildings.building_name','buildings.id')
      ->groupBy('buildings.building_name', 'buildings.id')
      ->where('buildings.status', '1')
      ->where('buildings.deleted', '0')
      ->where('harvests.deleted', '0')
      ->where('batches.deleted', '0')
      ->get();
    return $results;
  }

  public function buildingStockContribution()
  {
    $results = DB::table('harvests')
      ->join('batches', 'batches.harvest_id', '=', 'harvests.id')
      ->join('buildings', 'batches.building_id', '=', 'buildings.id')
      ->select(DB::raw('SUM(batches.quantity_out) as total_amount'), 'buildings.building_name','buildings.id')
      ->groupBy('buildings.building_name', 'buildings.id')
      ->where('buildings.status', '1')
      ->where('buildings.deleted', '0')
      ->where('harvests.deleted', '0')
      ->where('batches.deleted', '0')
      ->get();
    return $results;
  }

  

  public function generateQrCode(Request $request)
  {
    try {
      //code...
      QrCode::format('svg')->size(200)->generate($request->batch_id, storage_path('/app/public/images/' . $request->batch_id . '.svg'));

      // dd(storage_path('app/public/images/qrcode.svg'));

      $headers = array(
        'Content-Type: application/svg',
      );

      return Response::download(storage_path('/app/public/images/' . $request->batch_id . '.svg'), 'batchID_' . $request->batch_id . '.svg', $headers);
      // return Storage::download(public_path().'/images/koki.svg');

      // $qr = QrCode::size(200)->generate('Hello, World!');
      // $headers = [
      //     'Content-Type' => 'image/svg',
      //     'Content-Disposition' => 'attachment; filename="qrcode.svg"',
      // ];
      // return response($qr, 200, $headers);

    } catch (\Throwable $th) {
      //throw $th;
      return json_encode(array(
        'success' => false,
        'message' => 'Download failed.' . $th
      ));
    }


    return json_encode(array(
      'success' => true,
      'message' => 'Download successful.'
    ));
  }

  public function downloadSampleFile()
  {
      try {
      //code...
      $headers = array(
          'Content-Type: application/xlsx',
      );

      return Response::download(storage_path('/app/public/koki/sample.xlsx'), 'sample.xlsx', $headers);

      } catch (\Throwable $th) {
      //throw $th;
      return json_encode(array(
          'success' => false,
          'message' => 'Download failed.' . $th
      ));
      }


      return json_encode(array(
      'success' => true,
      'message' => 'Download successful.'
      ));
  }
}
