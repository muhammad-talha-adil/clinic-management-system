@extends('auth.master')
@section('title', 'Sign In -' . config('app.short_name'))

@section('login')
    <div class="flex flex-col items-center justify-center flex-grow bg-[#418792] py-8 ">
        <div class="w-full max-w-6xl grid grid-cols-1 md:grid-cols-2 min-h-[600px] animate-fadeIn">

            <!-- Left side: White Login Card with right shadow -->
            <div
                class="flex flex-col justify-center items-center p-10 bg-white rounded-l-2xl shadow-xl md:shadow-2xl relative z-10">
                <div class="w-full max-w-sm">
                    <h2 class="text-center text-2xl font-bold text-gray-800">SIGN IN</h2>
                    <p class="text-center text-sm text-gray-500 mb-8">Access your {{(config('app.name'))}} account</p>

                    <form   id="loginForm" class="space-y-5">
                        

                        <!-- Username -->
                        <div>
                            {{-- <input id="username" name="username" type="text" autocomplete="username" required
                                class="form-input-custom" placeholder="Username"> --}}
                            <x-form-input-field id="username" name="username" type="text" placeholder="Username" required
                                class="" />
                        </div>

                        <!-- Password with toggle -->
                        <div class="relative">
                            {{-- <input id="password" name="password" type="password" autocomplete="current-password"
                                required class="form-input-custom pr-10" placeholder="Password"> --}}
                            <x-form-input-field id="password" name="password" type="password" placeholder="Password"
                                required class="pr-10" />
                            <button type="button" id="togglePassword"
                                class="absolute inset-y-0 right-0 px-3 flex items-center text-gray-400 hover:text-gray-600 focus:outline-none">
                                <!-- Eye icon -->
                                <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                            <p id="passwordError" class="hidden text-xs text-red-600 mt-1"></p>
                        </div>

                        <!-- Login Button -->
                        <div>
                            <button type="submit"
                                class="btn-login-gradient transition transform hover:scale-[1.02]">Login</button>
                        </div>

                        <!-- Forgot Password -->
                        <div class="text-center">
                            <a href="#" class="text-sm text-blue-600 hover:underline">Forgot Password?</a>
                        </div>
                    </form>

                    <!-- Footer Branding -->
                    <p class="text-center text-xs text-gray-400 mt-6">{{config('app.name')}} © {{date('Y')}}</p>
                </div>
            </div>

            <!-- Right side: Doctor Image, dimmed, outer rounded only -->
            <div class="relative flex items-center justify-center bg-[#418792] rounded-r-2xl border-l border-gray-200">
                {{-- <img src="{{ asset('images/doc.jpg') }}" alt="Doctor" class="w-full h-full object-cover opacity-80">
                --}}
                <x-image src="doc.jpg" alt="Doctor" class="w-full h-full object-cover opacity-80" />


                <!-- Branding -->
                <div class="absolute top-4 right-4">
                    {{-- <span class="text-white font-bold text-xl drop-shadow-lg">{{config('app.short_name')}}</span> --}}
                    <x-image class="drop-shadow-lg rounded-2xl" src="logo.png" width="130" height="130" alt="LOGO" />

                </div>
            </div>
        </div>
    </div>
@endsection

@section('page_level_scripts')

    <script>
        // Toggle password visibility
        $('#togglePassword').on('click', function () {
            const passwordField = $('#password');
            const eyeIcon = $('#eyeIcon');

            if (passwordField.attr('type') === 'password') {
                passwordField.attr('type', 'text');
                eyeIcon.html(`
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13.875 18.825A10.05 10.05 0 0112 19c-4.477 0-8.268-2.943-9.542-7a9.974 9.974 0 012.25-3.955M9.88 9.88a3 3 0 104.24 4.24m1.768-5.009A9.953 9.953 0 0112 5c-4.477 0-8.268 2.943-9.542 7a9.978 9.978 0 001.684 3.316M15 12a3 3 0 01-6 0 3 3 0 016 0z" />
                    `);
            } else {
                passwordField.attr('type', 'password');
                eyeIcon.html(`
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    `);
            }
        });

        // jQuery AJAX Form Submit
        $('#loginForm').on('submit', function (e) {
            e.preventDefault();

            // Clear previous errors
            $('#usernameError').addClass('hidden').text('');
            $('#passwordError').addClass('hidden').text('');

            let formData = {
                _token: $('input[name="_token"]').val(),
                username: $('#username').val().trim(),
                password: $('#password').val().trim(),
            };

            $.ajax({
                url: apiURL + "/login",
                method: "POST",
                data: formData,
                beforeSend: function () {
                    // Disable button while loading
                    $('.btn-login-gradient').prop('disabled', true).text('Logging in...');
                },
                success: function (response) {
                    // Example: expecting JSON { success: true, redirect: "/dashboard" }
                    if (response.success) {
                        // window.location.href = response.redirect;
                        alert('Login successful! Redirecting...');
                    } else {
                        alert(response.message || 'Invalid credentials');
                    }
                },
                error: function (xhr) {
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        if (errors.username) {
                            $('#usernameError').removeClass('hidden').text(errors.username[0]);
                        }
                        if (errors.password) {
                            $('#passwordError').removeClass('hidden').text(errors.password[0]);
                        }
                    } else {
                        alert('Something went wrong. Please try again.');
                    }
                },
                complete: function () {
                    // Enable button again
                    $('.btn-login-gradient').prop('disabled', false).text('Login');
                }
            });
        });
    </script>

    <style>
        /* Smooth entry animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fadeIn {
            animation: fadeIn 0.6s ease-out;
        }

        /* Gradient login button */
        .btn-login-gradient {
            position: relative;
            width: 100%;
            display: flex;
            justify-content: center;
            padding: 0.6rem 1rem;
            border-radius: 0.375rem;
            font-size: 0.9rem;
            font-weight: 600;
            color: white;
            background: linear-gradient(to right, #0f8791, #2563EB);
            transition: background 0.3s ease, transform 0.2s ease;
        }

        .btn-login-gradient:hover {
            background: linear-gradient(to right, #0d6d73, #1d4ed8);
        }

        .btn-login-gradient:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.4);
        }
    </style>
@endsection