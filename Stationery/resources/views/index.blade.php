@extends('app')
  
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="text_left">
                <h2 style="font-size:1rem;">文房具マスター</h2>
            </div>
            <div class="text_right">
            <a class="btn btn-success" href="{{route('Stationeries.create')}}">新規登録</a>
            </div>
        </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        @if($message = Session::get('success'))
          <div class="alert alert-success mt-1"><p>{{$message}}</P></div>
        @endif
      </div>
    </div>

    <table class="table table_bordered">
      <tr>
        <th>No</th>
        <th>Name</name>
        <th>Price</th>
        <th>Classification</th>
      </tr>

      @foreach($Stationeries as $Stationery)
        <tr>
          <td style="text-align:right">{{ $Stationery->id}}</td>
          <td><a href="{{route('Stationeries.show' , $Stationery->id)}}?page_id={{ $page_id}}">{{$Stationery->name}}</a></td>
          <td style="text-align:right">{{ $Stationery->price}}円</td>
          <td style="text-align:left">{{ $Stationery->classification}}</td>
          <td style="text-align:center"><a class="btn btn-primary" href="{{ route('Stationeries.edit', $Stationery->id) }}">変更</a>
          </td>
          <td style="text-align:center">
            <form action="{{route('Stationeries.destroy',$Stationery->id)}}" method="POST">
              @csrf
              @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger" onclick='return confirm("削除しますか？");'>削除</button>
          </td>
          
        </tr>
      @endforeach
    </table>

    {!! $Stationeries->links('pagination::bootstrap-5') !!}


@endsection