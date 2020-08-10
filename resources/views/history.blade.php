@extends ('layout')
@section ('title','History')
@section ('history')
<div class="flex-top position-ref full-height">
  <div class="content text-left">
      <div class="h5">
           @foreach($distros as $key => $distro)
             <div class="col col-md-12 mx-1 my-1 p-1">{{$key+1}}. For N = {{$distro['n']}} => {{count($distro['set'])}} balls.</div>
              @foreach($distro['set'] as $key => $ball)
              <div class="col col-md-8 d-inline p-2"><span class="h3 mx-1 my-1 p-1" style="color:{{$ball->color}}">&#x25C9;</span></div>
              @endforeach
              <br/>
              @php
                $d=collect($distro['set']);
              @endphp
              @foreach($d->groupBy('box_id') as $key => $dist)
                @php
                  //dd($dist);
                @endphp
                <div id="box" class="d-inline-block border px-2 py-2 mx-3 my-3 col-md-2 rounded"><h5>Box {{$key+1}}</h5>
                  @foreach($dist as $ball)
                    <div class="row d-inline p-2"><span class="h3 mx-1 my-1 p-2" style="color:{{$ball->color}}">&#x25C9;</span></div>
                  @endforeach
                </div>
              @endforeach
           @endforeach

           @php
           //dd($distros);
           @endphp
      </div>
  </div>
</div>
@endsection
