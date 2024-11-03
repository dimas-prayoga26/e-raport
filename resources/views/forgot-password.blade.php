<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - Eraport SMAN 1 TUKDANA</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Mulish:wght@200;500;700&family=Poppins:wght@300;400;500;700;800&display=swap');
        
        /* Tambahan gaya untuk background abu-abu penuh */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5 !important;
        }

        .content-4-1 .btn:focus,
        .content-4-1 .btn:active {
            outline: none !important;
        }

        .content-4-1 .width-left {
            width: 0%;
        }

        .content-4-1 .width-right {
            width: 100%;
            height: 100%;
            padding: 8rem 2rem;
            background-color: #fcfdff;
        }

        .content-4-1 .centered {
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
        }

        .content-4-1 .right {
            width: 100%;
        }

        .content-4-1 .title-text {
            font: 600 1.875rem/2.25rem Poppins, sans-serif;
            margin-bottom: 0.75rem;
        }

        .content-4-1 .caption-text {
            font: 400 0.875rem/1.75rem Poppins, sans-serif;
            color: #a8adb7;
        }

        .content-4-1 .input-label {
            font: 500 1.125rem/1.75rem Poppins, sans-serif;
            color: #39465b;
        }

        .content-4-1 .div-input {
            font: 300 1rem/1.5rem Poppins, sans-serif;
            padding: 1rem 1.25rem;
            margin-top: 0.75rem;
            border-radius: 0.75rem;
            border: 1px solid #cacbce;
            color: #2a3240;
            transition: 0.3s;
        }

        .content-4-1 .div-input:focus-within {
            border: 1px solid #2ec49c;
            color: #2a3240;
            transition: 0.3s;
        }

        .content-4-1 .div-input input::placeholder {
            color: #cacbce;
            transition: 0.3s;
        }

        .content-4-1 .div-input:focus-within input::placeholder {
            color: #2a3240;
            outline: none;
            transition: 0.3s;
        }

        .content-4-1 .div-input .icon-toggle-empty-4-1 path,
        .content-4-1 .div-input:focus-within .icon path {
            transition: 0.3;
            fill: #2ec49c;
            transition: 0.3s;
        }

        .content-4-1 .input-field {
            font: 300 1rem/1.5rem Poppins, sans-serif;
            width: 100%;
            background-color: #fcfdff;
            transition: 0.3s;
        }

        .content-4-1 .input-field:focus {
            outline: none;
            transition: 0.3s;
        }

        .content-4-1 .forgot-password {
            font: 400 0.875rem/1.25rem Poppins, sans-serif;
            color: #abaec3;
            transition: 0.3s;
            text-decoration: none;
        }

        .content-4-1 .forgot-password:hover {
            color: #2a3240;
        }

        .content-4-1 .btn-fill {
            font: 500 1.25rem/1.75rem Poppins, sans-serif;
            background-image: linear-gradient(rgba(91, 203, 173, 1),
                    rgba(39, 194, 153, 1));
            padding: 0.75rem 1rem;
            margin-top: 2.25rem;
            border-radius: 0.75rem;
            transition: 0.5s;
        }

        .content-4-1 .btn-fill:hover {
            background-image: linear-gradient(#2ec49c, #2ec49c);
            transition: 0.5s;
        }

        .content-4-1 .bottom-caption {
            font: 400 0.875rem/1.25rem Poppins, sans-serif;
            margin-top: 2rem;
            color: #2a3240;
        }

        .content-4-1 .green-bottom-caption {
            color: #2ec49c;
            font-weight: 500;
        }

        .content-4-1 .green-bottom-caption:hover {
            color: #2ec49c;
            cursor: pointer;
            text-decoration: underline;
        }

        @media (min-width: 576px) {
            .content-4-1 .width-right {
                padding: 8rem 4rem;
            }

            .content-4-1 .right {
                width: 58.333333%;
            }
        }

        @media (min-width: 768px) {
            .content-4-1 .right {
                width: 66.666667%;
            }
        }

        @media (min-width: 992px) {
            .content-4-1 .width-left {
                width: 48%;
            }

            .content-4-1 .width-right {
                width: 52%;
            }

            .content-4-1 .right {
                width: 75%;
            }
        }

        .py-6 {
            padding-top: 6rem !important;
            padding-bottom: 6rem !important;
        }

        @media (min-width: 1200px) {
            .content-4-1 .right {
                width: 58.333333%;
            }
        }
    </style>
</head>

<body>
    <section class="h-100 w-100" style="box-sizing: border-box;">
        <div class="content-4-1 d-flex flex-column align-items-center h-100 flex-lg-row"
            style="font-family: 'Poppins', sans-serif; padding-top: 0px">
            <div class="position-relative d-none d-lg-block h-100 width-left">
                <img class="position-absolute img-fluid centered rounded-circle" src="/img/logosma1.png"
                    alt="" style="width: 200px;" />
            </div>
            <div id="page" class="d-flex mx-0 align-items-left justify-content-left width-right mx-lg-0">
                <div class="right mx-lg-0 mx-auto">
                    <div class="align-items-center justify-content-center mb-3 pb-3 d-lg-none d-flex">
                        <img class="img-fluid rounded-circle" src="/img/logosma1.png" alt=""
                            style="width: 200px;" />
                    </div>
                    <h3 class="title-text text-center mt-xs-3">Reset Password Pengguna</h3>
                    <p class="caption-text text-center">
                        Masukan email yang sudah pernah daftar
                    </p>
                    @if (session()->has('info'))
                        <div class="alert alert-warning alert-dismissible fade show btn-sm" role="alert">
                            {{ session('info') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                    <form style="margin-top: 1.5rem" action="{{ route('password.email') }}" method="POST">
                        @csrf
                        <div style="margin-bottom: 1.75rem">
                            <label for="email" class="d-block input-label">Email</label>
                            <div class="d-flex w-100 div-input">
                                <svg class="icon" style="margin-right: 1rem" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M5 5C3.34315 5 2 6.34315 2 8V16C2 17.6569 3.34315 19 5 19H19C20.6569 19 22 17.6569 22 16V8C22 6.34315 20.6569 5 19 5H5ZM5.49607 7.13174C5.01655 6.85773 4.40569 7.02433 4.13168 7.50385C3.85767 7.98337 4.02427 8.59422 4.50379 8.86823L11.5038 12.8682C11.8112 13.0439 12.1886 13.0439 12.4961 12.8682L19.4961 8.86823C19.9756 8.59422 20.1422 7.98337 19.8682 7.50385C19.5942 7.02433 18.9833 6.85773 18.5038 7.13174L11.9999 10.8482L5.49607 7.13174Z"
                                        fill="#CACBCE" />
                                </svg>
                                <input class="input-field border-0" value="{{ old('email') }}" type="text" name="email" id="email"
                                    placeholder="Masukkan email" autofocus required />
                            </div>
                        </div>
                        <button class="btn btn-fill text-white d-block w-100" type="submit">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Password toggle -->
        <script>
            function togglePassword() {
                var x = document.getElementById("password");
                if (x.type === "password") {
                    x.type = "text";
                    document
                        .getElementById("icon-toggle")
                        .setAttribute("fill", "#2ec49c");
                } else {
                    x.type = "password");
                    document
                        .getElementById("icon-toggle")
                        .setAttribute("fill", "#CACBCE");
                }
            }
        </script>
    </section>
    <script src="/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>
</body>

</html>
