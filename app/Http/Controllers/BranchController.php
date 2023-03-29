<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Bank;
use Illuminate\Http\Request;
use App\Repositories\BranchRepository;
use App\Repositories\Interfaces\BranchRepositoryInterface;

class BranchController extends Controller
{


    protected $branchRepository;

    public function __construct(BranchRepository $branchRepository)
    {
       $this->branchRepository = $branchRepository;
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
                


        $branches = $this->branchRepository->allBranch();
        return view('branch.index',compact('branches'));
        
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $banks = $this->branchRepository->allBanks();
        // $banks = Bank::all();
        return view('branch.create',compact('banks'));
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
        // $branch =  Branch::create([
            
        //     'branchName' => $request->branchName, 
        //     'branchAddress' => $request->branchAddress, 
        //     'phone'=> $request->phone,
        //     'bank_id'=>$request->bank_id,
        //     ]);
        //old code
        $branch = $this->branchRepository->create($request->all());
        return redirect()->route('branch.index');
    }

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
        
        $branch = Branch::find($id);
        $banks = Bank::all();
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
        $this->branchRepository->update($request->all(),$id);
        
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

        $this->branchRepository->delete($id);
        return redirect()->route('branch.index');
    }
}
