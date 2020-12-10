@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Logged in!') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(Auth()->check())
                        <b>ID: </b>{{Auth::user()->id}}<br>
                        <b>Nome: </b>{{Auth::user()->name}}<br>
                        <b>Email: </b>{{Auth::user()->email}}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
