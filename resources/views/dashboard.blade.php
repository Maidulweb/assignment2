<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }} <a class="p-2 text-blue-600 underline  border border-blue-600" href="{{route('dashboard.info-show', $user->id)}}">Show</a>
            @if ($user->email == 'admin-Md._Fazlul_Bary@person-app.com')
               <a class="p-2 text-blue-600 underline border border-blue-600" href="{{route('admin.info-show', $user->id)}}">Show All User Info</a>
            @endif
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           
                <div class="form">
                    <form action="{{route('dashboard.store', $user->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                      <div>
                        Name: <input type="text" name="name" value="{{$user->name}}">
                      </div>
                      @if ($errors->has('name'))
                        <code class="text-red-600">{{$errors->first('name')}}</code>
                      @endif
                      <div>
                        Email: <input type="email" name="email" value="{{$user->email}}">
                      </div>
                       @if ($errors->has('email'))
                        <code class="text-red-600">{{$errors->first('email')}}</code>
                       @endif
                       <div>
                        Start Date: <input type="text" name="start_date" placeholder="01/28/2024" value="{{@$info->start_date}}">
                       </div>
                       @if ($errors->has('start_date'))
                        <code class="text-red-600">{{$errors->first('start_date')}}</code>
                       @endif
                      <div>
                        Phone Number (digits only): <input type="number" name="phone" value="{{@$info->phone}}">
                      </div>
                      @if ($errors->has('phone'))
                        <code class="text-red-600">{{$errors->first('phone')}}</code>
                       @endif
                      <div>
                        End Date: <input type="text" name="end_date" placeholder="04/28/2024" value="{{@$info->end_date}}">
                      </div>
                      @if ($errors->has('end_date'))
                        <code class="text-red-600">{{$errors->first('end_date')}}</code>
                       @endif
                      <div>
                        Number (minimum of 5 digits): <input type="number" name="number_min_five" value="{{@$info->number_min_five}}">
                      </div>
                      @if ($errors->has('number_min_five'))
                        <code class="text-red-600">{{$errors->first('number_min_five')}}</code>
                       @endif
                       <div>
                        Number (maximum number of 8 digits): <input type="number" name="number_max_eight" value="{{@$info->number_max_eight}}">
                       </div>
                       @if ($errors->has('number_max_eight'))
                        <code class="text-red-600">{{$errors->first('number_max_eight')}}</code>
                       @endif
                       <div>
                        Whole Number (greater than 0): <input type="number" name="whole_num_zero" value="{{@$info->whole_num_zero}}">
                       </div>
                       @if ($errors->has('whole_num_zero'))
                        <code class="text-red-600">{{$errors->first('whole_num_zero')}}</code>
                       @endif
                       <div>
                        Max Whole Number (maximum value 100): <input type="number" name="max_whole_num_hunderd" value="{{@$info->max_whole_num_hunderd}}">
                       </div>
                       @if ($errors->has('max_whole_num_hunderd'))
                        <code class="text-red-600">{{$errors->first('max_whole_num_hunderd')}}</code>
                       @endif
                      <div>
                        Number in the Range (minimum 20, maximum 40): <input type="number" name="num_range" value="{{@$info->num_range}}">
                      </div>
                      @if ($errors->has('num_range'))
                        <code class="text-red-600">{{$errors->first('num_range')}}</code>
                       @endif
                       <div>
                        Instagram URL: <input type="text" name="insta_url" value="{{@$info->insta_url}}">
                       </div>
                       @if ($errors->has('insta_url'))
                        <code class="text-red-600">{{$errors->first('insta_url')}}</code>
                       @endif
                      <div class="mt-4">
                        @if (!@empty($info->photo))
                            <img class="w-16 h-16" src="{{asset($info->photo)}}" alt="">
                        @endif
                        <label for="">Picture</label><br/>
                        <input type="file" name="photo">
                      </div>
                      @if ($errors->has('photo'))
                        <code class="text-red-600">{{$errors->first('photo')}}</code>
                       @endif
                       <div class="mt-4">
                        <button class="p-2 border border-solid border-gray-900 rounded"><strong>Submit Person Details</strong></button>
                       </div>
                    </form>
                </div>
        </div>
    </div>
</x-app-layout>
