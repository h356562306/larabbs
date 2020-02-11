@extends('layouts.app')
@section("styles")
  <link rel="stylesheet" type="text/css" href="{{asset('css/simditor.css')}}">
@stop
@section('content')

  <div class="container">
    <div class="col-md-10 offset-md-1">
      <div class="card ">
        <div class="card-body">
          <h2>
            <i class="far fa-edit"></i>
            @if($topic->id)
              编辑话题
            @else
              新建话题
            @endif
          </h2>
          @if($topic->id)
            <form action="{{ route('topics.update', $topic->id) }}" method="POST" accept-charset="UTF-8">
               <input type="hidden" name="_method" value="PUT">
          @else
            <form action="{{ route('topics.store') }}" method="POST" accept-charset="UTF-8">
          @endif

          @include('shared._error')

              <input type="hidden" name="_token" value="{{ csrf_token() }}">

                  <div class="form-group">
                    <label for="title-field">标题</label>
                    <input class="form-control" type="text" name="title" id="title-field"
                           value="{{ old('title', $topic->title ) }}"/>
                  </div>
                  <div class="form-group">
                    <label for="body-field">内容</label>
                    <textarea name="body" id="editor" class="form-control"
                              rows="3">{{ old('body', $topic->body ) }}</textarea>
                  </div>
                  <div class="form-group">
                    <select class="form-control" name="category_id" required>
                      <option value="" hidden disabled selected>请选择分类</option>
                        @foreach($categories as $value)
                          <option value="{{$value->id}}">{{$value->name}}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="well well-sm">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-2" aria-hidden="true"></i>保存</button>
                    <a class="btn btn-link float-xs-right" href="{{ route('topics.index') }}"> 取消</a>
                  </div>
            </form>
        </div>
      </div>
    </div>
  </div>

@endsection
@section("scripts")
  <script type="text/javascript" src="{{asset('js/module.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/hotkeys.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/uploader.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/simditor.js')}}"></script>
  <script>
    $(document).ready(function () {
        var edit = new Simditor({
            textarea:$('#editor')
        });
    });
  </script>
@stop