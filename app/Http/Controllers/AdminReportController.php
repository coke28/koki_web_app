<?php

namespace App\Http\Controllers;

use App\Exports\CrossTabulationExport;
use App\Exports\ReportExport;
use App\Models\Building;
use App\Models\Product;
use Carbon\Carbon;
use DB;
use Excel;
use Illuminate\Http\Request;

class AdminReportController extends Controller
{
    //
    public function generateReport(Request $request)
    {
        ini_set('memory_limit', '-1');
        ini_set('max_execution_time', '0');
        //Get query depending on report type
        switch ($request->select_report_type) {
            case 'harvest_total_amount':
                # code...
                $data = DB::table('harvests')
                    ->join('batches', 'batches.harvest_id', '=', 'harvests.id')
                    ->join('buildings', 'buildings.id', '=', 'batches.building_id')
                    ->join('products', 'products.id', '=', 'batches.product_id')
                    ->select(DB::raw('SUM(batches.quantity) as total_amount'), 'buildings.building_name', 'products.product_name')
                    ->where('harvests.deleted', '0')
                    ->where('batches.deleted', '0')
                    ->groupBy('buildings.building_name', 'products.product_name');


                break;
            case 'harvest_stock':
                # code...
                $data = DB::table('harvests')
                    ->join('batches', 'batches.harvest_id', '=', 'harvests.id')
                    ->join('buildings', 'buildings.id', '=', 'batches.building_id')
                    ->join('products', 'products.id', '=', 'batches.product_id')
                    ->select(DB::raw('SUM(batches.quantity_out) as total_amount'), 'buildings.building_name', 'products.product_name')
                    ->where('harvests.deleted', '0')
                    ->where('batches.deleted', '0')
                    ->groupBy('buildings.building_name', 'products.product_name');


                break;
        }
        // Add date where clause if date range is not empty
        if (!empty($request->start_date && !empty($request->end_date))) {
            $data = $data->whereBetween('harvest_date', [$request->start_date, $request->end_date]);
        }
        //Get the query into a collection
        $data = $data->get();
        //Collect the data and group them by product, pluck the total_amount and building_name. Put it in into an array under the product. Turn to the colelction into an Array
        $results = collect($data)->groupBy('product_name')->map(function ($item) {
            return collect($item)->pluck('total_amount', 'building_name')->toArray();
        })->toArray();

        //Query all actuve products
        $product = Product::select('product_name')->where('status', '1')->where('deleted', '0')->get();
        $products = [];
        //Insert all active product names into products array
        foreach ($product as $item) {
            $products[] = $item->product_name;
        }
         //Query all actuve buildings
        $building = Building::select('building_name')->where('status', '1')->where('deleted', '0')->get();
        $buildings = [];
        //Insert all active building names into buildings array
        foreach ($building as $item) {
            $buildings[] = $item->building_name;
        }
        //add date range to the first cell
        $buildings = array_merge([$request->start_date.'-'.$request->end_date], $buildings);
        //add products as headers with an empty 0th index
        $headers = array_merge([''], $products);
        //Add total at the last index of headers
        $headers[] = "Total";

        $table = [];
        
        foreach ($buildings as $building) {
            //Add the building name to the first column of the row
            $row = [$building];

            foreach ($products as $product) {
                //get the current iteration's product from the current iteration's building from the results collection
                $row[] = $results[$product][$building] ?? 0;
            }
            $sum_of_building = 0;
            foreach ($row as $key => $value) {
                // skip the first index because its the building name
                if ($key == 0) {
                    continue;
                }
                // get the sum of all products in this building
                $sum_of_building = $sum_of_building + $value;
            }
            // add the sum of all products in this building to the last index
            $row[] = $sum_of_building;
            //add the row to the table
            $table[] = $row;
        }

        $array = [];
        //add 'total' to the first column of the last row
        $array[] = "Total";
        foreach ($table as $key => $value) {
            // skip the first index because its the building name
            if ($key == 0) {
                continue;
            }
            // dd($value);
            foreach ($value as $keyZ => $valueZ) {
                // skip the first index because its the building name
                if ($keyZ == 0) {
                    continue;
                }
                //if current iteration's key exists in $array, add the current iteration's 
                // value to $array in the 'keyZ' index else add the current's iterations key and value to $array
                if (array_key_exists($keyZ, $array)) {
                    $array[$keyZ] += $valueZ;
                } else {
                    $array[$keyZ] = $valueZ;
                }
                // In summary, array_key_exists checks if a key exists in an array, while in_array checks if a value exists in an array.
                // if(in_array($keyZ,$array)){
                //     $array[$keyZ] = $valueZ;
                // }else{
                //     $array[$keyZ] += $valueZ;
                // }
            }
        }
        //add the totals of each column to the table
        $table[] = $array;

        if (!empty($request->start_date && !empty($request->end_date))) {
            return Excel::download(
                new ReportExport($headers, $table),
                $request->select_report_type . "- Date range between|" . $request->end_date.'|'.$request->start_date. "-Created at |".Carbon::now().'-'. 'Report.xlsx'
            );
        }else{
            return Excel::download(
                new ReportExport($headers, $table),
                $request->select_report_type."-Created at |".Carbon::now().'-'. 'Report.xlsx'
            );

        }
       
        
    }
}
