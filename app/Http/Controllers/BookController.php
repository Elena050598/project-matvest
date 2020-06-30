<?php
namespace App\Http\Controllers;
use App\book_catalog;
use App\books;
use Illuminate\Http\Request;
class BookController extends Controller
{
    public function index(Request $request)
    {
        $cat=$request->cat;
        if (isset($request->cat) && ($request->cat > 0))
            $books = books::with('book_catalog')->where("catalog", "=", "$request->cat")
                ->orderBy('id', 'desc')->paginate(10);
        else
            $books = books::with('book_catalog')->orderBy('id', 'desc')->paginate(10);
        return view('books.index', ['books' => $books], compact('cat'));
    }


    public function create()
    {
        $catalogs = book_catalog::all();
        return view('books.create', compact("catalogs"));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'catalog' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $image = $request->file('image');
        $new_name = rand() . '.' . $image->
            getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);
        $form_data = array(
            'author' => $request->author,
            'title' => $request->title,
            'description' => $request->description,
            'catalog' => $request->catalog,
            'download_link' => $request->download_link,
            'image' => $new_name,
        );
        books::create($form_data);
        return redirect('books')->with('success', 'Книга успешно добавлена');
    }
    public function edit($id)
    {
        $data = books::findOrFail($id);
        $catalogs = book_catalog::all();
        return view('books.edit', compact('data', 'catalogs'));
    }
    public function update(Request $request, $id)
    {
        $image_name = $request->hidden_image;
        $image = $request->file('image');
        if ($image != '') {
            $request->validate([
                'title' => 'required',
                'catalog' => 'required',
                'image' => 'image|mimes:jpeg,png,jpg|max:2048'
            ]);
            $image_name = $request->hidden_image;
            $image->move(public_path('images'), $image_name);
        } else {
            $request->validate([
                'title' => 'required',
                'catalog' => 'required',
            ]);
        }
        $form_data = array(
            'author' => $request->author,
            'title' => $request->title,
            'description' => $request->description,
            'catalog' => $request->catalog,
            'download_link' => $request->download_link,
            'image' => $image_name,
        );
        books::whereId($id)->update($form_data);
        return redirect('books')->with('success', 'Редактирование книги прошло успешно');
    }
    public function destroy($id)
    {
        $data = books::findOrFail($id);
        $data->delete();
        unlink(public_path('images/') . $data->image);
        return redirect('books')->with('success', 'Книга успешно удалена');
    }
}