@extends('layouts.User.auth')
@section('title', 'T.J Shoes Collection :: Login ')

@section('content')

<div class="page-content" style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('assets/images/hd-07.jpg');
background-size: cover;
background-repeat: no-repeat;
background-position: center center;
">



    <!-- Navbar -->
    <nav class="navbar navbar-expand navbar-transparent">
        <div class="container">
            <div class="navbar-wrappr">
                <a class="navbar-brand" href="javascript:;">Login Page</a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="navbar-toggler-icon icon-bar"></span>
                <span class="navbar-toggler-icon icon-bar"></span>
                <span class="navbar-toggler-icon icon-bar"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="../dashboard.html" class="nav-link">
                            <i class="material-icons">fingerprint</i>
                           Sign In
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../pages/register.html" class="nav-link active"><i class="material-icons" aria-hidden="true">person_add</i>
                            Register
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    
    
    
    <div class="card card-login">
        <div class="card-header card-header-primary">
            <h5 class="text-center">Register With Social Account</h5>
        </div>
            
        <div class="card-body">
                
                <div class="social-line text-center">
                    <a href="login/facebook" class="btn-social btn-outline-facebook btn-social-circle waves-effect waves-light m-1">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="login/google" class="btn-social btn-outline-google btn-social-circle waves-effect waves-light m-1"><i
                            class="fab fa-google-plus-g"></i></a>
                    <a href="login/instagram" class="btn-social btn-outline-instagram waves-effect btn-social-circle waves-light m-1"><i
                            class="fab fa-instagram"></i></a>
                
                
                </div>
                
                <p class="text-muted text-center mt-2">Or Be Classical</p>
        
          <form action="">
    
    
    
    
            <div class="inputWithIcon mt-4">
            <input type="email" class="form-control" placeholder="Enter Email-Adress" aria-label="email" id="email"
                aria-describedby="basic-addon1" required />
            <i class="material-icons">email</i>
        </div>
        
        <div class="inputWithIcon inputWithAction mt-4">
            <input type="password" class="form-control" placeholder="Enter Password" aria-label="Password" id="password"
                aria-describedby="basic-addon1" required/>
            <i class="material-icons">fingerprint</i>
            <i class="fa fa-eye-slash action" id="eye"></i>
        </div>
    
        
     
    
    
      
             <div class="form-check mt-2">
                 <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                 <label class="form-check-label" for="flexCheckChecked">
                   Remember me 
                 </label>
             </div>
    
         
         
        
        
        
        
          <div class="form-group mt-2">
            <button class="btn btn-block btn-primary" type="submit">Register</button>
          </div> <!-- form-group// -->
        
    
            </form>
        
            <div class="my-2">
                <a href="http://localhost/l7ecom/login" class="float-left text-dark"> All ready have an ID Login ?</a>
              </div>
            
        </div>
        
    </div>
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


      $(function() {
      $(".card").fadeIn(3000);
});



const visibilityBtn = document.querySelector("#eye");




visibilityBtn.addEventListener("click", function () {
  currentClass=visibilityBtn.classList.contains('fa-eye');
 
visibilityBtn.classList.toggle('fa-eye');
 visibilityBtn.classList.toggle('fa-eye-slash');
document.getElementById("password").setAttribute("type", currentClass ? "password": "text");
  
});





    </script>
    @endsection