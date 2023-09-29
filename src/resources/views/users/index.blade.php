@extends('layouts.app')

@section('main')
    <div class="">
        <div class="">
            <div class="">
                @foreach ($all_users as $user)
                    <div class="">
                        <div class="text-center ">
                            <img src="{{ $user->profile_image }}" class=""  width="50" height="50">
                            <div class="">
                                <p class="">{{  $user->name }}</p>
                                <a href="{{ url('users/' .$user->id) }}" class="">{{ $user->screen_name }}</a>
                            </div>

                            @if (auth()->user()->isFollowed($user->id))
                                <div>
                                    <span>フォローされています。</span>
                                </div>
                            @endif

                            <div>
                                @if (auth()->user()->isFollowing($user->id))
                                    <form action="{{  route('unfollow', ['id' => $user->id]) }}" method="POST">
                                        {{  csrf_field() }}
                                        {{  method_field('DELETE') }}

                                        <button type="submit">フォロー解除</button>
                                    </form>
                                @else
                                    <form action="{{ route('follow', ['id' => $user->id]) }}" method="POST">
                                        {{ csrf_field() }}

                                        <button type="submit">フォローする</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="text-center">
            {{ $all_users->links() }}
        </div>
    </div>
@endsection