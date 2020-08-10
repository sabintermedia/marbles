@extends ('layout')
@section ('title','Edit settings')
@section ('editsettings')
<div class="card bg-dark text-white">
  <div class="card-header">
      Set {{ $data->name }}
  </div>
  <div class="card-body bg-dark">
    @if($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div>
    @endif
    <form method="post" action="{{ route('setting.update',$data->id) }}">
      @csrf
      @method('PATCH')
      <div class="row row-md-12">
        <div class="col col-md-4 text-right align-middle">{{ $data->name }}</div>
        <div class="col col-md-2">=</div>
        <div class="col col-md-2">
           <input type="text" class="form-control text-center p-0" name="content" value="{{ $data->content }}"/>
        </div>
        <div class="col col-md-4"><button type="submit" class="btn btn-outline-primary float-right ">Save</button></div>
      </div>

    </form>
  </div>
</div>
@endsection
