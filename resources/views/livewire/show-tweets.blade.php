<div>
    <div class="container ">
        <h1>Show Tweets</h1>
        <div class="d-flex justify-content-center">
                <p>{{ $content }}</p>
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
        </div>
        <div class="row">
        @foreach ($tweets as $tweet)
            <div class="col">
                <div class="card" style="width: 18rem;">
                    @if ($tweet->user->photo)
                        <img class="card-img-top " src="{{ asset("storage/{$tweet->user->photo}") }}" alt="{{ $tweet->user->name }}">
                    @else
                        <img class="card-img-top" src="{{ asset('img/no-image.png') }}" alt="{{ $tweet->user->name }}">
                    @endif
                    <div class="card-body">
                        <p class="card-text">
                        {{ $tweet->user->name }} - {{ $tweet->content }}
                        @if ($tweet->likes->count())
                            <a wire:click.prevent="unlike({{ $tweet->id }})">Descurtir</a>
                        @else
                            <a href="#" wire:click.prevent="like({{ $tweet->id }})">Curtir</a>
                        @endif
                        </p>
                    </div>
                </div>
            </div>
        {{--  <div class="card flex">
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
            </div>  --}}

        @endforeach
    </div>
        <hr>
        <div>
            {{ $tweets->links() }}
        </div>
</div>
</div>
