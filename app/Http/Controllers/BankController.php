<?php

namespace App\Http\Controllers;

use App\Models\Bank;

use Illuminate\Http\Request;

use App\Repositories\BankRepository;

use App\Services\ServiceInterfaces\BankServiceInterface;


class BankController extends Controller
{
    //if repository only used  //dont use BankRepository use BankRepositoryInterface
    // protected $bankRepository;


    // public function __construct(BankRepository $bankRepository)
    // {
    //     // dd($bankRepository);
    //        $this->bankRepository = $bankRepository;
    // }



    //Service used

    protected $bankService;

    public function __construct(BankServiceInterface $bankService){

        $this->bankService = $bankService;
    }





    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //old code
        // $banks = Bank::all();
        // return view('bank.index',compact('banks'));
        //old code

        //repository code
        // $banks = $this->bankRepository->allBanks();

        $banks = $this->bankService->getallBanks();
        return view('bank.index', compact('banks'));


        
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
        //old code
        // $bank =  Bank::create([
        // 'bankName' => $request->bankName, 
        // 'grade' => $request->grade, 
        
        // ]);
        //old code
        //repository code
        // $bank = $this->bankRepository->create($request->all());
        
        // $bank = $this->bankService->createBank($request->all());
        // return redirect()->route('bank.index');

       
        $bank = $this->bankService->createBank($request->all());
        // dd($bank);
        return redirect()->route('bank.index');
        
        
        

    }

//     public function store(Request $request)
// {
//     $bankNames = $request->input('bankName');
//     $grades = $request->input('grade');
//     // dd($bankNames);
//     $rowCount = count($bankNames);
//     for ($i = 0; $i < $rowCount; $i++) {
//         $bank = new Bank();
//         $bank->bankName = $bankNames[$i];
//         $bank->grade = $grades[$i];
//         $bank->save();
//     }
//     return redirect()->route('bank.index');
// }


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
        //oldcode
        // $bank = Bank::find($id);
        //repository code
        // $bank = $this->bankRepository->edit($id);
        $bank = $this->bankService->editBank($id);
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
        
        //old code
        // $bank = Bank::where('id',$id)->update([
        // 'bankName' => $request->bankName, 
        // 'grade' => $request->grade, 
        // ]

        // );
        //old code
        // dd($request, $request->all());
        //repository code
        // $this->bankRepository->update($request->all(),$id);
        $this->bankService->updateBank($request->all(),$id);
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
       //old code
        // if(Bank::destroy($id)){
        //     return redirect()->route('bank.index');
        //  }

        //old code
        // Bank::destroy($id);
           // return redirect()->route('bank.index');
           //repository code
//           $this->bankRepository->delete($id);

           $this->bankService->deleteBank($id);  
           return redirect()->route('bank.index');

    }

    
    
}
