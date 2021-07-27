@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card pl-2 pr-2 pt-2 pb-2">
                    <div  class="post-header-img">
                        <img src="{{asset('images/03_subs_header.jpg')}}">
                        <div class="post-header">
                            <h1>POSTS</h1>
                        </div>
                    </div>
                    <div class="post-form">
                        <form action="post/store" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="post-place mb-3">
                                <textarea placeholder="Write your kind..." name="post_content" class="form-control mt-2" id="" ></textarea>
                                <div class="row pl-3 mt-2 post-btn">
                                    <div>
                                        <i class="fa fa-image pr-2 post-icon"></i>
                                        <input type="file" name="file" >
                                    </div>
                                    <div>
                                        <button class="btn btn-success">Add post</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="card-body">

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                    @foreach($posts as $key)
                    <div class="card-body post-catrs">
                       <div class="poat-img">
                           <img src="{{ asset($key->image) }}" alt="img" class="profile-img">
                       </div>
                        <div class="post-text">
                            <h2>{{ $key['user']['name'] }}</h2>
                            @if($key->user_id==Auth::id())
                                    <a href="post/delete/{{ $key->id }}"> <i class="fa fa-trash-o delete"></i></a>
                            @endif

                        <p>{{ $key->content }}</p>
                            <div class="comment mb-3 window">
                                <form method="post" action="send/comment/{{ $key['id']  }}" class="d-flex">
                                    @csrf
                                    <textarea class="form-control border-0"  name="comment"></textarea>
                                    <button class="btn btn-success">Send</button>
                                </form>
                            </div>
                            <div class="">
                                <button class="btn btn-success send">Open comment</button>
                                <button class="btn btn-info ml-2">Like 4</button>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection
