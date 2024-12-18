<x-layout>
    <x-slot:title>{{ $title }}</x-slot>
    <div class="row justify-content-center">
        <div class="col-lg-5">

           {{-- Login success --}}
                @if (@session()->has('success'))
                    <div class="alert alert-success d-flex align-items-center" role="alert">
                        <i class="bi bi-check-circle">{{ session('success') }}</i>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                {{-- Login Failed --}}
                @if (@session()->has('loginError'))
                    <div class="alert alert-danger d-flex align-items-center" role="alert">
                        <i class="bi bi-x-circle"> {{ session('loginError') }}</i> 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

            <main class="form-signin w-100 m-auto">
                <h1 class="h3 mb-3 fw-normal text-center">Please Login</h1>
                <form action="/login" method="POST">
                    @csrf
                    <div class="form-floating">
                        <input type="email" name="email" class="form-control

                        @error('email') 
                            is-invalid
                        @enderror

                        " id="email" placeholder="name@example.com" required autofocus value="{{ old('email') }}">
                        <label for="email" >Email address</label>

                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" name= "password" id="password" placeholder="Password" required>
                        <label for="password">Password</label>
                    </div>
        
                    
                    <button class="btn btn-primary w-100 py-2" type="submit">Login</button>
                </form>
                <small class="d-block text-center mt-3">Not Registred ? <a href="/register">Register Now!</a></small>
            </main>
        </div>
    </div>
   
</x-layout>
