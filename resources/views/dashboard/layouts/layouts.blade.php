@include('dashboard.layouts.header')

<div class="content-wrapper">

@if (Session::has('success'))
    <div class="row">
        <div class="col-lg-6 m-auto">
            <div class="alert alert-success" role="alert">
                <strong>{{Session::get('success')}}</strong>
            </div>    
        </div>
    </div>
@endif

@if ($errors->any())
    <div class="row">
        <div class="col-lg-6 m-auto">
<ul class=" alert alert-danger list-unstyled m-auto" style="text-align: center">
    @foreach ( $errors->all() as $error )
        <li>{{$error}}</li>
    @endforeach
</ul>
        </div>    
    </div>
@endif

@yield('content')

</div>

@include('dashboard.layouts.footer')