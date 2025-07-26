@extends("app.app")
@section('contents')


 <form method="post" action="{{ route('add-users') }}">
    @csrf
    <input type="text" name="name">
    <input type="submit" value="Submit">
</form>


@endsection
