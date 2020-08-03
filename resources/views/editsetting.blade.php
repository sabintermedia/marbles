@extends ('layout')
@section ('title','Edit setting')
@section ('setting')
<div class="card mt-10">
  <div class="card-header">
      Settings
  </div>
  <div class="card-body">
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
      @method('PUT')
      <div class="form-group row">
        <label for="setting" class="col-sm-2 col-form-label">{{ $data->name }}</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="setting" value="{{ $data->content }}"/>
        </div>
      </div>
      <button type="submit" class="btn btn-outline-primary">Save</button>
    </form>
  </div>
</div>
@endsection
