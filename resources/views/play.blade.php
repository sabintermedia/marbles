@extends ('layout')
@section ('title','Play')
@section ('play')
<div class="flex-top position-ref full-height">
  <div class="content mb-1 items-center">
      <div class="title m-b-md text-left h5">
           Enter number
      </div>
      <div class="mx-1 my-1">
        <form method="post" action="{{ url('updategame',$settings) }}">
          @csrf
          <div class="row row-md-12">
            <div class="col col-md-1 h5 text-right align-bottom">{{ $settings['0']->name }}</div>
            <div class="col col-md-1 h5">=</div>
            <div class="col col-md-2 h5">
               <input type="text" class="form-control text-center p-0" name="content" value="{{ $settings['0']->content }}"/>
            </div>
            <div class="col col-md-4"><button type="submit" class="btn btn-outline-secondary">Make balls</button></div>
          </div>
        </form>
      </div>
      <hr>
      <div class="container text-left">
        <div class="row my-2 mx-auto row-md-12">

          <div class="row my-2 col-md-12mx-auto text-center">
            <div class="row row-md-6my-2 mx-auto text-left">
              <h5 class="col col-md-6 my-2 w-maximum">Groups:</h5>
              <ul>
                @foreach($balls->groupBy('color') as $colors)
                @php
                  $color = $colors->first()['color'];
                  $count = $colors->count();
                @endphp
                  <li><span class="p b mx-1 my-1">{{$count}} x</span><span id="ball_{{ $loop->iteration }}" class="p b mx-1 my-1" style="color:{{$color}}">{{$color}}</span><span class="p b mx-1 my-1">ball(s)</span></li>
                @endforeach
              </ul>
            </div>
          </div>
          <div class="col my-2 mx-auto text-center">
            <h5 class="col my-2 col-md-6 mx-auto">{{count($balls)}} Balls</h5>
            @foreach($balls as $ball)
                 <span id="ball_{{ $loop->iteration }}" class="h3 mx-1 my-1" style="color:{{$ball['color']}}">&#x25C9;</span>
            @endforeach
          </div>

        </div>
        <div class="row my-2 mx-auto row-md-12">

          <div id="boxes" class="col my-2 mx-auto text-center">
            <h5 class="col my-2 mx-auto">{{count($boxes)}} Boxes</h5>
            @foreach($boxes as $box)
                 <div id="box" class="d-inline-block border px-2 py-2 mx-3 my-3 col-md-2 rounded">BOX {{ $loop->iteration }}</div>
            @endforeach
          </div>
        </div>
        <div class="col my-2 mx-auto text-center">
            <button id="showDistro" class="btn btn-outline-primary">Distribute</button>
        </div>
      </div>
  </div>
  <div id="distribution" class="d-none row-md-1 my-4">
    <div>
      @isset($distribution)
        @foreach($distribution->groupBy('box_id') as $key => $balls)
          <div id="box" class="d-inline-block border px-2 py-2 mx-3 my-3 col-md-2 rounded"><h5>Box {{$key+1}}</h5>
            @foreach($balls as $ball)
              <div class="col d-inline p-2"><span class="h3 mx-1 my-1 p-2" style="color:{{$ball->color}}">&#x25C9;</span></div>
            @endforeach
          </div>
        @endforeach
      @endisset
      @empty($distribution)
        <div class="text-danger h4">Distribution failed</div>
        <div class="p">Attempted to place some balls more than 500 times without success.<br/>Hint: increase allowed colors per box in <u><a href="/settings">Settings</a></u></div>
      @endempty

      @php
      //dd($distribution);
      @endphp
    </div>
    <div class="row-md-2 my-4">
        <a href="/play" class="btn btn-outline-primary">Play again</a>
    </div>
  </div>
</div>
<script>

$('#showDistro').on('click', function() {
  $('#distribution').removeClass('d-none');
  $('#showDistro').addClass('d-none');
  $('#boxes').addClass('d-none');
});

  function showDistribution(){
    $('#distribution').style('display:block');
  };
</script>
@endsection
