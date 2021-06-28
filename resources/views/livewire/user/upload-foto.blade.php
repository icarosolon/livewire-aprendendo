<div>
    <h1>Atualizar photo de Perfil</h1>
    <form action="" wire:submit.prevent="storagePhoto">
        <input type="file" wire:model="photo">
        <br>
        @error('photo')
            {{ $message }}
        @enderror
        <button type="submit">Enviar photo</button>
    </form>
</div>
