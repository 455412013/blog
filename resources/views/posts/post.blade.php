<div class="blog-post">
    <h2 class="blog-post-title">
        <a href="{{url('posts/'.$post->id)}}">  {{$post->title}}</a>

    </h2>
    <p class="blog-post-meta">{{$post->belongsToUser->name}} on
    {{$post->created_at->toFormattedDateString()}}

   <p>
       {{$post->body}}
   </p>
</div><!-- /.blog-post -->