@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    <div class="card-body">

                        <form method="POST" action="update/profile/{{ Auth::id() }}">
                            @csrf
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="name" value="{{ Auth::user()['name'] }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" name="email" value="{{ Auth::user()['email'] }}"  class="form-control">
                            </div>
                            <button class="btn btn-success">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
