<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;

class EventController extends Controller
{
    public function index()
    {

        $search = request('search');
        if($search) {

$events = Event::where(['title', 'like', '%'.$search.'%'])->get();
        } else {

            $events = Event::all();
        

        }
        
        return view('welcome', ['events' => $events, 'search'=> $search]);
    }
    
    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        // Validar os dados do formulário
        $validatedData = $request->validate([
            'title' => 'required', // Certifique-se de que o título seja fornecido
            'city' => 'required',
            'private' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048' // Validação da imagem, se fornecida
        ]);

        $event = new Event;
        
        // Preencher os campos do evento com os dados validados do formulário
        $event->title = $request->title;
        $event->date = $request->date;
        $event->city = $request->city;
        $event->private = $request->private;
        $event->description = $request->description;
        $event->items = $request->items;
        

        // Upload de imagem
        if($request->hasFile('image') && $request->file('image')->isValid())
        {
            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/events'), $imageName);

            $event->image = $imageName;
        }

        $user = auth()->user();
        $event -> user_id = $user->id;

        // Salvar o evento no banco de dados
        $event->save();
        
        // Redirecionar para uma rota após o armazenamento bem-sucedido
        return redirect('/')->with('msg', 'Evento criado com sucesso!');
    }

    public function show($id) 
    {
        $event = Event::findOrFail($id);
        
        $eventOwner = User::where('id', $event->user_id)->first()->toArray();
        
        return view('events.show', ['event' => $event, 'eventOwner' => $eventOwner]);
    }
    public function dashboard() {
    $user = auth()->user();

    $events = $user->events;

    return view('events.dashboard', ['events' => $events]);


    }
    public function destroy($id) {

       Event::findOrFail($id)->delete();
       
       return redirect('/dashboard')->with('msg','Evento excluido com sucesso!' );
    }
}
