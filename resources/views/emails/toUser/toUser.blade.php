<style>
    * {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    }

    th {
        background-color: #0066CC;
    }
</style>
@switch($status[0])
    @case('A')
        @include('emails.toUser.approved')
        @break
    @case('R')
        @include('emails.toUser.refused')
        @break
    @case('U')
        @include('emails.toUser.updated')
        @break
    @case('C')
        @include('emails.toUser.complete')
        @break
    @default
        <h1>No message</h1>
@endswitch