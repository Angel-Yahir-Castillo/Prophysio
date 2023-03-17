<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Verificacion de correo</title>
</head>
<body>
    
    <div class="container section">
        <div class="row">
            <div class="col s12">
                <p>Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.</p>
            </div>
        </div>
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="col s12">
            <p>A new verification link has been sent to the email address you provided during registration.</p> 
        </div>
    @endif

    <div class="col s12">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <button type="submit">
                    Resend Verification Email
                </button>
            </div>
        </form>

        <form method="POST" action="{{ route('user.logout') }}">
            @csrf

            <button type="submit" class="btn">
                Log Out
            </button>
        </form>
    </div>



    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            M.AutoInit();
        });
    </script>
</body>
</html>