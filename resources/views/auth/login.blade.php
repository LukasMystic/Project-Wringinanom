<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login - Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-dark">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container d-flex align-items-center justify-content-center" style="height: 100vh;">
                        <div class="row justify-content-center w-5">
                            <div class="card shadow-lg border-0 rounded-lg">
                                <div class="card-header">
                                    @if (Session::has('error'))
                                        <script>
                                            alert( "{{ session('error') }}" )
                                        </script>
                                    @endif
                                    <h3 class="text-center font-weight-light my-4">Login</h3>
                                </div>
                                <div class="card-body text-center">
                                    <p>Silakan Login Menggunakan Akun Google</p>
                                    <a href='{{url('auth/redirect')}}' class="btn border border-primary"> <img width="30px" style="margin-bottom:3px; margin-right:5px" alt="Google sign-in"
                                        src="https://www.salesforceben.com/wp-content/uploads/2021/03/google-logo-icon-PNG-Transparent-Background-2048x2048.png" /> Login dengan Google </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
