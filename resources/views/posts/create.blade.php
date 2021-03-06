@extends('layouts.master')

@section('content')

   <div class="col-sm-8 blog-main">
       <h1>Publish a Post</h1>
        @include('layouts.errors')
       <hr>
       <form method="POST" action={{url('/posts')}}>
           {{csrf_field()}}
           <div class="form-group">
               <label for="title">Title:</label>
               <input type="text" class="form-control" id="title" name="title" required>
           </div>

           <div class="form-group">
               <label for="body">Body:</label>
               <textarea  name="body" id="body" class="form-control" required></textarea>
           </div>


           <button type="submit" class="btn btn-primary">Publish</button>
       </form>

   </div>

@endsection
