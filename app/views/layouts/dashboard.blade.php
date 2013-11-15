<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />

  <meta name="viewport" content="width=device-width" />

  <title>Welcome to Parliament | Dashboard</title>

  {{ Asset::styles() }}

  <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js" type="text/javascript"></script>

</head>

<body>
	<div class="row">
	  <div class="large-12 columns">

    <!-- Navigation -->

      <div class="nav top-bar">
        <ul class="title-area">
          <!-- Title Area -->
          <li class="name">
            <h1>
              <a href="#">
                Top Bar Title
              </a>
            </h1>
          </li>
          <li class="toggle-topbar menu-icon"><a href="#"><span>menu</span></a></li>
        </ul>

        <div class="top-bar-section">
          <ul class="left">
            <li><a href="#">Link 1</a></li>
            <li><a href="#">Link 2</a></li>
          </ul>

          <ul class="right">
            <li class="search">
              <form>
                <input type="search">
              </form>
            </li>

            <li class="has-button">
              <a class="small button" href="#">Search</a>
            </li>
          </ul>
        </div>
    </div>

    <!-- End Navigation -->

    </div>
  </div>

  <div class="row">
    <div class="large-12 columns">
      <div class="row">

		@if(Session::has('flash_notice'))
		  <div id="flash_notice">{{ Session::get('flash_notice') }}</div>
		@endif

		@yield('content')

      </div>
    </div>
  </div>

  <div class="footer row">
    <div class="large-12 columns">
      <hr>
      <div class="row">
        <p style="text-align: center;">Footer Here</p>
      </div>
    </div>
  </div>

  {{ Asset::scripts() }}

  <script>
    $(document).foundation();
  </script>

</body>
</html>