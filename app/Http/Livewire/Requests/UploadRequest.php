<?php

namespace App\Http\Livewire\Requests;

use Livewire\Component;
use Livewire\WithFileUploads;
use Request;
use App\Models\Requests;
Use Auth;
use Str;

class UploadRequest extends Component
{
    use WithFileUploads;

    public $name;
    public $file;

    public function CreateRequest()
    {
        $this->validate([
          'name' => ['required', 'string', 'max:255'],
          'file'  => ['required', 'file', 'mimes:bin']
        ]);

        $filename = Str::of($this->name)->append(".stl");

        $path = $this->file->storeAS('uploads', $filename);

        Auth::user()->requests()->create([
          'filename' => $filename
        ]);

        return redirect('requests');
    }

    public function render()
    {
        return view('livewire.requests.upload-request');
    }
}
