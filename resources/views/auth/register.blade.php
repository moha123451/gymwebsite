<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gym Registration Form</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEJzQFvlY6f5+O6g6Q19dDEf1mNOntA5wSFMz1FzGcvhOn34HbFQvo0Q9U6r0" crossorigin="anonymous">
    <style>
      body {
    background-color: #f7f7f7;
    color: #333;
    font-family: Arial, sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100%
    margin: 0;
}

.container {
    width: 50%;
    max-width: 1000px;
    padding: 10px;
}

.form-container {
    background-color: #ffffff;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    background-size: cover;
    background-position: center;
}

.form-title {
    text-align: center;
    margin-bottom: 20px;
    font-size: 2rem;
    color: #f27c3e;
}

/* جعل الأزرار تكون في المنتصف */
button {
    padding: 10px 15px;
    background-color: #f27c3e;
    border: none;
    border-radius: 4px;
    color: #fff;
    font-size: 16px;
    cursor: pointer;
    width: 100%;
    margin-top: 10px;
    text-align: center;
}

button:hover {
    background-color: #e26a2a;
}

/* خيارات الجنس - إما اليمين أو اليسار */
.gender-options {
    display: flex;
    justify-content: space-evenly;
}

/* ترتيب الـ label مع الـ input بجانب بعض */
.form-group {
    display: flex;
    justify-content: space-between;
    margin-bottom: 15px;
    align-items: center;
}

.form-group label {
    width: 30%;
    font-weight: bold;
    color: #333;
}

.form-group input, .form-group select {
    width: 65%;
    padding: 8px;
    font-size: 14px;
    border-radius: 4px;
    border: 1px solid #ccc;
    background-color: #f4f4f4;
    color: #333;
}

/* تنسيق الأزرار ذات التصميم الخاص */
.btn-link {
    width: 100%;
    text-align: center;
    margin-top: 10px;
}

/* تنسيق التنبيهات */
.alert {
    background-color: #f8d7da;
    color: #721c24;
    padding: 10px;
    margin-bottom: 20px;
}


    </style>
</head>
<body>

    <div class="container">
        <div class="col-lg-8 mx-auto form-container">
            <h1 class="form-title">Gym Registration</h1>

            <form action="{{ route('register') }}" method="POST">
                @csrf

                <!-- Personal Information Section -->
                <div class="section-title">Personal Information</div>

                <!-- First Name -->
                <div class="form-group">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" name="First_Name" id="first_name" class="form-control @error('First_Name') is-invalid @enderror" value="{{ old('First_Name') }}" required>
                    @error('First_Name')<div class="alert">{{ $message }}</div>@enderror
                </div>

                <!-- Last Name -->
                <div class="form-group">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" name="Last_name" id="last_name" class="form-control @error('Last_name') is-invalid @enderror" value="{{ old('Last_name') }}" required>
                    @error('Last_name')<div class="alert">{{ $message }}</div>@enderror
                </div>

                <!-- Email Address -->
                <div class="form-group">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                    @error('email')<div class="alert">{{ $message }}</div>@enderror
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" required>
                    @error('password')<div class="alert">{{ $message }}</div>@enderror
                </div>

                <!-- Confirm Password -->
                <div class="form-group">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" required>
                    @error('password_confirmation')<div class="alert">{{ $message }}</div>@enderror
                </div>

                <!-- Phone Number -->
                <div class="form-group">
                    <label for="phone_number" class="form-label">Phone Number</label>
                    <input type="text" name="phone_number" id="phone_number" class="form-control @error('phone_number') is-invalid @enderror" value="{{ old('phone_number') }}" required>
                    @error('phone_number')<div class="alert">{{ $message }}</div>@enderror
                </div>

                <!-- Date of Birth -->
                <div class="form-group">
                    <label for="dob" class="form-label">Date of Birth</label>
                    <input type="date" name="date_of_birth" id="dob" class="form-control @error('date_of_birth') is-invalid @enderror" required>
                    @error('date_of_birth')<div class="alert">{{ $message }}</div>@enderror
                </div>

                <!-- Gender -->
                <div class="form-group">
                    <label for="gender" class="form-label">Gender</label>
                    <div class="gender-options">
                        <input type="radio" name="Gender" value="Male" id="male" class="@error('Gender') is-invalid @enderror" required>
                        <label for="male">Male</label>

                        <input type="radio" name="Gender" value="Female" id="female" class="@error('Gender') is-invalid @enderror" required>
                        <label for="female">Female</label>
                    </div>
                    @error('Gender')<div class="alert">{{ $message }}</div>@enderror
                </div>

                <!-- Address -->
                <div class="form-group">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" name="Adress" id="address" class="form-control @error('Adress') is-invalid @enderror" value="{{ old('Adress') }}" required>
                    @error('Adress')<div class="alert">{{ $message }}</div>@enderror
                </div>

                <!-- Current Weight -->
                <div class="form-group">
                    <label for="current_weight" class="form-label">Current Weight (kg)</label>
                    <input type="number" name="Current_weight" id="current_weight" class="form-control @error('Current_weight') is-invalid @enderror" value="{{ old('Current_weight') }}" required>
                    @error('Current_weight')<div class="alert">{{ $message }}</div>@enderror
                </div>

                <!-- Height -->
                <div class="form-group">
                    <label for="height" class="form-label">Height (cm)</label>
                    <input type="number" name="Height" id="height" class="form-control @error('Height') is-invalid @enderror" value="{{ old('Height') }}" required>
                    @error('Height')<div class="alert">{{ $message }}</div>@enderror
                </div>

                <!-- BMI -->
                <div class="form-group">
                    <label for="bmi" class="form-label">Body Mass Index (BMI)</label>
                    <input type="number" name="Bmi" id="bmi" class="form-control @error('Bmi') is-invalid @enderror" value="{{ old('Bmi') }}" required>
                    @error('Bmi')<div class="alert">{{ $message }}</div>@enderror
                </div>

                <!-- Goal Weight -->
                <div class="form-group">
                    <label for="goal_weight" class="form-label">Goal Weight (kg)</label>
                    <input type="number" name="Goal_Weight" id="goal_weight" class="form-control @error('Goal_Weight') is-invalid @enderror" value="{{ old('Goal_Weight') }}" required>
                    @error('Goal_Weight')<div class="alert">{{ $message }}</div>@enderror
                </div>

                <!-- Membership Type -->
                <div class="form-group">
                    <label for="membership_type" class="form-label">Membership Type</label>
                    <select name="membership_type" id="membership_type" class="form-control @error('membership_type') is-invalid @enderror" required>
                        <option value="monthly">Monthly Membership</option>
                        <option value="yearly">Yearly Membership</option>
                        <option value="3months">3-Month Membership</option>
                        <option value="6months">6-Month Membership</option>
                    </select>
                    @error('membership_type')<div class="alert">{{ $message }}</div>@enderror
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary">Submit</button>

                <!-- Already Have an Account Link -->
                <button type="button" class="btn btn-primary text-white" onclick="window.location.href='{{ route('login') }}';">
                    Already have an account?
                </button>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0s4sD5cJ+gJvG0QxV0l88v5uFqL23MzgEx7j27rX3zVvlYZ5" crossorigin="anonymous"></script>
</body>

</html>
