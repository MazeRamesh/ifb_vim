<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use App\Models\emplayee;
use Auth;
use App\Models\company as Company;
use App\Http\Requests;
use Validator;
use Excel;
use DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\usersetting\userStore;
use App\Http\Requests\usersetting\userUpdate;

class usersettingController extends Controller
{

    /**
     *
     */


    public function import()
    {
        return view('usersetting.import');
    }

    public function uploadUsers(Request $request)
    {
         $v = Validator::make($request->all(), [
        'import_file' => 'required|file|max:1024',
    ]);

    if ($v->fails())
    {
        return redirect()->back()->withErrors($v->errors());
    }

       else

        {

           $result = Excel::load($request->file('import_file')->getRealPath(), function ($reader) use($request) {

                foreach ($reader->noHeading()->skipRows(1)->toArray() as $key => $row)
                {

                    if($row[0]=='' || $row[1]=='' || $row[2]=='')
                    {
                        $resp = redirect('usersetting')->withErrors(" Required Fields Mandatory");
                                 \Session::driver()->save();
                                 $resp->send();
                                 exit();
                    }
                    else
                    {
                    $data1['username']    = $row[1];
                    $data1['password']    = $row[2];
                    $data1['location']    = $row[3]??'';
                    $data1['role_id']     = $row[0];

                    $checkUsername   = DB::table('users')->where('username', trim($row[1]))->first();
                    $checkBranchCode = DB::table('locations')->where('BranchCode', trim($row[3]))->first();
                    $checkDealerCode = DB::table('items')->where('dealercode', trim($row[3]))->first();
                    $checkRoleID     = DB::table('roles')->where('id', trim($row[0]))->first();

                    if($checkUsername !=null || $checkBranchCode == null || $checkRoleID == null)
                    {


                        $resp = redirect('usersetting')->withErrors($row[1]. " This User Already Exist. OR ".$row[3]. " This Branch Code doesn't Exist".$row[0]. " Role ID doesn't exist");
                                 \Session::driver()->save();
                                 $resp->send();
                                 exit();


                    }
                    else
                    {
                       // dd("AAAA");
                        date_default_timezone_set('Asia/Kolkata');
                        $currentDate = date('Y-m-d H:s:i');

                        $usersetting = User::create([

                        'username'   => $data1['username'],
                        'password'   => $data1['password'],
                        'location'   => $data1['location']??'',
                        'role_id'    => $data1['role_id'],
                        'created_at' => $currentDate

                        ]);
                    }




                }
                }

            })->get();

          return redirect()->route('usersetting')->with('success', ['File Import successfully.']);

        }

    }



    public function index()
    {

        $usersetting = User::with('MappedUsers')->where('role_id','!=','1')->get();

       // dd($usersetting);

        return view('usersetting.index', ['usersetting' => $usersetting]);
    }

    /**
     *
     */
    public function create()
    {
        $user=auth()->user();
        $roles      = Role::where('id','!=','1')->get();
        // dd($user->userplant);
        // $roles = Role::all();
        // $employee   = emplayee::where('empstatus','Active')->where('emp_login',0)->get();
        // dd($employee);
  //       if($user->role_id==0)
  //       {
  //           $roles      = Role::where('id','!=','0')->get();
  //       }
  //       else if($user->role_id==1)
		// {
  //           $roles      = Role::where('id','!=','0')->where('id','!=','1')->get();
  //       }

        return view('usersetting.create',compact('roles'));
    }

    /**
     *
     */


    public function store(userStore $request)
    {
       // dd($request);
        // $user=auth()->user();
          $this->validate($request, [
        'username' => 'required|unique:users,name',
        ]);

        // $empcode=$request->input('choose_employee');
        // dd($empcode);
        // $userplant=emplayee::where('empcode',$empcode)->first();
         // dd($request->input('username'),$request->input('password'),$request->input('role_id'),$request->input('user_plant'),$request->input('empcode'),$request->input('empname'));
          // dd($request->input('role_id'));
        $usersetting = User::create([

            'name'       => $request->input('username'),
            'password'   => $request->input('password'),
            'role_id'    => $request->input('role_id'),
            // 'user_plant'  => $request->input('user_plant'),
            // 'empcode'    => $request->input('empcode'),
            // 'empname'    => $request->input('empname')

        ]);

        // DB::table('emplayees')->where('empcode',$request->input('username'))->update(['emp_login'=>1]);

       // dd($usersetting);

        return redirect()->route('usersetting')->with('success', ['The User has been created successfully.']);
    }

    /**
     *
     */
    public function edit($usersettingId)
    {


       $user=auth()->user();
       // $employee   = emplayee::where('empstatus','Active')->where('empplant',$user->userplant)->get();
       $plants = Company::all();
       $roles      = Role::where('id','!=','1')->get();
		// if($user->role_id==0)
  //       {
  //           $roles      = Role::where('id','!=','0')->get();
  //       }
  //       else if($user->role_id==1)
  //       {
  //           $roles      = Role::where('id','!=','0')->where('id','!=','1')->get();
  //       }

        $usersetting = User::where('id', $usersettingId)->first();

        // dd($roles);

        if(! $usersetting) {
            return redirect()->back()->withErrors('The User you are looking for does not exist');
        }


        return view('usersetting.edit',compact('plants','roles','usersetting'));
    }


    public function update(userUpdate $request, User $usersetting)
    {

        $usersetting->name = $request->input('username');
        $usersetting->password = $request->input('password');
        $usersetting->role_id = $request->input('role_id');
        // $usersetting->user_plant = $request->input('user_plant');
        // dd($usersetting->role_id);

        $usersetting->save();

        return redirect()->route('usersetting')->with('success', ['The User was updated successfully']);
    }

    public function destroy(\App\User $usersetting)
    {

        if($usersetting->role_id == 0)
        {
           return redirect()->back()->withErrors("You Can't Delect");
        }
        else
        {
            DB::table('emplayees')->where('empcode',$usersetting->name)->update(['emp_login'=>0]);

            $usersetting->delete();

        return redirect()->back()->with('success', ['The User and all their information has been deleted successfully']);
        }





    }
}
