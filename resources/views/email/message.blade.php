@extends('layouts.app')

@section('content')
    @if($errors->all())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{{asset('send/mail')}}}" method="post" style="width: 50%;margin: auto" >
        @csrf
        <input type="text" name="email" placeholder="Email" class="form-control mb-3">
        <input type="text" name="title" placeholder="Title" class="form-control mb-3">
        <textarea type="text" name="description" placeholder="Message" class="form-control mb-3"></textarea>
        <button  class="btn btn-success">Send</button>
    </form>
@endsection
