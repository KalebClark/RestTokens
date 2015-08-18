<!doctype HTML>
<html lang="en">
    <head>
       <meta charset="UTF-8">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
       <title>RestTokens</title>

    </head>
    <body style="padding-top: 65px">
        <!-- START NAV -->
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-neader">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Rest Tokens</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                  <ul class="nav navbar-nav">
                    <!--<li class="active"><a href="#">Home</a></li>-->
                    <li><a href="/rest-tokens/new">New Token</a></li>
                    <li><a href="https://github.com/KalebClark/RestTokens">About</a></li>
                  </ul>
                </div>
            </div>
        </nav>
        <!-- END NAV -->
        <div class="container">
            <table class="table">
                <tr>
                    <th>Username</th>
                    <th>Token</th>
                    <th colspan="2">Tools</th>
                </tr>
                @foreach($tokens as $token)
                <tr>
                    <td>{{ $token->username }}</td>
                    <td>{{ $token->token }} </td> 
                    <td>Delete</td>
                    <td>Modify</td>
                </tr>
                @endforeach
            </table>
        </div>
    </body>
</html>
