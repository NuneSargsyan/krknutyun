@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row">
                    <form action="student/store" method="POST">
                        @csrf
                        <input class="form-control mb-3" name="email">
                        <select class="mb-3" name="group_id">
                            @foreach($groups as $key)
                                <option value="{{$key['id']}}">{{ $key['name'] }}
                                </option>
                            @endforeach
                        </select>
                        <button class="btn btn-success">Add</button>
                    </form>
                </div>
            </div>
        </div>
        @foreach($lessonsUsers as $key)
            @if($key['group']['user_id']==Auth::id())
                <div class="card mb-3 pl-3">
                        <h3>{{ $key['group']['name'] }}</h3>
                        <h3>Teacher` {{ $key['group']['user']['name'] }}</h3>
                         <p> <a href="student/lessons/{{ $key->user_id }}">{{ $key['user']['name'] }}</a>
                            <a href="student/delete/{{ $key->id }}"> <i class="fa fa-trash-o delete"></i></a>
                         </p>
                </div>
            @endif
        @endforeach
    </div>

@endsection
