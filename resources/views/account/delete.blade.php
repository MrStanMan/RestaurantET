@extends('layouts.base')

@section('content')
<div class="card">
    <div class="card-header">Verwijder Account</div>
        <div class="card-body">
            <form method="POST" action="{{ url('/profile/delete') }}/{{$user->customer_nr}}">
                @csrf
                <input type="password" name="password">
                <input type="password" name="password_confirm">
                <input type="submit" name="submit">
            </form>
        </div>
    </div>
</div>
@endsection