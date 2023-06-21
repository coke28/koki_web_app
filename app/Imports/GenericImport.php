<?php

namespace App\Imports;


use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\Batch;
use App\Models\Building;
use App\Models\Harvest;
use App\Models\Product;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithValidation;
use Psy\Exception\TypeErrorException;
use Throwable;

class GenericImport implements ToCollection, WithHeadingRow
{
    use Importable;
    public function __construct()
    {
        $this->products = Product::select('id','product_code')->where('status','1')->where('deleted','0')->get();
        $this->buildings = Building::select('id','building_name')->where('status','1')->where('deleted','0')->get();
    }

    public function collection(Collection $rows)
    {
        foreach($rows as $row){
            try{
                $date = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['harvest_date'])->format('Y-m-d');
                // dd($date);   
            }catch(Throwable $th){
                throw new \Exception("Date has wrong format:".$row['harvest_date'].". Expected format (ex.03/15/2023)");
            }
            $harvest = Harvest::where('harvest_date', '=', $date)->where('deleted','0')->first();
            // $harvest = $this->harvests
            // ->where('harvest_date', '=', $date)->first();
            if(!empty($harvest)){
                //if harvest exists
                $harvest_id = $harvest->id;
            }else{
                //if harvest doesn't exist
                // $harvest_id = DB::table('harvests')->insertGetId([
                //     'harvest_date' =>$date,
                //     'harvest_name' =>"Uploaded",
                //     'user_id' =>auth()->user()->id,
                   
                // ]);
                $new_harvest = new Harvest();
                $new_harvest->harvest_date = $date;
                $new_harvest->harvest_name = "Uploaded";
                $new_harvest->user_id = auth()->user()->id;
                $new_harvest->save();
                $harvest_id = $new_harvest->id;

            }
            // check if product from file exists
            // $product = Product::where('product_code', $row['product_code'])->first();
            $product = $this->products->where('product_code', $row['product_code'])->first();
            if (!$product) {
                throw new \Exception("Product with code '{$row['product_code']}' does not exist. Please check the upload file");
            }
              // check if product from file exists
            // $building = Building::where('building_name', $row['building_name'])->first();
            $building = $this->buildings->where('building_name', $row['building_name'])->first();
            if (!$building) {
                throw new \Exception("Building with name '{$row['building_name']}' does not exist. Please check the upload file");
            }
            // check if quantity is empty
            if (!isset($row['quantity'])) {
                throw new \Exception("Row has empty 'Quantity' data. Please check the upload file");
            }
            // check if quantity is number
            if (!is_numeric($row['quantity'])) {
                throw new \Exception("Row '{$row['building_name']},{$row['product_code']},{$row['quantity']}' has non numeric quantity. Please check the upload file");
            }
            $new_batch = new Batch();
            $new_batch->harvest_id =  $harvest_id;
            $new_batch->product_id = $product->id;
            $new_batch->quantity = $row['quantity'];
            $new_batch->quantity_out = $row['quantity'];
            $new_batch->building_id = $building->id;
            $new_batch->save();
        }
    }
}
