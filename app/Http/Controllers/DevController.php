<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Building;
use App\Models\Harvest;
use App\Models\Order;
use App\Models\Product;
use App\Models\Receipt;
use App\Models\User;
use Carbon\Carbon;
use DB;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Throwable;

class DevController extends Controller
{
    //
    // public function test()
    // {
    //     File::makeDirectory(storage_path('app/public/avatars'));

    //     return "created";

    // }

    // public function loginAPI(Request $request)
    // {
    //     // File::makeDirectory(storage_path('app/public/files'));
    //     $credentials = array($request->username,$request->password);
    //     // return json_encode($credentials);
    //     $result = [
    //         // 'recordsTotal'    => $groupCount,
    //         'result' => $credentials,
    //         'success' => true,
    //     ];

    //     return json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);

    // }

    public function getBatchOptions()
    {
        // File::makeDirectory(storage_path('app/public/files'));
        $products = Product::where('deleted', '0')->where('status', '1')->get();
        $buildings = Building::where('deleted', '0')->where('status', '1')->get();
        $result = [
            // 'recordsTotal'    => $groupCount,
            'products' => $products,
            'buildings' => $buildings,
            'success' => true,
        ];

        return json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }

    public function addBatch(Request $request)
    {
        // File::makeDirectory(storage_path('app/public/files'));
        if (empty($request->username) || empty($request->building) || empty($request->product) || empty($request->product_quantity || empty($request->selectedDate))) {
            $result = [
                'res' => "Incomplete parameters.",
                'success' => false,
            ];
            return json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        }
        $user = User::where('username', $request->username)->first();
        $current_date = Carbon::parse($request->selectedDate)->toDateString();
        //check if harvest of that day already exists
        if ($harvest = Harvest::whereDate('harvest_date', '=', $current_date)->where('deleted', '0')->first()) {
            //Add batch to existing harvest
            $batch = new Batch();
            $batch->product_id =  $request->product;
            $batch->quantity = $request->product_quantity;
            $batch->quantity_out = $request->product_quantity;
            $batch->building_id =  $request->building;
            $batch->harvest_id =  $harvest->id;
            $batch->save();
            $result = [
                'res' => "Today's harvest created. Batch added succesfully.",
                'success' => true,
            ];
        } else {
            //Create new harvest and add batch
            $harvest = new Harvest();
            $harvest->harvest_name =  $request->product . "/" . " $current_date" . "/" . $request->building;
            $harvest->harvest_date =  $current_date;
            $harvest->user_id = $user->id;
            $harvest->save();

            $batch = new Batch();
            $batch->product_id =  $request->product;
            $batch->quantity = $request->product_quantity;
            $batch->quantity_out = $request->product_quantity;
            $batch->building_id =  $request->building;
            $batch->harvest_id =  $harvest->id;
            $batch->save();
            $result = [
                'res' => "Batch added succesfully to today's harvest.",
                'success' => true,
            ];
        }



        return json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }

    public function processReceipt(Request $request)
    {
        // File::makeDirectory(storage_path('app/public/files'));
        if (empty($request->order_list)) {
            $result = [
                'res' => "Incomplete parameters.",
                'success' => false,
            ];
            return json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        }
        try {
            $order_list = json_decode($request->order_list);
            $order_grouped_by_building_id = collect($order_list)->groupBy('building_id');
            $total_stock_to_remove = 0;
            $batch_stock = 0;
            $total_stock = 0;
            //Check if order can be processed
            foreach ($order_grouped_by_building_id as $key => $orders) {
                //get batches of the current building
              
                foreach ($orders as $koki => $value) {
                    //Get the details from the order
                    $product_detail = explode('|', $value->product);
                    $building_detail = explode('|', $value->building_detail);
                    $current_product[] = $product_detail[0];
                    //Specify which product
                    $batch = Batch::where('building_id', $key)->where('product_id', $product_detail[0])->where('deleted','0');
                    // $batch = $batch;
                    //Get the sum of the queried batch
                    $batch_stock = $batch->sum('quantity_out');
                    //Add the order quantity to the total stock to remove
                    $total_stock_to_remove += $value->product_quantity;
            
                }
                $total_stock += $batch_stock;
                //if current batch's stock is less than stock to remove from current order
                if ($batch_stock < $value->product_quantity) {
                    $result = [
                        'res' => "Insufficient stock. Product: " . $product_detail[1] . " Building with insufficient stock: " . $building_detail[1] .
                            " Batch stock Stock to remove: " . $value->product_quantity . " Stock Of Product: " . $batch_stock,
                        'success' => false,
                    ];
                    return json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
                }
            }
            //If stock to remove is greater than total stock of queried products
            if ($total_stock < $total_stock_to_remove) {
                $result = [
                    'res' => "Order quantity is greater than total stock." . "Total Stock to remove: " . $total_stock_to_remove .
                        " Total Stock Of Products: " . $total_stock,
                    'success' => false,
                ];
            } else {
                // TO DO
                //Create Receipt
                $receipt = new Receipt();
                $receipt->receipt_date = Carbon::now();
                $user = User::where('username',$request->username)->where('deleted','0')->first();
                if(empty($user)){
                    $result = [
                        'res' => "Could not find ".$request->username,
                        'success' => false,
                    ];
                    return json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
                    
                }
                $receipt->user_id = $user->id;
                $receipt->save();

                //Process order
                foreach ($order_grouped_by_building_id as $key => $orders) {
                    //get batches of the current building
                  
                    //Iterate through orders grouped by batch as key(building ID) value(order details) pair
                    foreach ($orders as $koki => $value) {
                        //Get the details from the order
                        $product_detail = explode('|', $value->product);
                        $building_detail = explode('|', $value->building_detail);
                        //Specify which product that still has stock
                        $batch = Batch::where('building_id', $key)->where('product_id', $product_detail[0])->where('quantity_out', '>', '0')->where('deleted','0')->get();
                        //add order quantity to to_remove_from_batch
                        $to_remove_from_batch = 0;
                        $to_remove_from_batch = $value->product_quantity;
                        // $result = [
                        //     'res' => $batch,
                        //     'success' => false,
                        // ];

                        // return json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
                        //Iterate through batch which matches the product and building from order
                        foreach ($batch as $iteration) {
                            //look up batch of current iteration
                            $update_batch = Batch::find($iteration->id);
                            //if quantity to remove is not equals to 0
                            if ($to_remove_from_batch != 0) {
                                //if batch quantity to remove is greater or equal than current batch's stock
                                if ($update_batch->quantity_out <= $to_remove_from_batch) {

                                    //Create order archive
                                    $order = new Order();
                                    $order->product_id = $update_batch->product_id;
                                    $order->quantity_to_remove = $to_remove_from_batch;
                                    $order->building_id = $update_batch->building_id;
                                    $order->receipt_id = $receipt->id;
                                    $order->batch_id = $update_batch->id;
                                    $order->quantity_batch = $update_batch->quantity_out;
                                   
                                    
                                    $to_remove_from_batch = ($to_remove_from_batch - $update_batch->quantity_out);
                                    $order->quantity_left = 0;
                                    $update_batch->quantity_out = 0;
                                    $update_batch->save();
                                    $order->save();

                                    // $result = [
                                    //     'res' => $batch,
                                    //     'success' => false,
                                    // ];

                                    // return json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
                                }else{
                                    //Create order archive
                                    $order = new Order();
                                    $order->product_id = $update_batch->product_id;
                                    $order->quantity_to_remove = $to_remove_from_batch;
                                    $order->building_id = $update_batch->building_id;
                                    $order->receipt_id = $receipt->id;
                                    $order->batch_id = $update_batch->id;
                                    $order->quantity_batch = $update_batch->quantity_out;
                                    //if batch quantity is enough to satisfy order demand
                                    $update_batch->quantity_out = ($update_batch->quantity_out - $to_remove_from_batch);
                                    $order->quantity_left = $update_batch->quantity_out;
                                    $to_remove_from_batch = 0;
                                    $update_batch->save();
                                    $order->save();
                            
                                    // $result = [
                                    //     'res' => $batch,
                                    //     'success' => false,
                                    // ];

                                    // return json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
                                }
                            }else{
                                // else stop if finished
                                break;
                            }
                        }
                    }
                }
                $result = [
                    'res' => "Receipt Successfully Processed." . "Total Stock Removed: " . $total_stock_to_remove .
                        " Total Stock Of Ordered Products: " . $total_stock,
                    'success' => true,
                ];
            }



            return json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        } catch (Throwable $e) {
            // Handle the error
            $result = [
                'res' => $e->getMessage(),
                'success' => false,
            ];
            return json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        }
    }

    public function getBarcodeData(Request $request){

        if(empty($request->data)){
            $result = [
                'success' => false,
                'res' => 'Invalid Parameters.'
            ];
    
            return json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        }

        $batch = Batch::where('id',$request->data)->where('deleted','0')->first();
        if(empty($batch)){
            $result = [
                'success' => false,
                'res' => 'Batch does not exist or is deleted.'
            ];
            return json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        }



        $results = DB::table('harvests')
            ->join('batches', 'batches.harvest_id', '=', 'harvests.id')
            ->join('buildings', 'buildings.id', '=', 'batches.building_id')
            ->join('products', 'products.id', '=', 'batches.product_id')
            ->select( 'batches.id','harvests.harvest_date','buildings.building_name', 'products.product_name','batches.quantity_out','batches.quantity')
            ->where('batches.id',$request->data)
            ->where('harvests.deleted', '0')
            ->where('batches.deleted', '0')
            ->get();
        $result = [
            'data' => $results,
            'success' => true,
            'res' => 'Success'
        ];

        return json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }
}
