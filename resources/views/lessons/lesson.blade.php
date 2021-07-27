@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row">
                    <form action="lesson/store" method="POST">
                        @csrf
                        <input class="form-control mb-3" name="name">
                        <select class="mb-3" name="group_id">
                            @foreach($groups as $key)
                                <option value="{{$key['id']}}">{{ $key['name'] }}
                                    @if($key->user_id==Auth::id())

                                    @endif</option>
                            @endforeach
                        </select>
                        <textarea class="form-control mb-3" name="content"></textarea>
                        <button class="btn btn-success">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container">
    @foreach($lessons as $key)
        @if($key['group']['user_id']==Auth::id())
        <div class="card mb-3 pl-3">
            <h3>{{ $key['name'] }}</h3>
           <p> {{ $key['content'] }}
               <a href="lesson/delete/{{ $key->id }}"> <i class="fa fa-trash-o delete"></i></a></p>
                <h5>{{$key['group']['name']}}</h5>
        </div>
            @endif
    @endforeach
    </div>

@endsection
