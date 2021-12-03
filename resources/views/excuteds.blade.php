@extends('layouts.app')

@section('content')
<div class="card">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <p>実行済</p>
                    </div>
                    <div class="card-body">
                        <div id="app">
                            <excuted :csrf="{{json_encode(csrf_token())}}"></excuted>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection