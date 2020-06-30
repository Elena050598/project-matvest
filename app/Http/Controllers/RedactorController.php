<?php
namespace App\Http\Controllers;
use App\redactor;
use Illuminate\Http\Request;
class RedactorController extends Controller
{
    public function create()
    {
        $redactor = redactor::all()[0];
        return view('redactor', compact('redactor'));
    }
    public function store(Request $request)
    {
        $file = $request->file('file');
        if ($file) {
            $data['file'] = rand() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path(), $data['file']);
            $redactor = redactor::all()[0];
            $redactor->mission = $request->mission;
            $redactor->target = $request->target;
            $redactor->tasks = $request->tasks;
            $redactor->titleindex = $request->titleindex;
            $redactor->headings = $request->headings;
            $redactor->is_necessary = $request->is_necessary;
            $redactor->attention = $request->attention;
            $redactor->infa = $request->infa;
            $redactor->file = $data['file'];
            $redactor->save();
        } else {
            $redactor = redactor::all()[0];
            $redactor->mission = $request->mission;
            $redactor->target = $request->target;
            $redactor->tasks = $request->tasks;
            $redactor->titleindex = $request->titleindex;
            $redactor->headings = $request->headings;
            $redactor->is_necessary = $request->is_necessary;
            $redactor->attention = $request->attention;
            $redactor->infa = $request->infa;
            $redactor->file = $request->file;
            $redactor->save();
        }
        return view("/redactor", compact('redactor'));
    }
    public function index()
    {
        return view('infa');
    }
    public function destroyFile($id, $filenum)
    {
        $redactor = redactor::findOrFail($id);
        if ($redactor && $redactor[$filenum] && unlink($redactor[$filenum])) {
            $redactor[$filenum] = null;
            $redactor->save();
        }
        return back()->with('success', 'Файл удалён');
    }
}