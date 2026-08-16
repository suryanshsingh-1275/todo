<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sign Up</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body id="signup-page">

    <main class="auth-container">

        <section class="auth-card">

            <div class="auth-header">
                <h1 class="auth-title">Create Account</h1>

                <p class="auth-subtitle">
                    Start managing your tasks with TodoFlow
                </p>
            </div>

            <form id="signup-form" class="auth-form">

                <div class="form-group">

                    <label for="signup-name">
                        Name
                    </label>

                    <input
                        type="text"
                        id="signup-name"
                        name="name"
                        class="form-input"
                        placeholder="Enter your name"
                        required
                    >

                </div>

                <div class="form-group">

                    <label for="signup-email">
                        Email
                    </label>

                    <input
                        type="email"
                        id="signup-email"
                        name="email"
                        class="form-input"
                        placeholder="Enter your email"
                        required
                    >

                </div>

                <div class="form-group">

                    <label for="signup-password">
                        Password
                    </label>

                    <input
                        type="password"
                        id="signup-password"
                        name="password"
                        class="form-input"
                        placeholder="Create a password"
                        required
                    >

                </div>

                <div class="form-group">

                    <label for="signup-password-confirmation">
                        Confirm Password
                    </label>

                    <input
                        type="password"
                        id="signup-password-confirmation"
                        name="password_confirmation"
                        class="form-input"
                        placeholder="Confirm your password"
                        required
                    >

                </div>

                <button
                    type="submit"
                    id="signup-button"
                    class="primary-button"
                >
                    Create Account
                </button>

            </form>

            <div class="auth-footer">

                <p>
                    Already have an account?
                    <a href="/login" id="login-link">Login</a>
                </p>

            </div>

        </section>

    </main>

</body>
</html>