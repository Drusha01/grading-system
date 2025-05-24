<main>
    <div class="container-fluid vh-100 d-flex justify-content-center align-items-center">
    <div class="login-page p-4">
        <p class="text-center">
        <img src="{{ asset('image/wmsu_logo.png')}}" alt="wmsu-logo" class="img-fluid" width="175px" height="175px">
        </p>
        <h1 class="fs-1 fw-bold my-3 mb-4 text-white text-center brand-color">MyWMSU</h1>
        <form action="#" method="post" id="loginForm">
        <div class="field">
            <i class='bx bxs-user'></i>
            <input type="text" name="emp_id" id="emp_id" required value="">
            <label for="emp_id">School ID</label>
        </div>
        <div class="field">
            <i class='bx bxs-lock-alt'></i>
            <input type="password" name="password" id="password" required value="">
            <button type="button" class="toggle-password" style="background: none; color: white;">
            <i class="bx bx-show"></i>
            </button>
            <label for="password">Password</label>
        </div>

        <div class="w-full d-flex justify-content-end">
            <a href="./forgot-pass.php" id="forgot-pass" class="forgot-pass form-text w-auto" name="login"
            id="login">Forgot your password?</a>
        </div>
        <button type="submit" name="login" class="btn d-flex p-2 p-sm-3 justify-content-center">LOGIN</button>
        <div id="emailHelp" class="form-text d-flex justify-content-center">
            <p>Don't have an account?<a href="signup.php" style="color: #7797f7;"> Sign up</a></p>
        </div>
        </form>
    </div>
    </div>
</main>