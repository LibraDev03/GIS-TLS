@extends('layouts.user.client')
@section('main')
      <!-- Login/Register Form -->
    <div class="form-container">
        <div class="form-header">
            <h2 id="form-title">Đăng kí</h2>
        </div>
        <form action=""  method="POST">
            @csrf
            <!-- Username and Email -->
            <div class="form-group-row">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" placeholder="Nhập email của bạn" required name="email">
                </div>
                <div class="form-group">
                    <label for="name">Họ tên của bạn</label>
                    <input type="text" id="name" placeholder="Nhập họ tên của bạn" required name="name">
                </div>
            </div>
        
            <!-- Password and Confirm Password -->
            <div class="form-group-row">
                <div class="form-group">
                    <label for="password">Mật khẩu</label>
                    <input type="password" id="password" placeholder="Nhập mật khẩu của bạn" required name="password">
                </div>
                <div class="form-group">
                    <label for="confirm-password">Xác nhận mật khẩu</label>
                    <input type="password" id="confirm_password" placeholder="Xác nhận mật khẩu của bạn" required name="confirm_password">
                </div>
            </div>
        
            <!-- Other Information -->
            <div class="form-group-row">
                <div class="form-group">
                    <label for="phone">Số điện thoại</label>
                    <input type="text" id="phone" placeholder="Nhập số điện thoại của bạn" required name="phone">
                </div>
                <div class="form-group">
                    <label for="gender">Giới tính</label>
                    <select id="gender" required name="gender">
                        <option value="">Chọn giới tính</option>
                        <option value="nam">Nam</option>
                        <option value="nu">Nữ</option>
                        <option value="khac">Khác</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="birthday">Sinh nhật</label>
                    <input type="date" id="birthday" required name="birthday">
                </div>
            </div>
        
            <!-- Submit Button -->
            <button type="submit" class="form-button">Đăng Kí</button>
        
            <!-- Toggle Login/Register -->
            <div class="form-switch-container">
                <p class="form-switch">
                    <a href="#" id="reset-password">Lấy lại mật khẩu</a>
                </p>
                <p class="form-switch">
                    <a href="{{route('authen.login')}}">Đăng nhập</a>
                </p>
            </div>
        </form>
        
    </div>

    <style>
        body, html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            height: 100vh; /* Chiều cao toàn màn hình */
            background-color: #f5f5f5;
            display: flex; /* Kích hoạt Flexbox */
            justify-content: center; /* Căn giữa theo chiều ngang */
            align-items: center; /* Căn giữa theo chiều dọc */
            box-sizing: border-box;
        }

        /* Form Container */
        .form-container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 600px; /* Tăng chiều rộng để có đủ không gian */
            padding: 20px 30px;
            margin: 70px 450px;
        }


        /* Form Header */
        .form-header h2 {
            margin: 0;
            color: #333;
        }

        /* Form Group Row */
        .form-group-row {
            display: flex;
            justify-content: space-between;
            gap: 15px; /* Khoảng cách giữa các ô */
            margin: 15px 0;
        }

        /* Form Group */
        .form-group {
            flex: 1; /* Các cột sẽ chiếm không gian bằng nhau */
            text-align: left;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group input,
        .form-group select {
            width: 100%; /* Chiều rộng của input luôn đầy đủ */
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box; /* Đảm bảo padding không làm tăng chiều rộng */
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
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 15px;
        }

        .form-switch {
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
    {{-- <script>
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

    </script> --}}

    <script src="script.js"></script>
@endsection