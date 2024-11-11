<x-layout>
    <x-slot:title>{{ $title }}</x-slot>
    <div class="row justify-content-center">
        <div class="col-lg-5">

           
                @if (@session()->has('success'))
                    <div class="alert alert-success d-flex align-items-center" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                        <div>
                            {{ session('success') }}
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

            <main class="form-signin w-100 m-auto">
                <h1 class="h3 mb-3 fw-normal text-center">Please Login</h1>
                <form>
        
                    <div class="form-floating">
                        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
                        <label for="floatingInput">Email address</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                        <label for="floatingPassword">Password</label>
                    </div>
        
                    
                    <button class="btn btn-primary w-100 py-2" type="submit">Login</button>
                </form>
                <small class="d-block text-center mt-3">Not Registred ? <a href="/register">Register Now!</a></small>
            </main>
        </div>
    </div>
   
</x-layout>
