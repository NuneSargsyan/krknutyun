@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="row">
                    <div  class="post-header-img">
                        <img src="{{asset('images/03_subs_header.jpg')}}">
                        <div class="post-header">
                            <h1>GROUPS</h1>
                        </div>
                    </div>
                    <form action="group/store" method="POST " enctype="multipart/form-data">
                        @csrf
                        <input class="form-control mb-3 mt-3" name="name">
                        <div class="mb-3">
                            <i class="fa fa-image pr-2 post-icon"></i>
                            <input type="file" name="file" >
                        </div>
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

    @foreach($groups as $key)
        <div class="card container-fluid mt-2 col-md-11">
            <p>{{ $key['name'] }}
            @if($key->user_id==Auth::id())
                <a href="group/delete/{{ $key->id }}"> <i class="fa fa-trash-o delete"></i></a>
            @endif
            </p>
        </div>

    @endforeach
@endsection
