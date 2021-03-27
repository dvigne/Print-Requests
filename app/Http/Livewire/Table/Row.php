<?php

namespace App\Http\Livewire\Table;

use Livewire\Component;
use App\Models\Requests;
use Storage;

class Row extends Component
{
    public $request;
    public $confirmingRequestDelete = false;

    public function __construct($request)
    {
      $this->request = $request;
    }

    public function approve($value='')
    {
      $this->request->approve();
    }

    public function reject()
    {
      $this->request->reject();
    }

    public function dispatch()
    {
      $this->request->status = "printing";
      $this->request->save();
    }

    public function download()
    {
      return Storage::download('uploads/' . $this->request->filename, $this->request->filename);
    }

    public function confirmDelete()
    {
      $this->dispatchBrowserEvent('confirming-delete-request');
      $this->confirmingRequestDelete = true;
    }

    public function delete()
    {
      $this->request->delete();
    }

    public function cancel()
    {
      $this->request->status = "canceled";
      $this->request->save();
    }

    public function render()
    {
      return view('livewire.table.row');
    }
}
