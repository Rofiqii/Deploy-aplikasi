<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>IS-USG DOMBA</title>
  <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/favicon.png') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/styles-auth.css') }}" />
</head>

<body>
<!--  Body Wrapper -->
<div id="main-wrapper" class="p-0 auth-customizer-none">
  <div class="position-relative overflow-hidden min-vh-100 w-100">
    <div class="position-relative">
      <div class="row gx-0">

        <div class="col-lg-6 col-xl-5 col-xxl-4 d-lg-block d-none">
          <div class="auth-left-bg min-vh-100 bg-body row justify-content-center align-items-center p-5">
            <img src="{{ asset('assets/images/sheep/sheep-auth.jpeg') }}"/>
          </div>
        </div>
        
        <div class="col-lg-6 col-xl-7 col-xxl-8 position-relative overflow-hidden bg-white">
          <div class="pt-7 pb-9 px-7 overflow-auto vh-100 bg-body row justify-content-center align-items-center">

            <div class="d-flex flex-column justify-content-center gap-5 auth-form mx-auto">
              @yield('content-auth')
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
<script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
      const emailInput = document.getElementById('email');
      const passwordInput = document.getElementById('password');
      const errorAlert = document.getElementById('error-alert');

      const removeErrorAlert = () => {
          if (errorAlert) {
              errorAlert.style.display = 'none';
          }
      };

      emailInput.addEventListener('input', removeErrorAlert);
      passwordInput.addEventListener('input', removeErrorAlert);
  });
</script>

</body>
</html>
                