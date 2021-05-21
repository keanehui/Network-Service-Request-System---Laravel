<style>
    .btnlink, .link:visited {
        padding: 5px;
        text-decoration: none;
        color: #0066CC;
    }

    .btnlink:hover {
        border-radius: 5px;
        border: 1px solid #ddd;
    }

    .link {
        text-decoration: none;
    }

    .link:hover {
        text-decoration: underline;
    }
</style>

<div style="text-align:center;">
    <h1>Congrats! Your request has been completed:</h1>
</div>

@include('template.requestTable')

<br>
<div style="text-align:center; width:100%; padding: 2%;">
    <a href="{{ action('RequestListController@showUser', ['requestID' => Crypt::encryptString($catRequest->id)]) }}" class="btnlink">Check Progress</a>
    <a href="{{ url('/support') }}" style="color:silver; position: absolute; left:3%;" class="link">Need help?</a>
</div>
