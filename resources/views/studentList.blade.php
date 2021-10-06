@extends('masterPage')
@section('content')
    <div class="relative min-h-screen flex">
        <!--side nav-->
        <div class="bg-gray-700 text-gray-100 w-64 space-y-6 py-7 px-2">
            <!--logo-->
            <a href="#" class="text-white flex items-center space-x-2 px-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                <span class="">Faculty Profile</span>
            </a>
            <div>
                <a href="{{route('faculty.index')}}" class="block py-2.5 px-4 rounded hover:bg-gray-500 hover:text-white">Home</a>
                <a href="#"class="block py-2.5 px-4 rounded hover:bg-gray-500 hover:text-white">Course</a>
                <a href="#"class="block py-2.5 px-4 rounded hover:bg-gray-500 hover:text-white">About</a>
            </div>
        </div>
        <!--contant-->
        <div class="flex-1 p-10 text-2xl font-bold">
            <div class="w-full bg-gray-300 h-10 text-white">Dashboard</div>
            <div class="w-full px-0 md:px-6 py-12">
                <h3 class="text-gray-700 uppercase font-bold mb-2">Student List</h3>
                <div class="flex items-center bg-gray-200 rounded-tl rounded-tr">
                    <div class="w-1/3 text-left text-gray-600 py-2 px-4 font-semibold">Name</div>
                    <div class="w-1/3 text-right text-gray-600 py-2 px-4 font-semibold">email</div>
                    <div class="w-1/3 text-right text-gray-600 py-2 px-4 font-semibold">Gender</div>
                </div>

                @foreach ($course->students as $student)
                    <a href="{{route('student.Report',$student->id)}}">
                        <div class="w-full flex items-center justify-between border border-gray-200">
                            <div class="w-1/3 text-left text-gray-600 py-2 px-4 font-medium">{{ $student->first_name }}_{{ $student->last_name }}</div>
                            <div class="w-1/3 text-left text-gray-600 py-2 px-4 font-medium">{{ $student->email }}</div>
                            <div class="w-1/3 text-right text-gray-600 py-2 px-4 font-medium">{{ $student->gender }}</div>
                        </div>
                    </a>
                @endforeach

            </div>
        </div>

    </div>

@endsection
