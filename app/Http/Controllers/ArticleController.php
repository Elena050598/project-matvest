<?php
namespace App\Http\Controllers;
use App\article;
use App\headings;
use App\Http\Requests\StoreArticle as StoreArticleRequest;
use App\Http\Requests\UpdateArticle as UpdateArticleRequest;
use App\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
class ArticleController extends Controller
{
    public function index()
    {
        $articles = article::published()->access()->get();
        $users = User::all();
        $headings = headings::all();
        return view('articles.index', compact('articles', 'users', 'headings'));
    }
    public function create(article $article)
    {
        $users = User::where('id', '!=', Auth::id())->get();
        $headings = headings::all();
        return view('articles.create', compact('article', 'users', 'headings'));
    }
    public function store(StoreArticleRequest $request)
    {
        $request->validate([
            'file1' => 'file|mimes:tex',
            'file2' => 'file|mimes:pdf',
        ]);
        if ($request->isMethod('post')) {
            $data = $request->only('title', 'file1', 'file2', 'file3', 'heading', 'annotation','access');
            $data['slug'] = str_slug($data['title']);
            $data['user_id'] = Auth::user()->id;

            $file1 = $request->file('file1');
            if ($file1) {

                $data['file1'] = rand() . '.' . $file1->getClientOriginalExtension();
                $file1->move(public_path('articles'), $data['file1']);
            }
            $file2 = $request->file('file2');
            if ($file2) {

                $data['file2'] = rand() . '.' . $file2->getClientOriginalExtension();
                $file2->move(public_path('articles'), $data['file2']);
            }
            $file3 = $request->file('file3');
            if ($file3) {
                $data['file3'] = rand() . '.' . $file3->getClientOriginalExtension();
                $file3->move(public_path('articles'), $data['file3']);
            }
            $article = article::create($data);
            $article->users()->sync($request->authors);
            $article->users()->attach($data['user_id']);
            $article->access = $request->access;
        }
        return redirect()->route('list_drafts')->with('success', 'Статья успешно сохранена, Вы можете посмотреть её здесь, в разделе "Мои статьи"');
    }
    public function drafts()
{

    if (!Auth::user()->inRole('editor')){
        $articlesQuery=article::where('user_id', Auth::user()->id)->get();
    }
    else{
        $articlesQuery = article::all();
    }
    $articles = $articlesQuery;

    $headings = headings::all();
    return view('articles.drafts', compact('articles','headings'));
}
    public function edit(article $article)
    {
        $array = array();
        $users = User::where('id', '!=', Auth::id())->get();
        foreach ($users as $user) {
            $array[$user->id] = false;
        }
        $authors = $article->users;
        foreach ($authors as $author) {
            $array[$author->id] = true;
        }
        $mass = array();
        $headings = headings::all();
        foreach ($headings as $heading) {
            $mass[$heading->id] = false;
        }
        $mass[$article->heading] = true;
        return view('articles.edit', compact('article', 'users', 'array', 'mass', 'headings'));
    }
    public function update(article $article, UpdateArticleRequest $request)
    {
        $request->validate([
            'file1' => 'file|mimes:tex',
            'file2' => 'file|mimes:pdf',
        ]);
        if ($request->isMethod('post')) {
            $data = $request->only('title', 'file1', 'file2', 'file3', 'heading', 'annotation','access');
            $data['slug'] = str_slug($data['title']);
            $data['user_id'] = Auth::user()->id;
            $file1 = $request->file('file1');
            if ($file1) {
                $data['file1'] = rand() . '.' . $file1->getClientOriginalExtension();
                $file1->move(public_path('articles'), $data['file1']);
            }
            $file2 = $request->file('file2');
            if ($file2) {
                $data['file2'] = rand() . '.' . $file2->getClientOriginalExtension();
                $file2->move(public_path('articles'), $data['file2']);
            }
            $file3 = $request->file('file3');
            if ($file3) {
                $data['file3'] = rand() . '.' . $file3->getClientOriginalExtension();
                $file3->move(public_path('articles'), $data['file3']);
            }

            $article->fill($data)->save();
            $article->users()->sync($request->authors);
            $article->users()->attach($data['user_id']);
            $article->access = $request->access;
        }

        return back()->withInput()->with('success', 'Статья успешно редактирована, Вы можете посмотреть её в разделе "Мои черновики"');
    }
    public function publish(article $article)
    {
        $article->published = true;
        $article->save();
        return back()->withInput()->with('success', 'Статья успешно опубликована, она находится в разделе "Статьи к печати"');
    }
    public function destroy($id)
    {

        $data = article::findOrFail($id);
        if(Auth::user()->id == $data->user_id ||Auth::user()->inRole('editor')){
            $data->published = false;
            $data->save();
        }
        return redirect('art')->with('success', 'Статья успешно удалена, её можно посмотреть в разделе "Мои статьи"');
    }
    public function delete($id)
    {
        $data = article::findOrFail($id);
        if ($data['file1']) unlink(public_path('articles/' . $data['file1']));
        if ($data['file2']) unlink(public_path('articles/' . $data['file2']));
        if ($data['file3']) unlink(public_path('articles/' . $data['file3']));
        $data->delete();
        return redirect('/articles/drafts')->with('success', 'Статья успешно удалена из раздела "Мои статьи"');
    }
    public function destroyFile($id, $filenum)
    {
        $article = article::findOrFail($id);
        if ($article && $article[$filenum] && unlink('articles/' . $article[$filenum])) {
            $article[$filenum] = null;
            $article->save();
        }
        return back()->with('success', 'Файл удалён, теперь Вы можете загрузить новый');
    }
}