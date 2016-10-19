<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

        <title></title>

        <!-- Bootstrap core CSS -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- THIS IS FOR THE ICONS -->
        <!-- http://fontawesome.io/cdn/success/ -->
        <script src="https://use.fontawesome.com/37f2d2a99c.js"></script>
    </head>
    <style>
        body {
            background: #49516F;
            color: #8EA4D2;

        }

        input, textarea {
            color: black;
        }
        
        img {
            width: auto;
            height: 40px;
            position: relative;
            bottom: 10px;
        }
        
        li {
            color: #4C9F70;
        }

        #edit_buttons, .delete-form; {
            margin: 5px;
        }

        .delete-form {
            display: inline-block;
            /*margin: 1px;*/
        }
    </style>
    <body>

        @include('layouts.part.navbar')

        <div class="container">
            @if (session()->has('SUCCESS_MESSAGE'))
                <div class="alert alert-success">
                    <p>{{ session('SUCCESS_MESSAGE') }}</p>
                </div>
            @endif

            @if (session()->has('ERROR_MESSAGE'))
                <div class="alert alert-danger">
                    <p>{{ session('ERROR_MESSAGE') }}</p>
                </div>
            @endif

    		@yield('content')
        </div>

        <div class="container">
            @include('layouts.part.footer')
        </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>


    <!-- AJAX and JS
    ================================================== -->
    <!-- bootstarp JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    </body>
</html>