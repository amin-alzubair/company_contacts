@extends('layouts.app')

@section('content')
<div class="mx-auto h-full flex justify-center items-center bg-gray-300">
    <div class="W-96 bg-blue-900 rounded-lg shadow-xl p-6">
    <h1 class="text-white text-3xl pt-6">
         Register
    </h1>
    <form method="POST" action="{{ route('register') }}" class="pt-8">
                        @csrf

                        <div class="relative">
                            <label for="name" class="uppercase text-blue-500 text-xs font-bold absolute pl-3 pt-2">{{ __('Name') }}</label>

                            <div>
                                <input id="name" type="text" placeholder="Name" 
                                class="pt-8 w-full rounded bg-blue-800 p-3 text-gray-100 outline-none focus:bg-blue-700" 
                                name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>

                                @error('name')
                                    <span class="text-red-400 pt-2 " role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="relative pt-3">
                            <label for="email" class="uppercase text-blue-500 text-xs font-bold absolute pl-3 pt-2">{{ __('E-Mail Address') }}</label>

                            <div>
                                <input id="email" type="email" placeholder="Your@gmial.com" 
                                class="pt-8 w-full rounded bg-blue-800 p-3 text-gray-100 outline-none focus:bg-blue-700" 
                                name="email" value="{{ old('email') }}" autocomplete="email">

                                @error('email')
                                    <span class="text-red-400 pt-2" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="relative pt-3">
                            <label for="password" class="uppercase text-blue-500 text-xs font-bold absolute pl-3 pt-2">{{ __('Password') }}</label>

                            <div>
                                <input id="password" type="password" placeholder="Password" class="pt-8 w-full rounded bg-blue-800 p-3 text-gray-100 outline-none focus:bg-blue-700" name="password" autocomplete="new-password">

                                @error('password')
                                    <span class="text-red-400 pt-2" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="relative pt-3">
                            <label for="password-confirm" class="uppercase text-blue-500 text-xs font-bold absolute pl-3 pt-2">{{ __('Confirm Password') }}</label>

                            <div>
                                <input id="password-confirm" type="password" placeholder="confirm password" class="pt-8 w-full rounded bg-blue-800 p-3 text-gray-100 outline-none focus:bg-blue-700" name="password_confirmation" autocomplete="new-password">
                            </div>
                        </div>

                        <div class="pt-8">
                          <button type="submit" class="w-full px-3 py-2 uppercase text-center text-blue-800 ronuded font-bold bg-gray-400">
                                    Register
                                </button>
                        </div>
                    </form>
    
    </div>
</div>
@endsection
