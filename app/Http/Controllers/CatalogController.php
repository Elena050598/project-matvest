<?php
namespace App\Http\Controllers;
use App\book_catalog;
use Illuminate\Http\Request;
class CatalogController extends Controller
{
    public function index()
    {
        $book_catalogs = book_catalog::orderBy('id', 'desc')->paginate(6);
        return view('catalogs.index', ['book_catalogs' => $book_catalogs]);
    }
    public function create()
    {
        return view('catalogs.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048'

        ]);
        $image = $request->file('image');
        $new_name = rand() . '.' . $image->
            getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);
        $form_data = array(
            'title' => $request->title,
            'short_description' => $request->short_description,
            'image' => $new_name
        );
        book_catalog::create($form_data);
        return redirect('catalogs')->with('success', 'Каталог успешно добавлен');
    }
    public function edit($id)
    {
        $data = book_catalog::findOrFail($id);
        return view('catalogs.edit', compact('data'));
    }
    public function update(Request $request, $id)
    {
        $image_name = $request->hidden_image;
        $image = $request->file('image');
        if ($image != '') {
            $request->validate([
                'title' => 'required',
                'image' => 'image|mimes:jpeg,png,jpg|max:2048'
            ]);
            $image_name = $request->hidden_image;
            $image->move(public_path('images'), $image_name);

        } else {
            $request->validate([
                'title' => 'required',
            ]);
        }
        $form_data = array(
            'title' => $request->title,
            'short_description' => $request->short_description,
            'image' => $image_name

        );
        book_catalog::whereId($id)->update($form_data);
        return redirect('catalogs')->with('success', 'Редактирование каталога прошло успешно');
    }
    public function destroy($id)
    {
        $data = book_catalog::findOrFail($id);
        $data->delete();
        unlink(public_path('images/') . $data->image);
        return redirect('catalogs')->with('success', 'Каталог успешно удален');
    }
}