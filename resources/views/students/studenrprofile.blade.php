@extends('layouts.app')
@section('content')

    @foreach($lessonsUsers as $key)
            <div class="card mb-3 pl-3">
                <h3>{{ $key['group']['name'] }}</h3>
                <p>{{$key['group']['user']['name']}}</p>
            </div>
    @endforeach
@endsection
