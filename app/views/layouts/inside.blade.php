<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />

  <meta name="viewport" content="width=960px" />

  <title>Welcome to Parliament | Homepage</title>

  {{ Asset::styles() }}
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" ></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js" type="text/javascript"></script>
  
</head>

<body>

  <div class="large-12 columns">

  </div>

  <div style="width: 100%">
    <div class="large-12 columns">

      @if(Session::has('flash_notice'))
          <div id="flash_notice" class="alert-box">{{ Session::get('flash_notice') }}</div>
      @endif

      @yield('content')

    </div>
  </div>

  <div class="footer row">
    <div class="large-12 columns">
      <div class="row">
        @yield('footer')
      </div>
    </div>
  </div>

  {{ Asset::scripts() }}

  <script>
  $(document).ready(function(){
      $(document).foundation('forms');
  });
  </script>

</body>
</html>