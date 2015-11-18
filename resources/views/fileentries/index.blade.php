@extends('app')
@section('content')
 
    <form action="{{url('fileentry/add')}}" method="post" enctype="multipart/form-data">

        <input type="hidden" name="_token" value="{{ csrf_token()}}">
        <input type="file" name="filefield">
        <input type="submit">
    </form>
 
 <h1> Pictures list</h1>
 
 <div class="row">
 
    <ul>
    {{-- dd($entries)--}}
 @foreach($entries as $entry)
        {{-- <li>{{$entry->filename}}</li> --}}

         <div class="col-md-2">
                <div class="thumbnail">
                    <img src="{{route('getentry', $entry->filename)}}" alt="ALT NAME" class="img-responsive" />
                    <div class="caption">
                        <p>{{$entry->original_filename}}</p>
                    </div>
                </div>
            </div>
 @endforeach
    </ul>
 </div>
 
@endsection
 