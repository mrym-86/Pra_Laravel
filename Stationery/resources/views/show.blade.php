@extends('app')

@section('content')

<div class="row">
  <div class="col-lg-12 margin-tb">
    <div class ="pull-left">
      <h2 style ="font-size:1rem;">文房具詳細画面</h2>
    </div>
    <div class="pull-right">
      <a class="btn btn-success" href="{{url('/Stationeries')}}?page={{ $page_id}}">戻る</a>
    </div>
  </div>
</div>

<div style="text-align:left;">
  <form action="{{route('Stationeries.update',$stationery->id)}}" method="POST">
  <div class="row">
        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                {{ $stationery->name }}                
            </div>
        </div>
        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                {{ $stationery->price }}                
            </div>
        </div>
        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                @foreach ($classifications as $classification)
                    @if($classification->id==$stationery->classification) {{ $classification->str }} @endif
                @endforeach         
            </div>
        </div>
        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
            {{ $stationery->details }}                
            </div>
        </div>
    </div>
  </form>
</div>

@endsection