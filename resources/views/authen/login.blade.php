@extends('layouts.client')
@section('main')
      <!-- Login/Register Form -->
    <div class="form-container">
        <div class="form-header">
            <h2 id="form-title">Login</h2>
        </div>
        <form id="auth-form">
            <!-- Username/Email -->
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" placeholder="Nhập email của bạn" required>
            </div>
            <!-- Password -->
            <div class="form-group">
                <label for="password">Mật Khẩu</label>
                <input type="password" id="password" placeholder="Nhập mật khẩu của bạn" required>
            </div>
            <!-- Switch to Register -->
            <div id="additional-fields" style="display: none;">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" placeholder="Enter your username">
                </div>
                <div class="form-group">
                    <label for="confirm-password">Confirm Password</label>
                    <input type="password" id="confirm-password" placeholder="Confirm your password">
                </div>
            </div>
            <!-- Submit Button -->
            <button type="submit" class="form-button">Đăng nhập</button>
            <!-- Toggle Login/Register -->
            <div class="form-switch-container">
                <p class="form-switch">
                   <a href="#" id="reset-password">Lấy lại mật khẩu</a>
                </p>
                <p class="form-switch">
                    <a href="#" id="toggle-form">Đăng ký</a>
                </p>
            </div>
            
        </form>
    </div>

    <style>/* General Reset */
        /* General Reset */
        body, html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            height: 100vh; /* Chiều cao toàn màn hình */
            background-color: #f5f5f5;
            display: flex;
            justify-content: center; /* Căn giữa theo chiều ngang */
            align-items: center; /* Căn giữa theo chiều dọc */
        }

        /* Form Container */
        .form-container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 400px;
            padding: 20px 30px;
            text-align: center;
            margin: auto;
            margin-top: 140px;
            /* display: flex;
            flex-direction: column; 
            justify-content: center;  */
        }

        /* Form Header */
        .form-header h2 {
            margin: 0;
            color: #333;
        }

        /* Form Group */
        .form-group {
            margin: 15px 0;
            text-align: left;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        /* Submit Button */
        .form-button {
            width: 100%;
            padding: 10px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
        }

        .form-button:hover {
            background-color: #555;
        }

        /* Form Switch */
        .form-switch-container {
            display: flex; /* Sử dụng Flexbox để căn ngang */
            justify-content: space-between; /* Tạo khoảng cách giữa các mục */
            align-items: center; /* Căn chỉnh theo chiều dọc */
            margin-top: 15px;
        }

        .form-switch {
            margin: 0; /* Loại bỏ khoảng cách mặc định của thẻ <p> */
            font-size: 14px;
            color: #333;
        }

        .form-switch a {
            color: #007bff;
            text-decoration: none;
            cursor: pointer;
        }

        .form-switch a:hover {
            text-decoration: underline;
        }


        </style>
        <script>
            // Toggle Login/Register Form
            const toggleForm = document.getElementById('toggle-form');
            const formTitle = document.getElementById('form-title');
            const additionalFields = document.getElementById('additional-fields');
            const authForm = document.getElementById('auth-form');

            toggleForm.addEventListener('click', (event) => {
                event.preventDefault();

                if (formTitle.innerText === "Login") {
                    formTitle.innerText = "Register";
                    additionalFields.style.display = "block";
                    toggleForm.innerText = "Already have an account? Login";
                } else {
                    formTitle.innerText = "Login";
                    additionalFields.style.display = "none";
                    toggleForm.innerText = "Don't have an account? Register";
                }
            });

            authForm.addEventListener('submit', (event) => {
                event.preventDefault();
                alert(`${formTitle.innerText} successful!`);
            });

        </script>

    <script src="script.js"></script>
@endsection