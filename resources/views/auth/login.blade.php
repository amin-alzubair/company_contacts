@extends('layouts.app')

@section('content')
<div class="mx-auto h-full flex justify-center items-center bg-gray-300">
    <div class="W-96 bg-blue-900 rounded-lg shadow-xl p-6">

    <h1 class="text-white text-3xl pt-8">Welcome Backe</h1>
    <h2 class="text-blue-300">Enter your credentianls below </h2>
        
                    <form method="POST" action="{{ route('login') }}" class="pt-8">
                        @csrf

                        <div class="relative">
                            <label for="email" class="uppercase text-blue-500 text-xs font-bold absolute pl-3 pt-2">E-Mail Address</label>

                            <div>
                                <input id="email" type="email" class="pt-8 w-full rounded bg-blue-800 p-3 text-gray-100 outline-none focus:bg-blue-700" 
                                
                                name="email" value="{{ old('email') }}" autocomplete="email" placeholder="your@gmail.com">

                                @error('email')
                                    <span class="text-red-600 text-xm pt-1" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="relative pt-3">
                            <label for="password" class="uppercase text-blue-500 text-xs font-bold absolute pl-3 pt-2">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="pt-8 w-full rounded bg-blue-800 p-3 text-gray-100 outline-none focus:bg-blue-700"
                                 name="password"  autocomplete="current-password" placeholder="Password">

                                @error('password')
                                    <span class="text-red-600 text-xm pt-1" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="pt-2">
                            
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 
                                     'checked' : '' }}>

                                    <label class="text-white" for="remember">
                                        Remember Me
                                    </label>
                        </div>

                          <div class="pt-8">
                          
                              <button type="submit" class="w-full bg-gray-400 px-3 py-2 uppercase text-left text-blue-800 rounded font-bold">
                                    login
                                </button>
                          </div>
                                
                            <div class="flex justify-between pt-8 text-white text-xm font-bold">
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                        Forgot Your Password?
                             </a>


                            <a class="btn btn-link" href="{{ route('register') }}">
                                        Rgister
                            </a>
                            
                            </div>
                    </form>
    </div>
</div>
@endsection
