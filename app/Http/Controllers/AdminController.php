<?php
namespace App\Http\Controllers;
use App\Role;
use App\User;
use Illuminate\Http\Request;
class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        $roles = Role::all();
        return view('users', compact('users', 'roles'));
    }
    public function store(User $user, Request $request)
    {
        $user->roles()->sync($request->roles);
        return redirect()->back()->with('success', 'Изменения сохранены');
    }
    public function destroy($id, $name)
    {
        $data = User::findOrFail($id);
        $data->delete();
        return redirect('users')->with('success', 'Пользователь успешно удалён');
    }
}