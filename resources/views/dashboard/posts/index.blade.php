
@extends('dashboard.layouts.layouts')

@section('content')
        <div class="container">
            <h4>{{ trans('words.posts') }}</h4>
            <a class="btn btn-success" style="float: right" href="{{ route('post.create') }}">{{ trans('words.add') }}</a>


            <div class="row">
                <div class="col-12  mb-1">
                    <input class="form-control opacity-50" id="myInput" type="text" placeholder="Search Table">
                </div>
            </div>

            <div class="table-responsive">
                <table class="table text-center">
                    <thead >
                        <tr >
                            <th class=" font-weight-bold text-success" scope="col">#</th>
                            <th class=" font-weight-bold text-success" scope="col">{{ trans('words.name') }}</th>
                            <th class=" font-weight-bold text-success" scope="col">{{ trans('words.desc') }}</th>
                            <th class=" font-weight-bold text-success" scope="col">{{ trans('words.act') }}</th>
                        </tr>
                    </thead>
                    <tbody id="tableData">
                        {{-- Start Fetch Data --}}
                        @foreach ($posts as $post)
                            {{-- {{dd($post->admin)}} --}}
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $post->name }}</td>
                                <td>{{ $post->desc }}</td>
                                <td>
                                    @can('delete' , \App\Models\Post::class)
                                    <a href="{{route('post.delete' , $post->id)}}" class="btn btn-sm btn-danger">
                                        {{ trans('words.delete') }}
                                    </a>
                                    @endcan

                                    @can('view' , \App\Models\Post::class)
                                    <a href="{{route('post.show' , $post->id)}}" class="btn btn-sm btn-success">
                                        {{ trans('words.show') }}
                                    </a>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                        {{-- End Fetch Data --}}
                        {{-- <div class="d-flex justify-content-center">
                            {{ $posts->appends(request()->input())->links() }}
                        </div> --}}
                    </tbody>
                </table>
            </div>
        </div>
@endsection







