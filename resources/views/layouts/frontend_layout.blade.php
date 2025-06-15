<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/styel.css')}}">
  <title>Task Assignment</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
    

<!-- Bootstrap Icons CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
<style>
    body {
        background: #f0f4ff;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .card-header {
        font-size: 1.25rem;
        font-weight: 600;
    }

    .card:hover {
        transform: translateY(-8px);
        box-shadow: 0 10px 20px rgba(0,123,255,.3);
        transition: 0.3s ease-in-out;
    }

    article:hover {
        background-color: #e9f1ff;
        transition: background-color 0.3s ease;
    }

    /* Make image align to the left */
    .img-left {
        display: block;
        margin-left: 0;
        margin-right: auto;
        max-height: 80px;
        object-fit: cover;
    }
   
a.btn.btn-outline-primary.btn-sm {
    max-width: 150px; 
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis; 
}

</style>


<body>

<!-- ======================================Navigation Bar================================================= -->
    <nav class="navbar navbar-expand-lg navStyle">
        <a class="brand-navbar" href="#">Task Assignment</a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#mainMenu">
            <span><i class="fas fa-align-right iconStyle"></i></span>
        </button>
        <div class="collapse navbar-collapse" id="mainMenu">
            <ul class="navbar-nav ml-auto navList">
                <li class="nav-item active"><a href="#" class="nav-link">HOME<span class="sr-only">(current)</span></a></li>
                
             

                 
                 @auth 

                 <li class="nav-item">
                   <a class="nav-link" href="{{ route('login') }}">{{ auth()->user()->name}}</a>
                 </li>
                 @endauth
                 @guest
                 <li class="nav-item">
                   <a class="nav-link" href="{{ route('login') }}">Login</a>
                 </li>

                 @endguest
                 
                <li class="nav-item">
                    <a href="{{route('register')}}" class="nav-link">Registration</a>
                </li>
               
            </ul>
        </div>
    </nav>
  </head>




{{-- main content --}}
 @yield('frontent')
 



 <!-- Footer -->
 <footer class="text-center">
  <div class="container">
    <p>&copy; 2025 Task Assignment. All Rights Reserved.</p>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('frontend/js/jquery.min.js')}}"></script>
@stack('content')

</body>
</html>


