<?php

namespace App\Http\Livewire;

use App\Models\File;
use Livewire\Component;
use Livewire\WithFileUploads;
use Storage;

class FileUpload extends Component
{
    use WithFileUploads;

    public $files = [];

    public $title = "";
    public $file = null;

    public function render()
    {
        return view('livewire.file-upload');
    }

    public function mount()
    {
        $this->files = File::all();
    }

    public function submit()
    {
        $this->validate([
            'title' => 'required|string|max:100',
            'file' => 'required|image'
        ]);
        File::create(['title' => $this->title, 'path' => $this->file->store('files')]);
        $this->title = "";
        $this->file = null;
        $this->files = File::all();
    }

    public function remove($id)
    {
        $file = File::find($id);
        if ($file) {
            if (Storage::exists($file->path)) {
                Storage::delete($file->path);
            }
            $file->delete();
        }
        $this->files = File::all();
    }
}
