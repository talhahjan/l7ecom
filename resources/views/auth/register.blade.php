@extends('layouts.User.auth')

@section('title', 'T.J Shoes Collection ::Register')


@section('content')
<nav class="navbar navbar-expand navbar-transparent navbar-absolute fixed-top text-white">
<<<<<<< HEAD
    <ul class="navbar-nav d-md-flex mr-auto">
    <li class="nav-item"><a class="nav-link" href="#"><i class="material-icons">home</i>Home</a></li>
    </ul>
    <ul class="navbar-nav">
    <li  class="nav-item"><a href="{{ route('login') }}" class="nav-link"> <i class="material-icons">lock</i>Login </a></li>
    <li  class="nav-item active"><a href="{{ route('register') }}" class="nav-link"> <i class="material-icons">person_add</i>Register </a></li>
=======
  <ul class="navbar-nav d-md-flex mr-auto">
    <li class="nav-item"><a class="nav-link" href="#"><i class="material-icons">home</i>Home</a></li>
  </ul>
  <ul class="navbar-nav">
    <li class="nav-item"><a href="{{ route('login') }}" class="nav-link"> <i class="material-icons">lock</i>Login </a></li>
    <li class="nav-item active"><a href="{{ route('register') }}" class="nav-link"> <i class="material-icons">person_add</i>Register </a></li>
>>>>>>> 3b677d2... admin panel 90% ready add create manage user

  </ul> <!-- list-inline //  -->
</nav>


<div class="wrapper wrapper-full-page">
<<<<<<< HEAD
    <div class="page-header login-page header-filter" filter-color="black" style="background-image: url('{{ asset('assets/img/login.jpg') }}'); background-size: cover; background-position: top center;">
      <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
      <div class="container">
        <div class="row">
          <div class="col-sm-6 col-md-8 ml-auto mr-auto" style="max-width: 500px;">

          <div class="card card-signup">

          <div class="card-header-rose text-center">
<h4 class="card-title">
 <strong>Register with your social account</strong></h4>


</div>
=======
  <div class="page-header login-page header-filter" filter-color="black" style="background-image: url('{{ asset('assets/img/login.jpg') }}'); background-size: cover; background-position: top center;">
    <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-md-8 ml-auto mr-auto" style="max-width: 500px;">

          <div class="card card-login card-hidden">

            <div class="card-header-rose text-center">
              <h4 class="card-title">
                <strong>Register with your social account</strong></h4>


            </div>
>>>>>>> 3b677d2... admin panel 90% ready add create manage user

            <div class="card-body">




<<<<<<< HEAD
<div class="social-line text-center">
                    <a href="login/facebook" class="btn-social btn-outline-facebook btn-social-circle waves-effect waves-light m-1"><i class="fa fa-facebook"></i></a>
               <a href="login/twitter" class="btn-social btn-outline-twitter btn-social-circle waves-effect waves-light m-1"><i class="fa fa-twitter"></i></a>
               <a href="login/google" class="btn-social btn-outline-google-plus btn-social-circle waves-effect waves-light m-1"><i class="fa fa-google-plus"></i></a>
               <a href="login/instagram" class="btn-social btn-outline-instagram waves-effect btn-social-circle waves-light m-1"><i class="fa fa-instagram"></i></a>


                 </div>

                 <br />

                 <p class="card-description text-center">or be classical</p>

                       <form method="POST" action="{{ route('register') }}">
                        @csrf



                        <div class="row">

                            <div class="col-md">

                                <div class="form-set">
                                    <div class="form-input inputWithIcon">
                                    <input id="first_name" type="first_name" @error('first_name') is-invalid @enderror name="first_name"  value="{{ old('first_name') }}" required autocomplete="first_name" placeholder="{{ __('First name') }}">
                                     <i class="material-icons" aria-hidden="true">face</i>
                                    </div>
                                    </div>

                            </div>

                            <div class="col-md">
                                <div class="form-set">
                                    <div class="form-input inputWithIcon">
                                    <input id="last_name" type="last_name" @error('last_name') is-invalid @enderror name="last_name"  value="{{ old('last_name') }}" required autocomplete="last_name" placeholder="{{ __('Last Name') }}">
                                     <i class="material-icons" aria-hidden="true">face</i>
                                    </div>
                                    </div>

                            </div>

                            </div>



<div class="form-set">
<div class="form-input inputWithIcon">
<input id="email" type="email" @error('email') is-invalid @enderror" name="email"  value="{{ old('email') }}" required autocomplete="email" placeholder="{{ __('E-Mail Address') }}">
 <i class="material-icons" aria-hidden="true">email</i>
</div>
</div>



<div class="form-set">
<div class="form-input inputWithIcon">
<input id="password" type="password" @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="{{ __('Password') }}">
 <i class="material-icons" aria-hidden="true">lock</i>
</div>
</div>

<div class="form-set">
<div class="form-input inputWithIcon">
<input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="{{ __('Confirm Password') }}" >
 <i class="material-icons" aria-hidden="true">lock</i>
</div>
</div>

<div class="form-group">
<span class="float-right text-muted">
  Allready have an ID ?
            <a href="{{ route('login') }}"> Log in </a> </span>
            <label class="float-left custom-control custom-checkbox"> <input type="checkbox" class="custom-control-input" checked=""> <div class="custom-control-label"> Remember </div> </label>
          </div> <!-- form-group form-check .// -->



          <div class="form-group">
          <button class="btn btn-info btn-block btn-dark" type="submit">{{ __('Register') }}</button>
         </div> <!-- form-group// -->

<br />



             </div>
       </div>




</form>


<div>
</div>


             </div>
            </div>
          </div>

@endsection
=======
              <div class="social-line text-center">
                <a href="login/facebook" class="btn-social btn-outline-facebook btn-social-circle waves-effect waves-light m-1"><i class="fa fa-facebook"></i></a>
                <a href="login/twitter" class="btn-social btn-outline-twitter btn-social-circle waves-effect waves-light m-1"><i class="fa fa-twitter"></i></a>
                <a href="login/google" class="btn-social btn-outline-google-plus btn-social-circle waves-effect waves-light m-1"><i class="fa fa-google-plus"></i></a>
                <a href="login/instagram" class="btn-social btn-outline-instagram waves-effect btn-social-circle waves-light m-1"><i class="fa fa-instagram"></i></a>


              </div>

              <br />

              <p class="card-description text-center">or be classical</p>

              <form method="POST" action="{{ route('register') }}">
                @csrf



                <div class="row">

                  <div class="col-md">

                    <div class="form-set">
                      <div class="form-input inputWithIcon">
                        <input id="first_name" type="first_name" @error('first_name') is-invalid @enderror name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" placeholder="{{ __('First name') }}">
                        <i class="material-icons" aria-hidden="true">face</i>
                        <input type="hidden" name="slug" id="slug" value="">

                      </div>
                    </div>

                  </div>

                  <div class="col-md">
                    <div class="form-set">
                      <div class="form-input inputWithIcon">
                        <input id="last_name" type="last_name" @error('last_name') is-invalid @enderror name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" placeholder="{{ __('Last Name') }}">
                        <i class="material-icons" aria-hidden="true">face</i>
                      </div>
                    </div>

                  </div>

                </div>



                <div class="form-set">
                  <div class="form-input inputWithIcon">
                    <input id="email" type="email" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="{{ __('E-Mail Address') }}">
                    <i class="material-icons" aria-hidden="true">email</i>
                  </div>
                </div>



                <div class="form-set">
                  <div class="form-input inputWithIcon">
                    <input id="password" type="password" @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="{{ __('Password') }}">
                    <i class="material-icons" aria-hidden="true">lock</i>
                  </div>
                </div>

                <div class="form-set">
                  <div class="form-input inputWithIcon">
                    <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="{{ __('Confirm Password') }}">
                    <i class="material-icons" aria-hidden="true">lock</i>
                  </div>
                </div>

                <div class="form-group">
                  <span class="float-right text-muted">
                    Allready have an ID ?
                    <a href="{{ route('login') }}"> Log in </a> </span>
                  <label class="float-left custom-control custom-checkbox"> <input type="checkbox" class="custom-control-input" checked="">
                    <div class="custom-control-label"> Remember </div>
                  </label>
                </div> <!-- form-group form-check .// -->



                <div class="form-group">
                  <button class="btn btn-info btn-block btn-dark" type="submit">{{ __('Register') }}</button>
                </div> <!-- form-group// -->

                <br />



            </div>
          </div>




          </form>


          <div>
          </div>


        </div>
      </div>
    </div>

    @endsection



    @section('Css')

    @endsection


    @section('jScript')


<script>
    @if(session('status'))
    $.notify({
    icon: "add_alert",
    title: "Notification",
    animate: {
    enter: "animated fadeInDown",
    exit: "animated fadeOutUp",
    },
    message: "{{ session('status') }}"
    }, {
    type: 'success',
    timer: 4000,
    placement: {
    from: 'top',
    align: 'center'
    }
    });
    @endif


    @if ($errors->any())
    $.notify({
    icon: "error",
    title: "<strong>An Error Occured</strong>",
    animate: {
    enter: "animated fadeInDown",
    exit: "animated fadeOutUp",
    },
    message: "<ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>"
    }, {
    type: 'danger',
    timer: 4000,
    placement: {
    from: 'top',
    align: 'center'
    }
    });

    @endif


    $(document).ready(function() {
    md.checkFullPageBackgroundImage();
    setTimeout(function() {
    // after 1000 ms we add the class animated to the login/register card
    $('.card').removeClass('card-hidden');
    }, 700);
    });
  </script>
    @endsection
>>>>>>> 3b677d2... admin panel 90% ready add create manage user
