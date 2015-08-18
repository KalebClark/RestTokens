<!doctype HTML>
<html lang="en">
    <head>
       <meta charset="UTF-8">
       <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-MfvZlkHCEqatNoGiOXveE8FIwMzZg4W85qfrfIFBfYc= sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
       <title>RestTokens</title>

    </head>
    <body>
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
