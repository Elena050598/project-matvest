<?php
namespace App\Http\Controllers;
use App\User;
class SostavController extends Controller
{
    public function indexRedkol()
    {
        $users = User::all();
        $academic_degrees = array( '','Доктор педагогических наук', 'Доктор технических наук',
            'Доктор физико-математических наук', 'Кандидат педагогических наук', 'Кандидат технических наук',
            'Кандидат физико-математиских наук', 'Доктор филосифии');
        $academic_ranks = array( 'Академик', 'Член-корреспондент РАН', 'Профессор', 'Доцент',
            'Старший научный сотрудник');
        return view('redkol', compact('users', 'academic_degrees', 'academic_ranks'));
    }
    public function indexUMO()
    {
        $users = User::all();
        $academic_degrees = array( '','Доктор педагогических наук', 'Доктор технических наук',
            'Доктор физико-математических наук', 'Кандидат педагогических наук', 'Кандидат технических наук',
            'Кандидат физико-математиских наук', 'Доктор филосифии');
        $academic_ranks = array( 'Академик', 'Член-корреспондент РАН', 'Профессор', 'Доцент',
            'Старший научный сотрудник');
        return view('umo', compact('users', 'academic_degrees', 'academic_ranks'));
    }
}