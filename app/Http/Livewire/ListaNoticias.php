<?php

namespace App\Http\Livewire;
use App\Models\Noticias;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class ListaNoticias extends Component
{
    use WithFileUploads;
    protected $queryString = [
        'search' => ['except' =>''],
        'perPage'=> ['except' => '10']
    ];
    public $search= '';
    public $perPage= '10';
    public $page='1';
    public $modalFormVisible = false;
    public $modalConfirmDeleteVisible = false;
    public $modelId;
    public $isSetToDefaultHomePage;
    public $sortField="titular_noticia";
    public $sortDirection = 'asc';
    public $isSetToDefaultNotFoundPage;

    public $titular_noticia,$cuerpo_noticia,$caption_foto_noticia,$user_id;
    public $autor_noticia='Equipo Magíster';
    public $estado_noticia='No visible';
    public $noticia_photo_path;
    public $fotos_noticia=null;

    public $modalTrixEditorFormVisible = false;


    /** @var array \Livewire\TemporaryUploadedFile[] */
    public $newFiles=[];

    public function render()
    {
        return view('livewire.lista-noticias',[
            'noticias' => Noticias::where('titular_noticia','like','%' . trim($this->search) . '%')
            ->orWhere('autor_noticia','LIKE',"%{$this->search}%")
            ->orWhere('estado_noticia','LIKE',"%{$this->search}%")
            ->orderBy($this->sortField,$this->sortDirection)
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
            'titular_noticia' => 'required',
            'cuerpo_noticia' => 'required',
           // 'autor_noticia'=> 'required',
           // 'enlace_noticia' => 'required',
            // 'noticia_photo_path' => 'required',
            'caption_foto_noticia' => 'required',
            'estado_noticia' => 'required'

        ];
    }

    public function modelData()
    {
        if(!empty($this->fotos_noticia)){
            $name = md5($this->fotos_noticia . microtime()).'.'.$this->fotos_noticia->extension();
            $noticia_photo_path = $this->fotos_noticia->storeAs('fotos_noticia',$name,'public');
            $noticia_photo_path = 'storage/'.$noticia_photo_path;
            return [
                'titular_noticia' => $this->titular_noticia,
                // 'descripcion_noticia'-trixFields => $this->descripcion_noticia-trixFields,
                // trixFields('descripcion_noticia') => trixFields($this->descripcion_noticia),
                // trix_rich_texts('descripcion_noticia')=> trix_rich_texts($this->descripcion_noticia),
                'cuerpo_noticia' => $this->cuerpo_noticia,
                'autor_noticia'=>$this->autor_noticia,
                'noticia_photo_path'=>$noticia_photo_path,
                'caption_foto_noticia'=>$this->caption_foto_noticia,
                'estado_noticia'=>$this->estado_noticia,
                'is_default_home' => $this->isSetToDefaultHomePage,
                'is_default_not_found' => $this->isSetToDefaultNotFoundPage,
            ];
        }else{
            return [
                'titular_noticia' => $this->titular_noticia,
                // trixFields('descripcion_noticia') => trixFields($this->descripcion_noticia),
                // trix_rich_texts('descripcion_noticia')=> trix_rich_texts($this->descripcion_noticia),
                'cuerpo_noticia' => $this->cuerpo_noticia,
                'autor_noticia'=>$this->autor_noticia,
                // 'noticia_photo_path'=>$noticia_photo_path,
                //'caption_foto_noticia'=>$this->caption_foto_noticia,
                'estado_noticia'=>$this->estado_noticia,
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
        $this->titular_noticia = $data->titular_noticia;
        $this->cuerpo_noticia = $data->cuerpo_noticia;
        $this->autor_noticia = $data->autor_noticia;
        $this->noticia_photo_path = $data->noticia_photo_path;
        $this->caption_foto_noticia = $data->caption_foto_noticia;
        $this->estado_noticia = $data->estado_noticia;
        $this->isSetToDefaultHomePage = !$data->is_default_home ? null : true;
        $this->isSetToDefaultNotFoundPage = !$data->is_default_not_found ? null : true;
    }

    public function modelDataTrixEditor(){
        return [
            'cuerpo_noticia'=>$this->cuerpo_noticia,
        ];
    }

    public function loadModelTrixEditor()
    {
        $data_trix = Noticias::find($this->modelId);
        $this->cuerpo_noticia = $data_trix->cuerpo_noticia;
        $this->isSetToDefaultHomePage = !$data_trix->is_default_home ? null : true;
        $this->isSetToDefaultNotFoundPage = !$data_trix->is_default_not_found ? null : true;
    }

    public function updateTrixEditor()
    {
        $this->validate(
            [
            'cuerpo_noticia'=>'required',
            ]
        );

        $this->unassignDefaultHomePage();
        $this->unassignDefaultNotFoundPage();
        Noticias::find($this->modelId)->update($this->modelDataTrixEditor());
        $this->modalTrixEditorFormVisible = false;
    }

    public function updateTrixEditorShowModal($id)
    {
        $this->resetValidation();
        $this->reset();
        $this->modelId = $id;
        $this->modalTrixEditorFormVisible = true;
        $this->loadModelTrixEditor();
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
        'titular_noticia.required' => 'El campo titular es obligatorio',
        'cuerpo_noticia.required' => 'El campo cuerpo de la noticia es obligatorio',
        'noticia_photo_path.required' => 'El campo foto portada es obligatorio',
        'caption_foto_noticia.required' => 'El campo descripción foto es obligatorio',
        'estado_noticia.required' => 'El campo estado noticia es obligatorio',
    ];

    private function unassignDefaultHomePage()
    {
        if ($this->isSetToDefaultHomePage != null) {
            Noticias::where('is_default_home', true)->update([
                'is_default_home' => false,
            ]);
        }
    }

    private function unassignDefaultNotFoundPage()
    {
        if ($this->isSetToDefaultNotFoundPage != null) {
            Noticias::where('is_default_not_found', true)->update([
                'is_default_not_found' => false,
            ]);
        }
    }

    public function eliminado(){
        $this->unassignDefaultHomePage();
        $this->unassignDefaultNotFoundPage();
        $tesis=Noticias::find($this->modelId);
        $tesis->estado_noticia = 'No Visible';
        $tesis->save();
        $this->reset();
        $this->modalConfirmDeleteVisible = false;
    }

    public function completeUpload(string $uploadedUrl,string $eventName){
        foreach($this->newFiles as $file){
            if ($file->getFilename() == $uploadedUrl){
                $newFileName = $file->store('/','post-attachments');
                $url = Storage::disk('post-attachments')->url($newFileName);

                $this->dispatchBrowserEvent($eventName, [
                    'url'=> $url,
                    'href'=> $url,
                    ]);

                return;
            }
        }
    }


}
