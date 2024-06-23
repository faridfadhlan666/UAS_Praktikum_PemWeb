<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Login & Registrasi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #74ebd5, #ACB6E5);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 360px;
            padding: 30px;
            overflow: hidden;
            position: relative;
        }
        .container h2 {
            text-align: center;
            margin-bottom: 25px;
            font-size: 24px;
            color: #333;
        }
        .container input[type="text"],
        .container input[type="email"],
        .container input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 12px 0;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
            font-size: 14px;
        }
        .container input[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
        }
        .container input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .container .link {
            text-align: center;
            margin-top: 15px;
        }
        .container .link a {
            color: #007bff;
            text-decoration: none;
            font-size: 14px;
        }
        .container .link a:hover {
            text-decoration: underline;
        }
        .tab {
            display: flex;
            justify-content: space-around;
            margin-bottom: 25px;
        }
        .tab button {
            padding: 12px 24px;
            border: none;
            background: none;
            cursor: pointer;
            font-size: 16px;
            border-bottom: 2px solid transparent;
            transition: border-bottom 0.3s;
        }
        .tab .active {
            border-bottom: 2px solid #007bff;
            color: #007bff;
        }
        .form-wrapper {
            display: flex;
            width: 200%;
            transition: transform 0.5s ease-in-out;
        }
        #loginForm, #registerForm {
            width: 50%;
            padding: 30px;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="tab">
            <button class="active" onclick="showLogin()">Login</button>
            <button onclick="showRegister()">Daftar</button>
        </div>
        <div class="form-wrapper" id="formWrapper">
            <div id="loginForm">
                <h2 id="formTitle">Form Login</h2>
                <form action="login.php" method="POST">
                    <input type="text" name="username" placeholder="Masukan Username" required>
                    <input type="password" name="password" placeholder="Masukan Password" required>
                    <div class="link"><a href="#">Lupa password?</a></div>
                    <input type="submit" value="Login">
                    <div class="link">Belum punya akun? <a href="#" onclick="showRegister()">Daftar sekarang</a></div>
                </form>
            </div>
            <div id="registerForm">
                <h2 id="formTitle">Form Registrasi</h2>
                <form action="register.php" method="POST">
                    <input type="text" name="name" placeholder="Nama lengkap" required>
                    <input type="email" name="email" placeholder="Masukan Email" required>
                    <input type="text" name="username" placeholder="Masukan Username" required>
                    <input type="password" name="password" placeholder="Masukan Password" required>
                    <input type="password" name="confirm_password" placeholder="Ulangi password" required>
                    <input type="submit" value="Daftar">
                    <div class="link">Sudah punya akun? <a href="#" onclick="showLogin()">Login sekarang</a></div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function showLogin() {
            document.getElementById('formWrapper').style.transform = 'translateX(0)';
            document.querySelector('.tab button').classList.add('active');
            document.querySelector('.tab button:last-child').classList.remove('active');
        }
        
        function showRegister() {
            document.getElementById('formWrapper').style.transform = 'translateX(-50%)';
            document.querySelector('.tab button').classList.remove('active');
            document.querySelector('.tab button:last-child').classList.add('active');
        }
    </script>
</body>
</html>