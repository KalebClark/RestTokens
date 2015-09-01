@extends('RestTokens::layouts.master')

@section('content')
<table class="table">
        <tr>
            <th>Username</th>
            <th>Email Address</th>
            <th>Token</th>
            <th>Active</th>
            <th></th>
        </tr>
@foreach($tokens as $token)
        <tr id="row-{{ $token->id }}">
        <td>{{ $token->username }}</td>
        <td>{{ $token->email_address }}</td>
        <td>{{ $token->token }} </td>
        <td>
            <input type="button" id="tog-{{ $token->id }}" class="toggleActive" data-id="{{ $token->id }}" value="{{ $token->active }}" class="btn btn-default">

        </td>
        <td>
            <button type="button" class="deleteToken" data-id="{{ $token->id }}" class="btn btn-default" aria-label="Left Align">
                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
            </button>
        </td>
    </tr>
    @endforeach
</table>
    <script type="text/javascript">
        $('.toggleActive').click(function(){
            var toggleId = $(this).attr('data-id');
            $.ajax({
                url: "/rest-tokens/activate/"+toggleId,
                type: "POST",
                success: function(data) {
                    console.log(data);
                    $('#tog-'+toggleId).val(data);
                }
            })
        });


        $('.deleteToken').click(function(){
            var dataId = $(this).attr('data-id');
            console.log(dataId)
            //alert(dataId);
            $.ajax({
                url: "/rest-tokens/"+dataId,
                type: "DELETE",
                success: function(data) {
                    console.log(data)
                    $('#row-'+dataId).remove()
                }
            })
        });
    </script>
@stop