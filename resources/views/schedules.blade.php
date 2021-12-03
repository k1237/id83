@extends('layouts.app')

@section('content')
<div class="card">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <p>保存したアイデア</p>
                    </div>
                    <div class="card-body">
                        <div id="app">
                         <schedule :csrf="{{json_encode(csrf_token())}}"></schedule>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection