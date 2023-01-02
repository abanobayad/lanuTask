@extends('dashboard.layouts.layouts')
@section('content')

    <div class="col-lg-6 col-md-12 m-auto">
    <div class="card pt-5">
    <div class="card-body">
    <h4 class="card-title"> {{ trans('words.add') }}</h4>
    <br>
    <form class="forms-sample" method="POST" action="{{route('post.store')}}">
        @csrf
        <div class="form-group">
            <label for="exampleInputName1">{{ trans('words.name') }}</label>
            <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="{{ trans('words.add_title') }}">
                @error('name')<span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label for="exampleInputName1">{{ trans('words.desc') }}</label>
            <input type="text" name="desc" class="form-control" value="{{old('desc')}}" placeholder="{{ trans('words.add_desc') }}">
                @error('desc')<span class="text-danger">{{ $message }}</span>@enderror
        </div>
        <button type="submit" class="btn btn-success" style="float: right">{{ trans('words.add') }}</button>
    </form>
    </div>
    </div>
    </div>




    @endsection

