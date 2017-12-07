@extends('layouts.master')

@section('content')

  <div class="col-sm-8 blog-main">
    <h1>{{$post->title}}</h1>
    <p>{{$post->body}}</p>

    <div class="comments">
      <ul class="list-group">
      @foreach($post->hasManyComments as $comment)
        <li class="list-group-item">
          <strong>{{$comment->created_at->diffForHumans()}}:&nbsp;</strong>
          {{$comment->body}}
        </li>
      </ul>
      @endforeach
    </div>

    <hr>

    {{--add a comment here--}}
    <div class="card">
      <div class="card-block">
        <form action="{{url('/posts/'.$post->id.'/comments')}}" method="post">
          {{csrf_field()}}
          {{--{{method_field('PATCH')}}--}}
          <div class="form-group">
            <textarea name="body" id="" class="form-control" placeholder="Your comment here." required></textarea>
          </div>
          <div class="from-group">
            <button class="btn btn-primary">Add Comment</button>
          </div>
        </form>

        @include('layouts.errors')
      </div>
    </div>
  </div>


@endsection
