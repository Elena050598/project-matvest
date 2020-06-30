<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    public function index()
    {
        return view("index");
    }

    public function check()
    {
        return view("checkProfile");
    }

    public function indexProfile()
    {
        $user = User::find(Auth::user()->id);
        if (!$user) {
            $user = new User();
        }
        $genders = array('Мужской', 'Женский');
        $academic_degrees = array('б/с', 'дпн', 'дтн', 'дфмн', 'кпн', 'ктн', 'кфмн', 'Ph.D');
        $academic_ranks = array('б/з', 'акад.', 'чл.-корр. РАН', 'проф', 'доц', 'снс');
        return view("profile", compact("user", "genders", "academic_degrees", "academic_ranks"));
    }
    public function create_user(Request $request)
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        if (!$user) {
            $user = new User();
        }
        $user->id = $id;
        $user->surname = $request->surname;
        $user->name = $request->name;
        $user->patronymic = $request->patronymic;
        $user->country = $request->country;
        $user->city = $request->city;
        $user->position = $request->position;
        $user->full_name_of_organization = $request->full_name_of_organization;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->academic_degree = $request->academic_degree;
        $user->academic_rank = $request->academic_rank;
        $user->save();
        if (!Auth::user()->inRole('is_admin')&& !Auth::user()->inRole('author')&& $user->surname!=null && $user->patronymic!=null &&
            $user->full_name_of_organization!=null && $user->position!=null){
            $to='/check';
            $user->roles()->attach(1);
        }
        else{
            $to='/profile';
        }
        return redirect($to)->withInput()->with('status', 'Для получения доступа к статьям необходимо 
        заполнить следующие поля анкеты: "Фамилия", "Имя", "Отчество", "Полное название организации", "Должность"');
    }
}
