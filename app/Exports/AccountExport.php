<?php

namespace App\Exports;

use App\Models\Account;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class AccountExport implements FromView
{
    public function __construct($request)
    {
        $this->request = $request;
    }

    public function view(): View
    {
        $collectionData = array();
        $accountData = new Account;
        foreach($this->request->exportcategory as $category){
            if(!empty($category)){
                array_push($collectionData, $accountData->where('is_active' , 1)->where('category', $category)->distinct()->get());
            }
        }

        $arrayData = array();
        $accountArray = array('Referral Code', 'Name', 'Category');
        foreach($collectionData as $account){
            foreach($account as $acc){
                $accountArray = array(
                    'Referral Code' => $acc->referral,
                    'Name' => $acc->name,
                    'Category' => $acc->category,
                );
                array_push($arrayData, $accountArray);
            }
        }

        if($this->request->format == 'excel'){
            return view('finance-division.account.excel', ['arrayData' => $arrayData]);
        }
        elseif($this->request->format == 'csv'){
            return view('finance-division.account.csv', ['arrayData' => $arrayData]);
        }
    }
}
