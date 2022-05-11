@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">

            @include('includes.message')

            <div class="card pub_image pub_image_detail">
                <div class="card-header">
                    @if ($image->user->photo)
                        <div class="container-avatar">
                            <img class="avatar" src="{{ route('user.avatar', ['filename' => $image->user->photo]) }}" alt="" />
                        </div>
                    @endif
                    <div class="data-user">
                        {{ $image->user->name . ' ' . $image->user->surname }}
                        <span class="nickname">
                            {{ ' | @' . $image->user->nick }}
                        </span>
                    </div>
                </div>

                <div class="card-body">
                    <div class="image-container image-detail">
                        <img src="{{ route('image.file', ['filename' => $image->image_path]) }}" alt="">
                    </div>
                    <div class="description">
                        <span class="nickname">{{ '@' . $image->user->nick }}</span>
                        <span> {{ ' | ' . \FormatTime::LongTimeFilter($image->created_at) }} </span>
                        <p> {{$image->description}} </p>
                    </div>
                    <div class="likes">
                        <i class="fa-solid fa-heart"></i>
                    </div>
                    <div class="clearfix"></div>
                    <div class="comments">
                        <h2>Comentarios ({{ count($image->comments) }})</h2>
                        
                        <form method="POST" action="{{ route('comments.store') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="image_id" value="{{ $image->id }}">
                            <textarea class="form-control" {{ $errors->has('content') ? 'is-invalid' : '' }} name="content" id="content" cols="30" rows="2" required></textarea>
                            @if($errors->has('content'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('content') }}</strong>
                                </span>
                            @endif
                            <button class="btn btn-success" type="submit">Publicar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection