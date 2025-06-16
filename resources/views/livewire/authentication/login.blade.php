<main>
    <div class="container-fluid vh-100 d-flex justify-content-center align-items-center">
    <div class="login-page p-4">
        <p class="text-center">
        <img src="{{ asset('image/wmsu_logo.png')}}" alt="wmsu-logo" class="img-fluid" width="175px" height="175px">
        </p>
        <h1 class="fs-1 fw-bold my-3 mb-4 text-white text-center brand-color">MyWMSU</h1>
        <form wire:submit.prevent="login()" method="post" id="loginForm">
            <div class="row mb-2 mx-1">
                <label for="email" class="form-label text-white">Email</label>
                <input type="email" wire:model="detail.email" id="email" placeholder="Email"class="form-control" >
                @error('detail.email') <span class="text-white">{{ $message }}</span> @enderror
            </div>
            <div class="row mb-2 mx-1">
                <label for="password" class="form-label text-white">Password</label>
                <input type="password" wire:model="detail.password" id="password" placeholder="Password"class="form-control" >
                @error('detail.password') <span class="text-white">{{ $message }}</span> @enderror
            </div>
            <div class="row mb-2 mx-1">
                <a href="/forgot-password" wire:navigate id="forgot-pass" class="form-text" name="login" id="login">Forgot your password?</a>
            </div>
            <button type="submit" name="login" class="btn d-flex p-2 p-sm-3 justify-content-center">LOGIN</button>
        </form>
    </div>
    </div>
</main>