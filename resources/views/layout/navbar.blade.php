<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    .navbar-header img {
      max-height: 50px; 
      width: auto;
      margin-right: 50px;
    }

    .navbar-nav {
      float: none;
      text-align: center;
      width: 100%;
      margin: 0;
    }

    .navbar-nav li {
      display: inline-block;
      padding: 0 25px; /* Adjusts space between menu items */
    }

    .navbar-nav li a {
      padding-top: 15px; /* Aligns the links properly with the navbar */
      font-size: 16px; /* Set a reasonable font size */
    }

    .navbar {
      padding: 15px 0; /* Reduces the navbar height */
    }

    .navbar-brand {
      font-size: 18px; /* Adjusts the logo's brand size */
      line-height: 30px; /* Ensures it is vertically centered with the navbar */
    }

  </style>
</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">
        <!-- Replace with your image URL -->
        <img src="{{ asset('storage/images/logo/logo2.png') }}" alt="Logo">
      </a>
    </div>
    
    <!-- Navbar links -->
    <ul class="nav navbar-nav navbar-center">
      <li class="active"><a href="#">लखनऊ पोर्टल</a></li>
      <li><a href="#">संस्कृति</a></li>
      <li><a href="#">प्रकृति</a></li>
    </ul>
  </div>
</nav>

</body>
</html>
