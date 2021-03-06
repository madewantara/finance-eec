<?php

namespace App\Exports\FinanceDirector;

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

        if(!empty($this->request->exportcategory)){
            foreach($this->request->exportcategory as $category){
                if(!empty($category)){
                    array_push($collectionData, $accountData->where('is_active' , 1)->where('category', $category)->orderBy('category', 'asc')->distinct()->get());
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
        }
        else{
            $collectionData = $accountData->where('is_active' , 1)->orderBy('category', 'asc')->get()->toArray();
            $arrayData = array();
            $accountArray = array('Referral Code', 'Name', 'Category');
            foreach($collectionData as $account){
                $accountArray = array(
                    'Referral Code' => $account['referral'],
                    'Name' => $account['name'],
                    'Category' => $account['category'],
                );
                array_push($arrayData, $accountArray);
            }
        }

        if($this->request->format == 'excel'){
            return view('finance-director.account.excel', ['arrayData' => $arrayData]);
        }
        elseif($this->request->format == 'csv'){
            return view('finance-director.account.csv', ['arrayData' => $arrayData]);
        }
    }
}
