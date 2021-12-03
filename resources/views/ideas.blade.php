@extends('layouts.app')

@section('content')
<div class="card">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <p>アイデア</p>
                        <p>※ここにある値は保存しないと別の端末では消えてしまうので注意！</p>
                    </div>
                    <div class="card-body">
                        <div id="app">
                            <idea :csrf="{{json_encode(csrf_token())}}"></idea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection