<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body id="login-page">

    <main class="auth-container">

        <section class="auth-card">

            <div class="auth-header">
                <h1 class="auth-title">Welcome Back</h1>
                <p class="auth-subtitle">
                    Login to continue to TodoFlow
                </p>
            </div>

            <form id="login-form" class="auth-form">

                <div class="form-group">
                    <label for="login-email">Email</label>

                    <input
                        type="email"
                        id="login-email"
                        name="email"
                        class="form-input"
                        placeholder="Enter your email"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="login-password">Password</label>

                    <input
                        type="password"
                        id="login-password"
                        name="password"
                        class="form-input"
                        placeholder="Enter your password"
                        required
                    >
                </div>

                <button
                    type="submit"
                    id="login-button"
                    class="primary-button"
                >
                    Login
                </button>

            </form>

            <div class="auth-footer">
                <p>
                    Don't have an account?
                    <a href="/signup" id="signup-link">Create one</a>
                </p>
            </div>

        </section>

    </main>

</body>
</html>