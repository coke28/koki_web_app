<?php

namespace App\Http\Controllers;

use App\Models\AccountListGlobe;
use App\Models\Area;
use App\Models\Building;
use App\Models\CampaignUpload;
use App\Models\User;
use App\Models\Category;
use App\Models\CollectionEffort;
use App\Models\CrmClient;
use App\Models\Group;
use App\Models\LauronAccount;
use App\Models\LauronLead;
use App\Models\Lead;
use App\Models\PaymentMethod;
use App\Models\Phone;
use App\Models\PhoneBrand;
use App\Models\PlaceOfContact;
use App\Models\PointOfContact;
use App\Models\Product;
use App\Models\PromoName;
use App\Models\ReasonForDenial;
use App\Models\Segment;
use App\Models\Status;
use App\Models\Transaction;
use App\Models\UserRole;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Redirect;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        // Get view file location from menu config
        $view = theme()->getOption('page', 'view');

        // Check if the page view file exist
        if (view()->exists('pages.' . $view)) {
            // return view('pages.'.$view);

            // $campaignUploads = CampaignUpload::where('deleted', '0')->get();
            // $campaignUploadsCount = $campaignUploads->count();
            // $usersOnCall = User::where('onCall', '1')->where('online', '1')->where('deleted', '0')->get();
            // $usersOnCallCount = $usersOnCall->count();
            // $usersOnline = User::where('online', '1')->where('deleted', '0')->get();
            // $usersOnlineCount = $usersOnline->count();
            // return view('pages.' . $view, [
            //     'campaignUploads' => $campaignUploads,
            //     'campaignUploadsCount' => $campaignUploadsCount,
            //     'usersOnlineCount' => $usersOnlineCount,
            //     'usersOnCallCount' =>  $usersOnCallCount

            // ]);

            return view('pages.' . $view);
        }

        // Get the default inner page
        return view('inner');
    }

    public function manageCategory()
    {
        return view('admintools.manageCategory.view');
    }
   
  
    public function manageUser()
    {
        $userRoles = UserRole::where('deleted', '0')->where('status', '1')->get();
        return view('admintools.manageUsers.view', [
            'userRoles' => $userRoles,
        ]);
    }
    
    public function manageUserRole()
    {
        return view('admintools.manageUserRole.view');
    }

    public function manageProduct()
    {
        return view('admintools.manageProduct.view');
    }
    public function manageBuilding()
    {
        return view('admintools.manageBuilding.view');
    }
  
    public function adminReport()
    {
        // $groups = Group::where('status', '1')->where('deleted', '0')->get();
        // $campaignIDs = CampaignUpload::where('deleted', '0')->get();
        // $clients = CrmClient::where('deleted', '0')->where('status', '1')->get();

        $year = date_create('today')->format('Y');
        //remove comment next line for test's
        //$year = 2001;

        $dtStart = date_create('2 jan ' . $year)->modify('last Monday');
        $dtEnd = date_create('last monday of Dec ' . $year);

        for ($weeks = []; $dtStart <= $dtEnd; $dtStart->modify('+1 week')) {
            $key = $dtStart->format('W-Y');
            $from = $dtStart->format('Y/m/d');
            $to = (clone $dtStart)->modify('+6 Days')->format('Y/m/d');
            $weeks[$key] = $from . '-' . $to;
        }
        // dd($weeks);

        return view('reportsAndLists.adminReport.view', [
            'weeks' => $weeks,
            // 'groups' => $groups,
            // 'clients' => $clients,
            // 'campaignIDs' => $campaignIDs
        ]);
    }

    public function manageHarvest()
    {
        return view('reports_and_lists.harvest.view');
    }
    public function manageBatch(Request $request)
    {
    
        $harvest_id = $request->id;
        $harvest_name = $request->harvest_name;
        $batch_id = $request->batch_id;
        $buildings = Building::where('deleted','0')->where('status','1')->get();
        $products = Product::where('deleted','0')->where('status','1')->get();
      

        return view('reports_and_lists.harvest.viewBatch', [
            'harvest_id' => $harvest_id,
            'harvest_name' => $harvest_name,
            'buildings' => $buildings,
            'products' => $products,
            'batch_id' => $batch_id
        ]);
    }

    public function manageReceipt()
    {
        return view('reports_and_lists.receipt.view');
    }

    public function manageOrder(Request $request)
    {
    
        $receipt_id = $request->id;
        $buildings = Building::where('deleted','0')->where('status','1')->get();
        $products = Product::where('deleted','0')->where('status','1')->get();

        return view('reports_and_lists.receipt.viewOrder', [
            'receipt_id' => $receipt_id,
            'buildings' => $buildings,
            'products' => $products,
        ]);
    }


    public function generateQRCode()
    {
        $current_date_time = \Carbon\Carbon::now()->toDateTimeString();
        // dd($current_date_time);

        // $clients = CrmClient::where('deleted', '0')->where('status', '1')->get();
        // $groups = Group::where('deleted', '0')->where('status', '1')->get();

        // dd($phoneBrands);

        return view('misc.generateQRCode.view', [
            'current_date_time' => $current_date_time,
            'koki' => "izumi"
        ]);
    }

    public function uploadCSV()
    {
        $current_date_time = \Carbon\Carbon::now()->toDateTimeString();
        // dd($current_date_time);

        // $clients = CrmClient::where('deleted', '0')->where('status', '1')->get();
        // $groups = Group::where('deleted', '0')->where('status', '1')->get();

        // dd($phoneBrands);

        return view('misc.uploadCSV.view', [
            'current_date_time' => $current_date_time
        ]);
    }


    public function showAuditLog()
    {
        return view('pages.auditLog.view');
    }


    public function manageCallHistory(Request $request)
    {
    
        $campaignID = $request->campaignID;
        $mobileNumber = $request->mobileNumber;
        // dd($request);

        return view('agent.lead.CallHistory', [
            'campaignID' => $campaignID,
            'mobileNumber' => $mobileNumber,
        ]);
    }


    
    public function manageCallBack()
    {

        $campaignUploads = CampaignUpload::where('deleted', '0')->get();
        return view('agent.callBack.view', [
            'campaignUploads' => $campaignUploads,
        ]);
    }
    public function manageHotLead()
    {

        $campaignUploads = CampaignUpload::where('deleted', '0')->get();
        return view('agent.hotLead.view', [
            'campaignUploads' => $campaignUploads,
        ]);
    }

}
