<?php

namespace App\Http\Controllers;

use App\Models\Info;
use App\Models\User;
use Faker\Calculator\Inn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use File;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $info = Info::where('user_id', $user->id)->first();
        return view('dashboard', compact('user','info'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required','email'],
            'start_date' => ['required'],
            'phone' => ['required','numeric'],
            'end_date' => ['required'],
            'number_min_five' => ['required','min_digits:5','numeric'],
            'number_max_eight' => ['required','max_digits:8','numeric'],
            'whole_num_zero' => ['required','gt:0','numeric'],
            'max_whole_num_hunderd' => ['required','lt:100','numeric'],
            'num_range' => ['required','gt:20','lt:40','numeric'],
            'insta_url' => ['required','url'],
            'photo'  => ['required','image']
        ], [
                'name.required' => 'Name field is required.',
                'email.required' => 'Email field is required.',
                'email.email' => 'Email field must be email address.',
                'phone.required' => 'Phone field is required.',
                'end_date.required' => 'End Date field is required.',
                'number_min_five.required' => 'Number (minimum of 5 digits) field is required.',
                'number_min_five.min_digits' => 'Minimum 5 digits.',
                'number_min_five.numeric' => 'Must be numeric number',
                'number_max_eight.required' => 'Number (maximum number of 8 digits) field is required.',
                'number_max_eight.min_digits' => 'Maximum 8 digits.',
                'number_max_eight.numeric' => 'Must be numeric number',
                'whole_num_zero.required' => 'Whole Number (greater than 0) field is required.',
                'whole_num_zero.gt' => 'Greater than 0.',
                'whole_num_zero.numeric' => 'Must be numeric number',
                'max_whole_num_hunderd.required' => 'Max Whole Number (maximum value 100) field is required.',
                'max_whole_num_hunderd.lt' => 'Maximum value 100.',
                'max_whole_num_hunderd.numeric' => 'Must be numeric number',
                'num_range.required' => 'Number in the Range (minimum 20, maximum 40) field is required.',
                'num_range.gt' => 'Minimum value 20.',
                'num_range.lt' => 'Maximum value 40',
                'num_range.numeric' => 'Must be numeric number',
                'insta_url.required' => 'Instagram link field is required.',
                'insta_url.url' => 'Must be a valid url.',
                'photo.required' => 'Photo is required.',
                'photo.image' => 'Must be a image.',
            ]);

            $info = Info::findOrFail($id);

             if($request->hasFile('photo')){
                $photo = $request->photo;

                if(File::exists(public_path($info->photo))){
                    File::delete(public_path($info->photo));
                }

                $photoName = time().'_'.$photo->getClientOriginalName();
                $photo->move(public_path('uploads'), $photoName);
                $photo = 'uploads'.'/'.$photoName;
            } 
            
            Info::updateOrCreate(
                ['id' => $id],
                [
                    'user_id' => $id,
                    'name' => $request->name,
                    'email' => $request->email,
                    'start_date' => $request->start_date,
                    'phone' => $request->phone,
                    'end_date' => $request->end_date,
                    'number_min_five' => $request->number_min_five,
                    'number_max_eight' => $request->number_max_eight,
                    'whole_num_zero' => $request->whole_num_zero,
                    'max_whole_num_hunderd' => $request->max_whole_num_hunderd,
                    'num_range' => $request->num_range,
                    'insta_url' => $request->insta_url,
                    'photo' => $photo,
                   
                ]
            );

            return redirect()->back()->with([
                'message' => 'Successfully Created'
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if(Auth::user()->id == $id){
        $user = User::where('id', $id)->first();
        $info = Info::where('user_id', $id)->first();
        return view('info-show', compact('user','info'));
        }else{
            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
