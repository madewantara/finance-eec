<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Signature;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class FindirProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('finance.director');
        $this->middleware('signature.findir');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = session('user')['nip'];
        $fetchUserById = Http::get('https://persona-gateway.herokuapp.com/auth/user/get-by-employee-id?id='.$userId);
        $dataUser = $fetchUserById->json()['data'];

        $signature = Signature::where('user_id', $userId)->get();

        return view('finance-director.profile', compact('dataUser', 'signature'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateSign(Request $request, $id)
    {
        $validator = Validator::make($request->all(), 
        [
            'signature' => 'required|mimes:png,jpg,jpeg',
        ], 
        [
            'signature.required' => '*Signature is required',
            'signature.mimes' => '*Only formats are allowed: .jpg, .jpeg, .png.',
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
 
        $validated = $validator->validated();
        
        $signature = $request->file('signature');
        if($signature){
            $getSignature = Signature::where('user_id', session('user')['nip'])->get();
            $signatureDelete = Storage::delete('public/Signature/'.$getSignature[0]->image);

            $signatureExt = $signature->getClientOriginalExtension();
            $signatureName = Str::random(40).'.'.$signatureExt;
            
            $signatureStore = Signature::where('user_id', session('user')['nip'])->update([
                'image' => $signatureName,
            ]);
            $signaturePath = $signature->storeAs('public/Signature/', $signatureName);
        }

        return redirect()->back()->withSuccess('Signature successfully updated');
    }
}
