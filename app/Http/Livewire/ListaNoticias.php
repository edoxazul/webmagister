<?php

namespace App\Http\Livewire;
use App\Models\Noticias;
use Livewire\Component;
use Te7aHoudini\LaravelTrix\Traits\HasTrixRichText;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Livewire\WithPagination;
use Illuminate\Support\Str;


class ListaNoticias extends Component
{
    use WithFileUploads;
    public $search= '';
    public $perPage= '10';
    public $page='1';
    public $modalFormVisible = false;
    public $modalConfirmDeleteVisible = false;
    public $modelId;
    use HasTrixRichText;

    public $titulo_noticia,$descripcion_noticia,$autor_noticia,$enlace_noticia,$estatus,$user_id;
    public $noticia_photo_path;
    public $fotos_noticia=null;
    public function render()
    {
        return view('livewire.lista-noticias',[
            'noticias' => Noticias::where('titulo_noticia','like','%' . trim($this->search) . '%')
            ->paginate($this->perPage)
        ]);
    }

    public function clear()
    {
        $this->search = '';
        $this->page = '1';
        $this->perPage = '5';
    }

        /**
     * The validation rules
     *
     * @return void
     */
    public function rules()
    {
        return [
            'titulo_noticia' => 'required',
            'descripcion_noticia' => 'required',
           // 'autor_noticia'=> 'required',
           // 'enlace_noticia' => 'required',
            // 'noticia_photo_path' => 'required',
            'estatus' => 'required'

        ];
    }

    public function modelData()
    {
        if(!empty($this->fotos_noticia)){
            $name = md5($this->fotos_noticia . microtime()).'.'.$this->fotos_noticia->extension();
            $noticia_photo_path = $this->fotos_noticia->storeAs('fotos_noticia',$name,'public');
            $noticia_photo_path = 'storage/'.$noticia_photo_path;
            return [
                'titulo_noticia' => $this->titulo_noticia,
                // 'descripcion_noticia'-trixFields => $this->descripcion_noticia-trixFields,
                // trixFields('descripcion_noticia') => trixFields($this->descripcion_noticia),
                // trix_rich_texts('descripcion_noticia')=> trix_rich_texts($this->descripcion_noticia),
                'descripcion_noticia' => $this->descripcion_noticia,
                'autor_noticia'=>$this->autor_noticia,
                'enlace_noticia'=>$this->enlace_noticia,
                'noticia_photo_path'=>$noticia_photo_path,
                'estatus'=>$this->estatus,
                'is_default_home' => $this->isSetToDefaultHomePage,
                'is_default_not_found' => $this->isSetToDefaultNotFoundPage,
            ];
        }else{
            return [
                'titulo_noticia' => $this->titulo_noticia,
                // trixFields('descripcion_noticia') => trixFields($this->descripcion_noticia),
                // trix_rich_texts('descripcion_noticia')=> trix_rich_texts($this->descripcion_noticia),
                'descripcion_noticia' => $this->descripcion_noticia,
                'autor_noticia'=>$this->autor_noticia,
                'enlace_noticia'=>$this->enlace_noticia,
                // 'noticia_photo_path'=>$noticia_photo_path,
                'estatus'=>$this->estatus,
                'is_default_home' => $this->isSetToDefaultHomePage,
                'is_default_not_found' => $this->isSetToDefaultNotFoundPage,
            ];
        }
    }

    public function create()
    {
        $this->validate();
        $this->unassignDefaultHomePage();
        $this->unassignDefaultNotFoundPage();
        Noticias::create($this->modelData());
        $this->modalFormVisible = false;
        $this->reset();
    }


    public function createShowModal()
    {
        $this->resetValidation();
        $this->reset();
        $this->modalFormVisible = true;
    }

        /**
     * The update function.
     *
     * @return void
     */
    public function update()
    {
        $this->validate();
        $this->unassignDefaultHomePage();
        $this->unassignDefaultNotFoundPage();
        Noticias::find($this->modelId)->update($this->modelData());
        $this->modalFormVisible = false;
    }

    public function updateShowModal($id)
    {
        $this->resetValidation();
        $this->reset();
        $this->modelId = $id;
        $this->modalFormVisible = true;
        $this->loadModel();
    }


    public function loadModel()
    {
        $data = Noticias::find($this->modelId);
        $this->titulo_noticia = $data->titulo_noticia;
        $this->descripcion_noticia = $data->descripcion_noticia;
        $this->autor_noticia = $data->autor_noticia;
        $this->enlace_noticia = $data->enlace_noticia;
        $this->noticia_photo_path = $data->noticia_photo_path;
        $this->estatus = $data->estatus;
        $this->isSetToDefaultHomePage = !$data->is_default_home ? null : true;
        $this->isSetToDefaultNotFoundPage = !$data->is_default_not_found ? null : true;
    }

       /**
     * Runs everytime the isSetToDefaultHomePage
     * variable is updated.
     *
     * @return void
     */
    public function updatedIsSetToDefaultHomePage()
    {
        $this->isSetToDefaultNotFoundPage = null;
    }

    /**
     * Runs everytime the isSetToDefaultNotFoundPage
     * variable is updated.
     *
     * @return void
     */
    public function updatedIsSetToDefaultNotFoundPage()
    {
        $this->isSetToDefaultHomePage = null;
    }

    public function deleteShowModal($id)
    {
        $this->modelId = $id;
        $this->modalConfirmDeleteVisible = true;
    }

    public function delete()
    {
        Noticias::destroy($this->modelId);
        $this->modalConfirmDeleteVisible = false;
    }

    protected  $messages =[
        'titulo_noticia.required' => 'El campo título es obligatorio',
        'descripcion_noticia.required' => 'El campo cuerpo de la noticia es obligatorio',
        'noticia_photo_path.required' => 'El campo foto portada es obligatorio',
        'estatus.required' => 'El campo estado noticia es obligatorio',
        // 'enlace_archivo.mimes' => 'Formato de archivo inválido.',
        // 'enlace_archivo.mimes:pdf,txt,xlsx,xls,pptx,ppt,doc,docx,zip' => 'Formato de archivo inválido.',
    ];
}
