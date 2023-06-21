<?php

namespace App\Exports;

use App\Models\AccountListGlobe;
use App\Models\LauronAccount;
use App\Models\LauronLead;
use App\Models\Lead;
use Carbon\Carbon;
use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ReportExportLauron implements FromCollection, WithHeadings
{
     /**
     * @return \Illuminate\Support\Collection
     */
    use Exportable;

    public function __construct(
        $campaignName,
        $campaignID,
        $reportType,
        $filterType,
        $group,
        $dateType,
        $startDate,
        $endDate,
    ) {
        // $this->campaignName = $request->campaignName;
        $this->campaignName = $campaignName;
        $this->campaignID = $campaignID;
        $this->reportType = $reportType;
        $this->filterType = $filterType;
        $this->group = $group;
        $this->dateType = $dateType;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }
    public function collection()
    {
        // return AccountListGlobe::all();
        $query = "";
        switch ($this->reportType) {
            case 'ExtractLeads':
                # code...
                $query = DB::table('lauronLeads')
                    ->select(
                        'campaignName',
                        'segment',
                        'endoDate',
                        'pullOutDate',
                        'writeOffDate',
                        'activationDate',
                        'accountNumber',
                        'lastname',
                        'firstname',
                        'middlename',
                        'originalBalance',
                        'principalBalance',
                        'penalties',
                        'totalAmountDue',
                        'lastPaymentDate',
                        'lastPaymentAmount',
                        'dateOfBirth',
                        'civilStatus',
                        'motherMaidenname',
                        'autoloanCarInfo',
                        'homeAddress',
                        'companyName',
                        'CEAddressBusinessAddress',
                        'otherAddress1',
                        'otherAddress2',
                        'emailAddress',
                        'mobileNumber',
                        'homeNumber',
                        'officeNumber',
                        'otherContact1',
                        'otherContact2',
                        'otherContact3'
                    )
                    // ->where('campaignName', $parsedCampaignName)
                    ->where('deleted', '0');
                break;
            case 'ExtractAccounts':
                # code...
                $query = DB::table('lauronAccounts')
                    ->select(
                        'campaignName',
                        'segment',
                        'endoDate',
                        'accountNumber',
                        'originalBalance',
                        'principalBalance',
                        'area',
                        'collectionEffort',
                        'transaction',
                        'placeOfContact',
                        'pointOfContact',
                        'notes',
                        'created_at',
                        'updated_at',
                        'ptpAmount',
                        'ptpDate',
                        'agentName',
                        'leadStatus',
                        'customerName',
                        'mobileNumber',
                        'otherContact1',
                        'homeAddress',
                        'CEAddressBusinessAddress',
                        'otherAddress1',
                        'otherAddress2',
                        'remarkStatus',
                    )
                    // ->where('campaignName', $parsedCampaignName)
                    ->where('deleted', '0');
                break;
            }



        if (!empty($this->filterType)) {

            if ($this->filterType == '1') {
            }
            if ($this->filterType == '2') {
                $query = $query->where('status', '0');
            }
            if ($this->filterType == '3') {
                $query = $query->where('status', '1');
            }
        }
      
        if (!empty($this->campaignID)) {
          
            $query = $query->where('campaignID', $this->campaignID);
           
        }
   
        if (!empty($this->campaignName)) {
          
            $query = $query->where('campaignName', $this->campaignName);
           
        }
        if ($this->dateType == 'daterange') {
            $query = $query->whereBetween('dateUpload', [$this->startDate, $this->endDate]);
        }
        if ($this->dateType == 'today') {
          
            $query = $query->whereDate('dateUpload', Carbon::now());
             
            
        }

        $output = $query->get();
        // if ($this->reportType == "ExtractLeads") {
        //     if (!empty($this->campaignID)) {
        //         foreach ($output as $entry) {
        //             $find = LauronLead::where('mobileNumber', $entry->mobileNumber)->where('campaignName', $entry->campaignName)->where('campaignID', $this->campaignID)->where('dl', '0')->first();
        //             if (!empty($find)) {
        //                 $find->dl = "1";
        //                 $find->save();
        //             }
        //         }
        //     } 
        // } else {
        //     if (!empty($this->campaignID) && $this->reportType == "ExtractAccounts") {
        //         foreach ($output as $entry) {
        //             $find = LauronAccount::where('mobileNumber', $entry->mobileNumber)->where('campaignName', $entry->campaignName)->where('campaignID', $this->campaignID)->where('dl', '0')->first();
        //             if (!empty($find)) {
        //                 $find->dl = "1";
        //                 $find->save();
        //             }
        //         }
        //     }
        // }
        return  $output;
    }

    public function headings(): array
    {
        switch ($this->reportType) {
            case 'ExtractLeads':
                return [
                    'Campaign Name',
                    'Segment',
                    'Endo Date',
                    'Pull Out Date',
                    'Write Off Date',
                    'Activation Date',
                    'Account Number',
                    'Lastname',
                    'Firstname',
                    'Middlename',
                    'Original Balance',
                    'Principal Balance',
                    'Penalties',
                    'Total Amount Due',
                    'Last Payment Date',
                    'Last Payment Amount',
                    'Date Of Birth',
                    'Civil Status',
                    'Mother Maiden name',
                    'AutoloanCarInfo',
                    'Home Address',
                    'Company Name',
                    'CEAddressBusinessAddress',
                    'Other Address1',
                    'Other Address2',
                    'Email Address',
                    'Mobile Number',
                    'Home Number',
                    'Office Number',
                    'Other Contact1',
                    'Other Contact2',
                    'Other Contact3'


                ];
                break;
            case 'ExtractAccounts':
                return [
                    'Campaign name',
                    'Segment',
                    'Endo Date',
                    'Account Number',
                    'Original Balance',
                    'Principal Balance',
                    'Area',
                    'Collection Effort',
                    'Transaction',
                    'Place Of Contact',
                    'Point Of Contact',
                    'Notes',
                    'Created_at',
                    'Updated_at',
                    'PTP Amount Due',
                    'PTP Date',
                    'Agent name',
                    'Lead Status',
                    'Debtor',
                    'Mobile Number',
                    'Other Contact1',
                    'Home Address',
                    'CEAddressBusinessAddress',
                    'Other Address1',
                    'OtherAddress2',
                    'Status Remark',
                ];
                break;
            }
            
    }
}
