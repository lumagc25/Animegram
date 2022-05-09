@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @include('includes.message')

            @foreach ($images as $image)
                <div class="card pub_image">
                    <div class="card-header">
                        @if ($image->user->image)
                            <div class="">
                                <img class="avatar" src="{{ route('user.avatar', ['filename' => Auth::user()->photo]) }}" alt="" />
                            </div>
                        @endif
                        {{ $image->user->name . ' ' . $image->user->surname }}
                    </div>

                    <div class="card-body">

                    </div>
                </div>
            @endforeach    
        </div>
    </div>
</div>
@endsection
