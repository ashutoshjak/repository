<?php

namespace App\Http\Controllers;

use App\Models\Bank;

use Illuminate\Http\Request;

use App\Services\BankService;

use App\Http\Requests\BankRequest;

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
    //public $test;

    public function __construct(BankService $bankService){

        $this->bankService = $bankService;
        // $this->test = $test;
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
        if (request()->expectsJson()) {
            return response()->json($banks);
        }
        
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
    // public function store(Request $request)
    // {
    //     // dd($request);
    //     //old code
    //     // $bank =  Bank::create([
    //     // 'bankName' => $request->bankName, 
    //     // 'grade' => $request->grade, 
        
    //     // ]);
    //     //old code
    //     //repository code
    //     // $bank = $this->bankRepository->create($request->all());
        
    //     // $bank = $this->bankService->createBank($request->all());
    //     // return redirect()->route('bank.index');

       
    //     $bank = $this->bankService->storeBank($request->all());
    //     // dd($bank);
    //     return redirect()->route('bank.index');
    //     // ->with('success', 'Bank created successfully');
        
        
        

    // }

    public function store(BankRequest $request)
    {
        
        // dd($request->input()['bankName']);
        //old code
        // $bank =  Bank::create([
        // 'bankName' => $request->bankName, 
        // 'grade' => $request->grade, 
        // $this->test = $request;
        // ]);
        //old code
        //repository code
        // $bank = $this->bankRepository->create($request->all());
        
        // $bank = $this->bankService->createBank($request->all());
        // return redirect()->route('bank.index');
    
        // dd($request);
        $bank = $this->bankService->storeBank($request->validated());
        // caeate in ta1[a,b]
        // create [c,t1id t2

        // $request = new Request();

        if($request->expectsJson()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Bank created successfully',
                'bank' => $bank
            ]);
        }
      
        return redirect()->route('bank.index');
      
        
    
        // dd($bank);
       
        // ->with('success', 'Bank created successfully');
          

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
        if ($request->expectsJson()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Bank updated successfully',
                
            ]);
        } 
        return redirect()->route('bank.index');
        
        
        // return redirect()->route('bank.index');
    }





    public function updateMultiple(Request $request)
{
    
    // dd($request);
    $this->bankService->updateMultipleBanks($request->all());
    // dd('abc');
    if ($request->expectsJson()) {
        return response()->json([
            'status' => 'success',
            'message' => 'Banks updated successfully',
            'data' => $request->input()
        ]);
    }
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
           if(request()->expectsJson()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Bank deleted successfully',
            ]);
        }
       
         return redirect()->route('bank.index');
       
        //    return redirect()->route('bank.index');

    }


    public function deleteMultiple(Request $request)
{
    $ids = $request->input('ids');

    $this->bankService->deleteMultipleBanks($ids);

    if ($request->expectsJson()) {
        return response()->json([
            'status' => 'success',
            'message' => 'Banks deleted successfully',
        ]);
    }
}


    
    
}
