@include('components.head')
 <style>
        body {
            background: linear-gradient(135deg, #667eea, #764ba2);
            height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', sans-serif;
        }

        .auth-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(15px);
            border-radius: 20px;
            padding: 30px;
            width: 100%;
            max-width: 450px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
            color: white;
        }

        label {
            color: #f1f1f1;
            margin-bottom: 5px;
        }

        .form-control {
            background: rgba(255, 255, 255, 0.2);
            border: none;
            color: #fff;
        }

        .form-control::placeholder {
            color: #ddd;
        }

        .form-control:focus {
            background: rgba(255, 255, 255, 0.3);
            box-shadow: none;
            color: white;
        }

        .btn-primary, .btn-success {
            border-radius: 25px;
            padding: 10px;
            font-weight: bold;
        }

        a {
            color: #ffeb3b;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        h4 {
            text-align: center;
            margin-bottom: 20px;
            color: #fff;
        }
    </style>
<div class="auth-card">

    <h4>🔐 Login to Your Account</h4>

    @if ($errors->any())
        <div class="alert alert-danger text-white">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('login') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" placeholder="example@email.com" value="{{ old('email') }}" required>
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" placeholder="********" required>
        </div>

        <button type="submit" class="btn btn-primary w-100">Login</button>

        <div class="text-center mt-3">
            <a href="{{ route('register') }}">Don't have an account? Register here</a>
        </div>
    </form>
</div>
