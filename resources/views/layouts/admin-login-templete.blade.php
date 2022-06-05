
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
    <title>Bracket Plus Responsive Bootstrap 4 Admin Template</title>

    <!-- vendor css -->
    <link href="/Backend/lib/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="/Backend/lib/ionicons/css/ionicons.min.css" rel="stylesheet">

    <!-- Bracket CSS -->
    <link rel="stylesheet" href="/Backend/css/bracket.css">
  </head>

  <body>

    <div class="d-flex align-items-center justify-content-center ht-100v">
      <video id="headVideo" class="pos-absolute a-0 wd-100p ht-100p object-fit-cover" autoplay muted loop>
        <source src="/Backend/videos/video1.mp4" type="video/mp4">
        <source src="/Backend/videos/video1.ogv" type="video/ogg">
        <source src="/Backend/videos/video1.webm" type="video/webm">
      </video><!-- /video -->
      <div class="overlay-body bg-black-7 d-flex align-items-center justify-content-center">
        <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 rounded bg-black-6">
          <div class="signin-logo tx-center tx-28 tx-bold tx-white"><span class="tx-normal">[</span> Ecommerce <span class="tx-info">plus</span> <span class="tx-normal">]</span></div>
         

          @yield('body')
          {{-- <div class="form-group">
            <input type="text" class="form-control fc-outline-dark" placeholder="Enter your username">
          </div>
          <div class="form-group">
            <input type="password" class="form-control fc-outline-dark" placeholder="Enter your password">
            <a href="" class="tx-info tx-12 d-block mg-t-10">Forgot password?</a>
          </div>
          <button type="submit" class="btn btn-info btn-block">Sign In</button>

          <div class="mg-t-60 tx-center">Not yet a member? <a href="" class="tx-info">Sign Up</a></div> --}}
        
        </div><!-- login-wrapper -->
      </div><!-- overlay-body -->
    </div><!-- d-flex -->

    <script src="/Backend/lib/jquery/jquery.min.js"></script>
    <script src="/Backend/lib/jquery-ui/ui/widgets/datepicker.js"></script>
    <script src="/Backend/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
      $(function(){
        'use strict';

        // Check if video can play, and play it
        var video = document.getElementById('headVideo');
        video.addEventListener('canplay', function() {
          video.play();
        });

      });
    </script>

  </body>
</html>
