<div>
    <h1>Atualizar Foto de Perfil</h1>
    <form action="" wire:submit.prevent="storagePhoto">
        @if ($photo)
            <div class="mb-4">
                <img src="{{ $photo->temporaryUrl() }}" style="max-width: 200px;">
            </div>
        @else
            <img src="{{ asset('img/no-image.png') }}" style="max-width: 200px;">
        @endif
        <input type="file" wire:model="photo">
        <br>
        @error('photo')
            {{ $message }}
        @enderror
        <button type="submit">Enviar photo</button>
    </form>
</div>
