@extends('layouts.app')

@section('content')
<div class="container-fluid" id="taskContainer">
    <div class="row">
        <h1 class="text-light shadow border border-secondary">Tasks</h1>
    </div>
    <div class="row mb-2">
        <task-form />
    </div>
    <div class="row">
        <task-list />
    </div>
    <hr>
    <div class="row">
        <done-list />    
    </div>       

</div>
@endsection