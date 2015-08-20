@extends('RestTokens::layouts.master')

@section('content')
<h3>Create New Token</h3>
    <form action="/rest-tokens/create" METHOD="POST">
        <table>
            <tr>
                <td>Username:</td>
                <td><input type="text" name="username" size="35"/></td>
            </tr>
            <tr>
                <td>Email Address:</td>
                <td><input type="text" name="email_address" size="55"/></td>
            </tr>
            <tr>
                <td>Token</td>
                <td><input type="text" id="token" name="token" size="35" value="{{ $token }}"/><button type="button" id="generateToken">Generate new Token</button></td>
            </tr>
            <tr>
                <td>Active</td>
                <td>
                    <input type="Radio" name="active" value="1">Yes</input>
                    <input type="radio" name="active" value="0">No</input>
                </td>
            </tr>
        </table>

        <input type="submit" value="Create Token"/>
    </form>
    <script type="text/javascript">
        $("#generateToken").click(function(){
            $.ajax({
               url: "/rest-tokens/fetchToken",
                success: function(data) {
                    //$('#token').val("");
                    $('#token').val(data);
                }
            });
        });
    </script>
@stop