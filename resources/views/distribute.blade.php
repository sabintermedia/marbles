@extends ('layout')
@section ('title','Distribution')
@section ('distribution')
<div class="flex-top position-ref full-height">
  <div class="content mb-1 items-center">
      <div class="title m-b-md text-left">
           Distribution
      </div>
      <hr>
      <div class="row my-2 mx-auto row-md-12">
        <h4>{{count($balls)}} Balls</h4>
      </div`>
      <div class="row my-2 mx-auto">
        @foreach($balls as $ball)
             <span class="h3 mx-1 my-1" style="color:{{$ball['color']}}">&#x25C9;</span>
        @endforeach
      </div>
      <div class="row my-4 mx-auto row-md-12">
        <h4>{{count($boxes)}} Boxes</h4>
        <div class="row my-4 mx-auto float-right">
          @foreach($boxes as $box)
               <div class="border px-2 py-2 mx-3 my-3">BOX {{ $loop->iteration }}</div>
          @endforeach
        </div>
      </div>
  </div>
  <div class="row-md-2">
      <button class="btn btn-outline-primary">Play again</button>
  </div>
</div>
@endsection
