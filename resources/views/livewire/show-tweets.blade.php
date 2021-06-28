<div>
    Show Tweets
    <p>{{ $content }}</p>




        <hr>
        <form action="" method="post" wire:submit.prevent="create">
            <input type="text"
            name="content"
            id="content"
            wire:model="content">
            @error('content')
                {{ $message }}
            @enderror
            <button type="submit">Criar Tweet</button>
        </form>
        @foreach ($tweets as $tweet)
            <div class="flex">
                <div class="w-1/8">
                    @if ($tweet->user->photo)
                        <img class="rounded-full h-8 w-8" src="{{ asset("storage/{$tweet->user->photo}") }}" alt="{{ $tweet->user->name }}">
                    @else
                        <img class="rounded-full h-8 w-8" src="{{ asset('img/no-image.png') }}" alt="{{ $tweet->user->name }}">
                    @endif
                </div>
                <div class="w-6/8">
                    {{ $tweet->user->name }} - {{ $tweet->content }}
                    @if ($tweet->likes->count())
                        <a wire:click.prevent="unlike({{ $tweet->id }})">Descurtir</a>
                    @else
                        <a href="#" wire:click.prevent="like({{ $tweet->id }})">Curtir</a>
                    @endif
                </div>
            </div>
            <br>
        @endforeach
        <hr>
        <div>
            {{ $tweets->links() }}
        </div>
</div>
