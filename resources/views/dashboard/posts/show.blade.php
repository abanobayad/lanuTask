@extends('dashboard.layouts.layouts')
@section('content')


<div class="row">
    <div class="col-lg-6 m-auto">
        <div class="card" >
        <div class="card-body">
            <h4 class="card-text">{{ trans('words.name') }} :   {{$post->name}}</h4>
            <p class="card-text">{{ trans('words.desc') }} : {{$post->desc}}</p>
        </div>
        </div>
    </div>
</div>



@endsection

