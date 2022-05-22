@extends('login.plantilla')
@section('titulo')
login
@endsection
@section('contenido')

<form action="{{route("loginPost")}}" method="POST">
    @csrf
    <div class="input-field col s12">
        <input type="email" placeholder="email" name="email" value="{{old("email")}}">
        <label for="email">Email</label>
        @error('email')
        <p>{{$message}}</p>
        @enderror
        @if (session("info"))
        <p>{{session("info")}} </p>
        @endif
        <button class="btn waves-effect blue-grey darken-3 waves-light center" type="submit">login<i class="fa fa-sign-in right"></i></button>
    </div>
</form>
@endsection