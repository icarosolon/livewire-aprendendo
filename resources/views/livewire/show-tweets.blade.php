<div>
    Show Tweets
    <p>{{ $message }}</p>


    <input type="text"
        name="message"
        id="message"
        wire:model="message">

        <hr>
        @foreach ($tweets as $tweet)
            <p>{{ $tweet->user->name }} - {{ $tweet->content }}</p>
        @endforeach
</div>
