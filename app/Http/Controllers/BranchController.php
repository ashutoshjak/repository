<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Branch;
use Illuminate\Http\Request;
use App\Http\Requests\BranchRequest;
use App\Repositories\BranchRepository;
use App\Services\ServiceInterfaces\BankServiceInterface;
use App\Repositories\Interfaces\BranchRepositoryInterface;
use App\Services\ServiceInterfaces\BranchServiceInterface;

class BranchController extends Controller
{

     //branch repository
    // protected $branchRepository;

    // public function __construct(BranchRepository $branchRepository)
    // {
    //    $this->branchRepository = $branchRepository;
    // }    


    // use bankservice interface to fetch info of bank rather than doing same in branch service
    protected $branchService, $bankService;


    public function __construct(BranchServiceInterface $branchService, BankServiceInterface $bankService)
    {
       $this->branchService = $branchService;
       $this->bankService = $bankService;
    }    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        
        // dd($branches);
        // $bank = Bank::with('branch')->get();

        // $branches = Branch::with('bank')->get();  ->another example of code

        // dd($branch);
       //old code 
        // $branches = Branch::all();

        // dd($branches);
        

        // $branches = $this->branchRepository->allBranch()->load('bank');
        // return view('branch.index', [
        //     'branches' => $branches->map(function ($branch) {
        //         return [
        //             'id' => $branch->id,
        //             'name' => $branch->branchName,
        //             'add' => $branch->branchAddress,
        //             'phone'=> $branch->phone,
        //             'bank_name' => $branch->bank->name,
        //         ];
        //     }),
        // ]);
                
 
//        repository code
        // $branches = $this->branchRepository->allBranch();
        
        
        // $obj = $this->branchService->getAllBranches();
        
        // $branches = $obj[0];


        $branches = $this->branchService->getAllBranches();  
        return view('branch.index',compact('branches'));
        
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //repositorycode
        // $banks = $this->branchRepository->allBanks();
    //    $obj = $this->branchService->getAllBranches();
    //     $banks = $obj[1];
           // $banks = Bank::all();

        $banks =   $this->bankService->getAllBanks(); 
        return view('branch.create',compact('banks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BranchRequest $request)
    {
       
        // dd($request);
       //old code
        // $branch =  Branch::create([
            
        //     'branchName' => $request->branchName, 
        //     'branchAddress' => $request->branchAddress, 
        //     'phone'=> $request->phone,
        //     'bank_id'=>$request->bank_id,
        //     ]);
        //old code
       //repository code
        // $branch = $this->branchRepository->create($request->all());
        // $branch =  $this->branchService->storeBranch($request->all());
        $branch =  $this->branchService->storeBranch($request->validated());
        return redirect()->route('branch.index');
    }

    // public function store(Request $request)
    // {
       
    //     // dd($request->input());
    //     $branchNames = $request->input('branchName');
    //     // dd($branchNames);
        
    //     $branchAddresses = $request->input('branchAddress');
    //     $phones = $request->input('phone');
    //     $bankids = $request->input('bank_id');
    //     $rowCount = count($branchNames);
    //     for ($i = 0; $i < $rowCount; $i++) {
    //         $branch = new Branch();
    //         $branch->branchName = $branchNames[$i];
    //         $branch->branchAddress = $branchAddresses[$i];
    //         $branch->phone = $phones[$i];
    //         $branch->bank_id = $bankids[$i];
    //         $branch->save();
    //     }
    //     return redirect()->route('branch.index');
    // }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function show(Branch $branch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //old code
        // $branch = Branch::find($id);
        // $banks = Bank::all();
        //repository code
        // $branch = $this->branchRepository->edit($id);
        // $banks =  $this->branchRepository->allBanks();
        // $obj = $this->branchService->getAllBranches();
        $branch = $this->branchService->editBranch($id);
        // $banks =  $obj[1];
        $banks =   $this->bankService->getAllBanks(); 
        return view('branch.edit',compact('branch','banks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        //old code
        // $branch = Branch::where('id',$id)->update([
        //     'branchName' => $request->branchName, 
        //     'branchAddress' => $request->branchAddress, 
        //     'phone' => $request->phone, 
        //     'bank_id'=>$request->bank_id,
        //     ]
    
        //     );
        //repository code
        //$this->branchRepository->update($request->all(),$id);
        $this->branchService->updateBranch($request->all(),$id);
            return redirect()->route('branch.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         //old code
        // if(Branch::destroy($id)){
        //     return redirect()->route('branch.index');
        //  }
        //repository code    
        //$this->branchRepository->delete($id);
        $this->branchService->deleteBranch($id);  
        return redirect()->route('branch.index');
    }
}
