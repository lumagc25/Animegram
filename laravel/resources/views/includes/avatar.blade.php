@if(Auth::user()->photo)
<div class="container-avatar">
    <img class="avatar" src="{{ route('user.avatar', ['filename' => Auth::user()->photo]) }}" alt="" />
</div>
@endif