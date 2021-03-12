@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12">
            <div class="p-6">
                @auth
                    @if( $user->username == auth()->user()->username )
                        <div class="p-6 float-right">
                            <form action={{ 'upload' }} method="post" enctype="multipart/form-data" class="bg-white p-2 rounded-lg">
                                @csrf
                                <input type="file" name="image" class="bg-white cursor-pointer" />
                                <input type="submit" value="Upload" class="bg-white cursor-pointer focus:outline-none" />
                            </form>
                        </div>
                    @endif
                @endauth
                <img src={{ asset('/storage/images/'.$user->avatar) }} alt="avatar" class="w-16 h-16 rounded-full float-left mx-4 object-cover">
                <h1 class="text-2xl font-medium mb-1 text-white">{{ $user->username }}</h1>
                <p class="text-white">Posted {{ $posts->count() }} {{ Str::plural('post', $posts->count()) }} and received {{ $user->receivedLikes->count() }} likes</p>
            </div>

            <div class="bg-white p-6 rounded-lg">
                @if ($posts->count())
                    @foreach ($posts as $post)
                        <x-post :post="$post" />
                    @endforeach

                    {{ $posts->links() }}
                @else
                    <p>{{ $user->username }} does not have any posts</p>
                @endif
            </div>
        </div>
    </div>
@endsection
