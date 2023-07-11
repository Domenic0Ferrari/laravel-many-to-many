<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Technology;
use App\Models\Type;

class ProjectController extends Controller
{
    private $validations = [
        'title' => 'required|string|min:5|max:100',
        'type_id' => 'required|integer|exists:types,id',
        'author' => 'required|string|min:5|max:30',
        'url_github' => 'required|url|max:200',
        'description' => 'required|string',
    ];

    private $validation_messages = [

        // title
        'title.required' => 'Il campo titolo è obbligatorio',
        'title.min' => 'Il campo titolo deve avere almeno :min caratteri',
        'title.max' => 'Il campo titolo deve avere massimo :max caratteri',
        // exist
        'type_id.exists' => 'Valore non valido',
        // author
        'author.required' => 'Il campo autore è obbligatorio',
        'author.min' => 'Il campo Autore deve avere almeno :min caratteri',
        'author.max' => 'Il campo Autore deve avere massimo :max caratteri',
        // url
        'url_github.required' => 'Il campo Github è obbligatorio',
        'url_github.url' => 'Il campo Github deve essere un url valido',
        'url_github.max' => 'Il campo Github deve avere massimo :max caratteri',
        // description
        'description.required' => 'Il campo Descrizione è obbligatorio',
    ];

    public function index()
    {
        $projects = Project::paginate(5);
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.projects.create', compact('types', 'technologies'));
    }

    public function store(Request $request)
    {
        $request->validate($this->validations, $this->validation_messages);

        $data = $request->all();

        $newProject = new Project();
        $newProject->title = $data['title'];
        $newProject->type_id = $data['type_id'];
        $newProject->author = $data['author'];
        $newProject->url_github = $data['url_github'];
        $newProject->description = $data['description'];

        $newProject->save();

        $newProject->technologies()->sync($data['technologies'] ?? []);

        return to_route('admin.projects.show', ['project' => $newProject]);
    }

    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.projects.edit', compact('project', 'types', 'technologies'));
    }

    public function update(Request $request, Project $project)
    {
        $request->validate($this->validations, $this->validation_messages);

        $data = $request->all();
        // aggiornare i dati nel database se validi
        $project->title = $data['title'];
        $project->type_id = $data['type_id'];
        $project->author = $data['author'];
        $project->url_github = $data['url_github'];
        $project->description = $data['description'];
        // aggiornare i dati
        $project->update();

        $project->technologies()->sync($data['technologies'] ?? []);

        // reindirizza alla pagina show
        return to_route('admin.projects.show', ['project' => $project]);
    }

    public function destroy(Project $project)
    {
        // dissocio i tag 
        $project->technologies()->detach();

        $project->delete();
        return to_route('admin.projects.index')->with('delete_success', $project);
    }
}
