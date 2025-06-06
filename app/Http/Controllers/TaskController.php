<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
{
    $tasks = Task::all();
    return view('tasks.index', compact('tasks'));
}

public function create()
{
    $capitais = [ /* Liste as capitais do Brasil */ ];
    return view('tasks.create', compact('capitais'));
}

public function store(Request $request)
{
    $request->validate([
        'nome_completo' => 'required|string|max:255',
        'setor' => 'required|in:Tecnologia,Administrativo,Projeto',
        'cidade' => 'required|string',
        'checkin' => 'required|date',
    ]);

    Task::create($request->all());
    return redirect()->route('tasks.index')->with('success', 'Cadastro realizado!');
}

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'setor' => 'required',
            'cidade' => 'required',
            'checkin' => 'required|date',
        ]);

        $task->update($request->all());

        return redirect()->route('tasks.index');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index');
    }
}
