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
                <span class="">Student Profile</span>
            </a>
            <div>
                <a href="{{route('student.index')}}" class="block py-2.5 px-4 rounded hover:bg-gray-500 hover:text-white">Home</a>
                <a href="{{route('student.report')}}"class="block py-2.5 px-4 rounded hover:bg-gray-500 hover:text-white">Report</a>
                <a href="#"class="block py-2.5 px-4 rounded hover:bg-gray-500 hover:text-white">About</a>
            </div>
        </div>
        <!--contant-->
        <div class="flex-1 p-10 text-2xl font-bold">
            <div class="w-full bg-gray-300 h-10 text-white">Dashboard</div>
            <div class="flex justify-center items-center py-2">
                <p class="text-center text-blue-400">Attendance from</p>
            </div>
            <div class="flex justify-center items-center">
                <form method="post" class="mt-5 bg-gray-200 w-1/3 shadow rounded" action="{{route('attendance.create',$course->id)}}">
                    @csrf
                    @method('patch')
                    <x-alert/>
                    <div class="w-full px-3 py-2">
                        <label class="font-light text-sm uppercase block" for="attendance_date">Date</label>
                        <input type="date" value="" name="attendance_date" id="attendance_date" class="appearance-none rounded border shadow p-2 w-full focus:outline-none">
                    </div>
                    <div class="w-full flex justify-center py-3">
                        <button type="submit" class="appearance-none rounded border p-2 w-1/3 bg-blue-500 text-white shadow-md">Attendance</button>
                    </div>
                </form>
            </div>

        </div>

    </div>

@endsection

