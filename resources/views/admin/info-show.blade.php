<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Show All Info Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if ($infos != null)
            @foreach ($infos as $info)
            <div class="border border-green-500 p-2 mt-10">
             <p> <strong>Name</strong>: {{$info->name}}</p>
             <p> <strong>Email</strong>: {{$info->email}}</p>
             <p> <strong>Start Date</strong>: {{$info->start_date}}</p>
             <p> <strong>Phone Number</strong>: {{$info->phone}}</p>
             <p> <strong>End Date</strong>: {{$info->end_date}}</p>
             <p> <strong>Number (minimum of 5 digits)</strong>: {{$info->number_min_five}}</p>
             <p> <strong>Number (maximum number of 8 digits)</strong>: {{$info->number_max_eight}}</p>
             <p> <strong>Whole Number (greater than 0)</strong>: {{$info->whole_num_zero}}</p>
             <p> <strong>Max Whole Number (maximum value 100)</strong>: {{$info->max_whole_num_hunderd}}</p>
             <p> <strong>Number in the Range (minimum 20, maximum 40)</strong>: {{$info->num_range}}</p>
             <p> <strong>Instagram</strong>: {{$info->insta_url}}</p>
             <div><strong>Photo</strong>: <img class="w-16 h-16" src="{{asset($info->photo)}}" alt="Nai"></div>
             <div class="mt-5">
                 <form action="{{route('admin.info-show.destory', $info->id)}}" method="POST">
                     @csrf
                     @method('DELETE')
                     <button type="submit" class="p-2 text-red-700 font-semibold border border-red-900 rounded">Delete</button>
                 </form>
             </div>
            </div>
             @endforeach
             @else
             <p>No Data</p>
            @endif
           
               
                
        </div>
    </div>
</x-app-layout>
