<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductComponent extends Component
{
    use WithPagination;
    public $product_id;
    public $name, $price;
    public $view = '';
    public $search = '';
    public $perPage = '10';
    protected $queryString = [
        'search' => ['except' => ''],
        'perPage'
    ];

    public function render()
    {

        $products = Product::with('relCategory')->where('name', 'like', "%{$this->search}%")->orderBy('id','desc')->paginate($this->perPage);
        $data = ['products' => $products];

        return view('livewire.product-component', $data);
    }
    public function new()
    {
        $this->name = '';
        $this->price = 0;
        $this->view='products.create';
    }
    public function edit($id)
    {
        $product = Product::find($id);

        $this->product_id = $id;
        $this->name = $product->name;
        $this->price = $product->price;

        $this->view = 'products.edit';
    }
    public function update()
    {
        $this->validate(['name' => 'required', 'price' => 'required']);

        $p = Product::find($this->product_id);

        $p->name = $this->name;
        $p->price = $this->price;
        $p->company_id = 1;
        $p->category_id = 1;
        $p->status = 0;
        $p->slug = Str::slug($this->name);
        $p->file_path = '';
        $p->image = '';
        $p->in_discount = 0;
        $p->discount = 0;
        $p->contenido = '';
        $p->save();

        $this->view='';
    }
    public function destroy($id)
    {
        Product::destroy($id);
    }

    public function store()
    {
        $this->validate(['name' => 'required', 'price' => 'required']);

        $data = [
            'name' => $this->name,
            'price' => $this->price

        ];
        $p = new Product;
        $p->name = $this->name;
        $p->price = $this->price;
        $p->company_id = 1;
        $p->category_id = 1;
        $p->status = 0;
        $p->slug = Str::slug($this->name);
        $p->file_path = '';
        $p->image = '';
        $p->in_discount = 0;
        $p->discount = 0;
        $p->contenido = '';

        $p->save();
        $this->view = '';
    }
    public function default(){
        $this->view='';
        $this->name = '';
        $this->price = 0;
        return view('livewire.products');
    }
    // agregue esto por el problema de que solo buscaba si estabas posicionado
    // en la primer pagina. Este metodo no lo llama de ningun lado por lo visto
    // pero funciona
    public function updatingSearch()
    {
        $this->resetPage();
    }
}
