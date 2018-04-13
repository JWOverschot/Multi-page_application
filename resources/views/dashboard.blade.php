@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card card-default">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h3>User information</h3>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Name: {{Auth::user()->name}}</li>
                        <li class="list-group-item">Email: {{Auth::user()->email}}</li>
                    </ul>
                    <br>
                    <h3>Your Orders</h3>
                    <p>You haven't made any ordrs yet.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
