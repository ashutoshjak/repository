<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use Illuminate\Http\Request;

use App\Repositories\BankRepository;
use App\Repositories\Interfaces\BankRepositoryInterface;

class BankController extends Controller
{
    
    protected $bankRepository;


    public function __construct(BankRepository $bankRepository)
    {
        // dd($bankRepository);
           $this->bankRepository = $bankRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //old code
        $banks = Bank::all();
        return view('bank.index',compact('banks'));
        //old code

        // //repository code
        // $banks = $this->bankRepository->allBanks();
        // return view('bank.index', compact('banks'));


        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bank.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        
        $bank =  Bank::create([
        'bankName' => $request->bankName, 
        'grade' => $request->grade, 
        
        ]);
        return redirect()->route('bank.index');
        
        // $bank->bankName = $request->input('bankName');  
        // $bank->grade = $request->input('grade');  
        // $bank->save();


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function show(Bank $bank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bank = Bank::find($id);
        return view('bank.edit',compact('bank'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        
        $bank = Bank::where('id',$id)->update([
        'bankName' => $request->bankName, 
        'grade' => $request->grade, 
        ]

        );
        return redirect()->route('bank.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd(Bank::destroy($id));
        if(Bank::destroy($id)){
            return redirect()->route('bank.index');
         }
        // Bank::destroy($id);
        // return redirect()->route('bank.index');
    }

    
    
}
