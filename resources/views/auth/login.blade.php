@extends('layouts.app')

@section('content')
<div class="w-full max-w-xs mx-auto mt-10">
    <form method="POST" action="{{ route('login') }}" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf

        <div class="mb-4">
            <label for="username" class="block text-gray-700 text-sm font-bold mb-2">
                ชื่อผู้ใช้
            </label>
            <input type="text" name="username" id="username"
                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline
                   @error('username') border-red-500 @enderror"
                   placeholder="ชื่อผู้ใช้" value="{{ old('username') }}">
            @error('username')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="password" class="block text-gray-700 text-sm font-bold mb-2">
                รหัสผ่าน
            </label>
            <input type="password" name="password" id="password"
                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline
                   @error('password') border-red-500 @enderror"
                   placeholder="******************">
            @error('password')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center justify-between">
            <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                เข้าสู่ระบบ
            </button>
            <a href="#" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                ลืมรหัสผ่าน?
            </a>
        </div>
    </form>
</div>
@endsection

