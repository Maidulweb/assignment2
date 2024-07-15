<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Show User Info Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
               @if ($info)
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
               @else
                <p>No data</p>
               @endif
                <div class="mt-5">
                    <a class="py-2 px-10 text-xl font-bold border rounded border-blue-700 text-blue-700" href="{{route('dashboard')}}">Edit</a>
                </div>
        </div>
    </div>
</x-app-layout>
