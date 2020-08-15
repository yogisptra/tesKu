<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login V14</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
    <link rel="icon" type="image/png" href="{{asset('user/images/icons/favicon.ico')}}"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('user/vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('user/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('user/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('user/vendor/animate/animate.css')}}">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="{{asset('user/vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('user/vendor/animsition/css/animsition.min.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('user/vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="{{asset('user/vendor/daterangepicker/daterangepicker.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('user/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('user/css/main.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js">
<!--===============================================================================================-->
</head>
<body>
    
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
            @if(\Session::has('alert'))
            <div class="alert alert-danger">
                <div>{{Session::get('alert')}}</div>
            </div>
            @endif
            @if(\Session::has('alert-success'))
            <div class="alert alert-success">
                <div>{{Session::get('alert-success')}}</div>
            </div>
            @endif
                <form id="formregister" action="{{route('register.store')}}" method="POST" class="login100-form validate-form flex-sb flex-w">
                    @csrf
                    <span class="login100-form-title p-b-32">
                        Account Register
                    </span>

                    <span class="txt1 p-b-11">
                        Username
                    </span>
                    <div class="wrap-input100 validate-input m-b-36" data-validate = "Username is required">
                        <input class="input100" type="text" name="name" >
                        <span class="focus-input100"></span>
                    </div>

                    <span class="txt1 p-b-11">
                        Email
                    </span>
                    <div class="wrap-input100 validate-input m-b-36" data-validate = "Email is required">
                        <input class="input100" type="text" name="email" >
                        <span class="focus-input100"></span>
                    </div>
                    
                    <span class="txt1 p-b-11">
                        Password
                    </span>
                    <div class="wrap-input100 validate-input m-b-12" data-validate = "Password is required">
                        <span class="btn-show-pass">
                            <i class="fa fa-eye"></i>
                        </span>
                        <input class="input100" type="password" name="password" >
                        <span class="focus-input100"></span>
                    </div>
                    
                    <div class="flex-sb-m w-full p-b-48">

                        <div>
                            <a href="{{url('akses/login')}}" class="txt3">
                                have account?
                            </a>
                        </div>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" type="submit" id="verify_akses" >
                            Register
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    

    <div id="dropDownSelect1"></div>
    
<!--===============================================================================================-->
    <script src="{{asset('user/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
    <script src="{{asset('user/vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
    <script src="{{asset('user/vendor/bootstrap/js/popper.js')}}"></script>
    <script src="{{asset('user/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
    <script src="{{asset('user/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
    <script src="{{asset('user/vendor/daterangepicker/moment.min.js')}}"></script>
    <script src="{{asset('user/vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
    <script src="{{asset('user/vendor/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
    <script src="{{asset('user/js/main.js')}}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    // Alert Add Mobil
    <script type="text/javascript">
         $('#verify_akses').on('click', function (e)  {
                  e.preventDefault();
                
                  swal({
                  title: "Apakah data benar?",
                  text: "Apabila anda yakin, Data akan tersimpan!",
                  icon: "success",
                  buttons: true,
                  dangerMode: true,
                }).then((result) =>{
                    if(result){
                   $("#formregister").submit();
                      location.reload();
                     
                         swal({
                          title: "Check E-Mail",
                          icon: "success",
                          buttons: true,
                        });
               
                     
                    } else {
                          swal("Data gagal disimpan!");
                      }
                });
            
          });
    </script>

</body>
</html>