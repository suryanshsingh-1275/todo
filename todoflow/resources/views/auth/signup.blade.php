<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sign Up - TodoFlow</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

<div class="auth-container">

    <div class="auth-card">

        <div class="auth-header">
            <h1 class="auth-title">Create Account</h1>
            <p class="auth-subtitle">Create your TodoFlow account</p>
        </div>

        <form
            action="{{ route('signup') }}"
            method="POST"
            class="auth-form"
        >

            @csrf

            <div class="form-group">

                <label for="name">Name</label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    class="form-input"
                    value="{{ old('name') }}"
                    required
                >

                @error('name')
                    <p>{{ $message }}</p>
                @enderror

            </div>


            <div class="form-group">

                <label for="email">Email</label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    class="form-input"
                    required
                >

                @error('email')
                    <p>{{ $message }}</p>
                @enderror

            </div>


            <div class="form-group">

                <label for="password">Password</label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    class="form-input"
                    required
                >

                @error('password')
                    <p>{{ $message }}</p>
                @enderror

            </div>


            <div class="form-group">

                <label for="password_confirmation">
                    Confirm Password
                </label>

                <input
                    type="password"
                    id="password_confirmation"
                    name="password_confirmation"
                    class="form-input"
                    required
                >

            </div>


            <button
                type="submit"
                class="primary-button"
            >
                Create Account
            </button>

        </form>


        <div class="auth-footer">

            <p>
                Already have an account?
                <a href="{{ route('login') }}">Login</a>
            </p>

        </div>

    </div>

</div>

</body>
</html>