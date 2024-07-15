<?php

namespace App\Http\Controllers;

use App\Models\Info;
use App\Models\User;
use Illuminate\Http\Request;
use File;

class AdminController extends Controller
{
    public function index(){
        $user = User::where('email', 'admin-Md._Fazlul_Bary@person-app.com')->first();
        if($user){
           $infos = Info::get();
           return view('admin.info-show', compact('infos'));
        }else {
            return redirect()->back();
        }
    }

    public function destory($id){
      $info = Info::findOrFail($id);
      if(File::exists(public_path($info->photo))){
        File::delete(public_path($info->photo));
      }
      $info->delete();

      return redirect()->back();
    }
}
