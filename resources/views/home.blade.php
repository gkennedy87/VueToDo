@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row">
                <h1 class="text-light">Tasks</h1>
            </div>
            <div class="row mb-2">
                <task-form />
            </div>
            <div class="row">
                <task-list />
            </div>
        </div>
    </div>
</div>
@endsection
