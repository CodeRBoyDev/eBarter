<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Models\User; 
use App\Models\Report; 
use Auth;  
use DataTables;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)

    {
//         $data =  DB::table('users')
//      ->leftJoin('report','users.id','=','report.owner_id')->groupBy('')
//      ->Where('users.role','!=','admin')->pluck(DB::raw('count(report.owner_id) as owner'),('users.name'))->all();
    
// dd($data);

    // $data =  DB::table('users as a')
    // ->select(array('a.id','a.name', DB::raw('COUNT(b.owner_id) as reportTotal')))
    // ->leftJoin('report as b','a.id','=','b.owner_id')
    // ->Where('a.role','!=','admin')
    // ->get();

    $data =  DB::table('users')
    ->join('report','report.owner_id','=','users.id')
    ->SELECT('users.id','users.name','users.status','report.report_description',DB::raw('COUNT(report.owner_id) as reportTotal')) 
    ->groupBy('users.id','users.name','report.report_description','users.status') 
    ->get(); 

    // $total = count($data);
    // $count = DB::table('report')
    // ->where('owner_id',$loggedIn_user->id)
    // ->count('rating');
    // dd($data);
    //     $data = User::where('role',"!=",'admin')->with('report')->get();
//   dd($data);

        

    $userToFollow = User::where('id',$request->follow_id)->first();
 
        if ($request->ajax()) 
        { 
            return Datatables::of($data) 
               ->addIndexColumn()
               ->addColumn('action', 'admin.action') 
               ->rawColumns(['action'])
               ->make(true);
        }


      $profile = User::where('id',Auth::id())->first();  
    //    dd($data); 

        return view('admin.dashboard',compact('profile'));
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
        $report = Report::where('owner_id',$id)->get();
        
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
        $user = User::find($id);
        // dd($rescuer);
        if($user->status !='active')
        {
            $user->status='active'; 
            $user->save();
        }else
        {
            $user->status='deactivated'; 
            $user->save();
        }
      
        
        return redirect()->back()->with('success','Successfully Updated!');
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
}
