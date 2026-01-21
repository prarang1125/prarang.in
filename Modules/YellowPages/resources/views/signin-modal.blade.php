<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Authentiction</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <!-- Sign In Modal -->
    <div class="modal fade" id="signInModal" tabindex="-1" role="dialog" aria-labelledby="signInModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="border-radius: 8px; border: 1px solid #ccc;">
                <div class="modal-header" style="background-color: #007bff; color: white;">
                    <h5 class="modal-title" id="signInModalLabel">{{ __('yp.sign_in') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        style="color: white;"></button>
                </div>
                <div class="modal-body" style="padding: 20px;">
                    <div id="loginError" class="text-danger mt-2" style="display: none;"></div>
                    <form method="POST" action="{{ route('yp.authLogin') }}">

                        @csrf
                        <div class="form-group">
                            <label for="loginEmail">{{ __('yp.email_address') }}</label>
                            <input type="email" class="form-control" id="loginEmail" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="loginPassword">{{ __('yp.password') }}</label>
                            <input type="password" class="form-control" id="loginPassword" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">{{ __('yp.log_in') }}</button>
                        <p style="margin-top: 10px;">{{ __('yp.dont_have_account') }} <a href="#" data-bs-toggle="modal"
                                data-bs-target="#registerModal" data-bs-dismiss="modal">{{ __('yp.register') }}</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Registration Modal -->
    <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="border-radius: 8px; border: 1px solid #ccc;">
                <div class="modal-header" style="background-color: #007bff; color: white;">
                    <h5 class="modal-title" id="registerModalLabel">{{ __('yp.register') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        style="color: white;"></button>
                </div>
                <div class="modal-body" style="padding: 20px;">
                    <div id="registerError" class="text-danger mt-2" style="display: none;"></div>
                    <form method="POST" action="{{ route('yp.register') }}">

                        @csrf
                        <div class="form-group">
                            <label for="registerName">{{ __('yp.full_name') }}</label>
                            <input type="text" class="form-control" id="registerName" name="name">
                        </div>
                        <div class="form-group">
                            <label for="registerEmail">{{ __('yp.email_address') }}</label>
                            <input type="email" class="form-control" id="registerEmail" name="email">
                        </div>
                        <div class="form-group">
                            <label for="registerPassword">{{ __('yp.password') }}</label>
                            <input type="password" class="form-control" id="registerPassword" name="password">
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">{{ __('yp.confirm_password') }}</label>
                            <input type="password" class="form-control" id="password_confirmation"
                                name="password_confirmation">
                        </div>
                        <button type="submit" class="btn btn-primary">{{ __('yp.register') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>