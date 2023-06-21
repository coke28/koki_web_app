<?php

namespace App\Http\Controllers;

use App\Models\AuditLog;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function listProducts(Request $request)
    {
      header('Content-Type: application/json');
      header('Access-Control-Allow-Origin: *');
      header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
      header('Access-Control-Allow-Headers: *');
  
      $tableColumns = array(
        'id',
        'product_name',
        'product_code',
        'product_description',
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

  
      $product = Product::where('deleted', '0');
      $product = $product->where(function ($query) use ($search) {
        return $query->where('id', 'like', '%' . $search . '%')
          ->orWhere('product_name', 'like', '%' . $search . '%')
          ->orWhere('product_code', 'like', '%' . $search . '%')
          ->orWhere('product_description', 'like', '%' . $search . '%');
      })
        ->orderBy($tableColumns[$sortIndex], $sortOrder);
      $productCount = $product->count();
      $product = $product->offset($offset)
        ->limit($limit)
        ->get();
  
      foreach ($product as $p) {
  
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

  
      $result = [
        'recordsTotal'    => $productCount,
        'recordsFiltered' => $productCount,
        'data'            => $product,
      ];
  
      // reponse must be in  array
      return json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }
  
    public function addProduct(Request $request)
    {
      $product = Product::where('product_name', $request->product_name)->where('deleted', '0')->get()->count();
      if ($product > 0) {
        return json_encode(array(
          'success' => false,
          'message' => 'Product already in use.'
        ));
      }

      $product = Product::where('product_code', $request->product_code)->where('deleted', '0')->get()->count();
      if ($product > 0) {
        return json_encode(array(
          'success' => false,
          'message' => 'Product Code already in use.'
        ));
      }
  
      $product = new Product();
      $product->product_name = $request->product_name;
      $product->product_code = $request->product_code;
      $product->status = $request->status;
      $product->product_description = $request->product_description;
      $product->save();
  
      $auditLog = new AuditLog();
      $auditLog->user = auth()->user()->id;
      $auditLog->action = "Added Product";
      $auditLog->table = "products";
      $auditLog->nID = json_encode($product->attributesToArray());
      $auditLog->ip_address = \Request::ip();
      $auditLog->save();
  
      return json_encode(array(
        'success' => true,
        'message' => 'Product added successfully.'
      ));
    }
  
    public function getEditProduct(Request $request)
    {
      $getProduct = Product::where('id', $request->id)->first();
      return json_encode($getProduct);
    }
  
    public function editProduct(Request $request)
    {
  
      $product = Product::where('product_name', $request->product_name)->where('id', '!=', $request->id)->where('deleted', '0')->get()->count();
      // ->where('deleted', '0')
    
      // dd($productName);
      if ($product > 0) {
        return json_encode(array(
          'success' => false,
          'message' => 'Product already in use.'
        ));
      }

      $product = Product::where('product_code', $request->product_code)->where('id', '!=', $request->id)->where('deleted', '0')->get()->count();
      if ($product > 0) {
        return json_encode(array(
          'success' => false,
          'message' => 'Product Code already in use.'
        ));
      }
  
  
      $product = Product::where('id', $request->id)->first();
      if (!empty($product) || $product != null) {
  
        $product->product_name = $request->product_name;
        $product->product_code = $request->product_code;
        $product->status = $request->status;
        $product->product_description = $request->product_description;
        $product->save();
    
        $auditLog = new AuditLog();
        $auditLog->user = auth()->user()->id;
        $auditLog->action = "Edited Product";
        $auditLog->table = "products";
        $auditLog->nID = json_encode($product->attributesToArray());
        $auditLog->ip_address = \Request::ip();
        $auditLog->save();

        return json_encode(array(
          'success' => true,
          'message' => 'Product updated successfully.'
        ));
      } else {
        return json_encode(array(
          'success' => false,
          'message' => 'Product not found.'
        ));
      }
    }
  
    public function deleteProduct(Request $request)
    {
      $deleteProduct = Product::where('id', $request->id)->first();
  
      if ($deleteProduct) {
  
  
        $deleteProduct->deleted = 1;
        $deleteProduct->save();
  
        $auditLog = new AuditLog();
        $auditLog->user = auth()->user()->id;
        $auditLog->action = "Deleted ID #" . " $deleteProduct->id " . "Product";
        $auditLog->table = "products";
        $auditLog->nID = "Deleted =" . $deleteProduct->deleted;
        $auditLog->ip_address = \Request::ip();
        $auditLog->save();
        return 'Product deleted successfully.';
      } else {
  
        return 'Product deleted unsuccessfully.';
      }
    }
}
