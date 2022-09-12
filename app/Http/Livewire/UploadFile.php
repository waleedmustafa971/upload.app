<?php
namespace App\Http\Livewire;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Todo;
class UploadFile extends Component
{
    use WithFileUploads;
    public $fileTitle, $fileName;

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function submit()
    {
        $dataValid = $this->validate([
            'fileTitle' => 'required',
            'fileName' => 'required|image|mimes:jpg,jpeg,png,svg,gif|max:2048',
        ]);

        $dataValid['fileName'] = $this->fileName->store('todos', 'public');

        Todo::create($dataValid);

        session()->flash('message', 'File uploaded.');
    }
    public function render()
    {
        return view('livewire.upload-file');
    }
}
