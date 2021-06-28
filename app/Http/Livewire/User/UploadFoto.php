<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class UploadFoto extends Component
{
    use WithFileUploads;
    public $photo;

    public function render()
    {
        return view('livewire.user.upload-foto');
    }

    public function storagePhoto()
    {
        $this->validate([
            'photo' => 'required|image|max:1024'
        ]);

        $user = auth()->user();
        $nameFile = Str::slug($user->name) . '.' . $this->photo->getClientOriginalExtension();
        $path = $this->photo->storeAs('users', $nameFile);
        if ($path) {
            $user->update([
                'profile_photo_path' => $path
            ]);
        }

        return redirect()->route('tweets.index');
    }
}
