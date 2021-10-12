<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use App\Models\Publication;
use App\Repositories\PublicationRepository;
use App\Cache\PublicationCache;

class PublicationController extends Controller
{   
    private $publicationRepository;


    public function __construct(PublicationCache $publicationRepository)
    {
        $this->publicationRepository = $publicationRepository;
    }

    public function index()

    {   $user = Auth::user();
        $startTime = microtime(true);
 

        $publications = $this->publicationRepository->all();
        

        $sendTime = microtime(true);

      /*   dump($sendTime - $startTime);  */
        return Inertia::render('Publications', ['publications' => $publications]);
    }

    public function get(int $id)
    {
        $publication = $this->publicationRepository->get($id);
        return response()->json($publication); 
    }

    public function create()
    {   
        $user = Auth::user();

        return Inertia::render('PublicationsCreate');
    }

    public function store(Request $request)
    {
        $publication = new Publication($request->all());
        $publication = $this->publicationRepository->save($publication);

        session()->flash('message', 'A new publication has been successfully created!');

        return redirect()->route('publications');
    }

     public function update(Request $request, Publication $publication)
    {
        $publication->fill($request->all());
        $publication = $this->publicationRepository->save($publication);
        session()->flash('message', 'The publication has been successfully updated!');

        return redirect()->route('publications');
    }

    public function destroy(Publication $publication)
    {
        $publication = $this->publicationRepository->delete($publication);

        session()->flash('message', 'The publication has been successfully deleted!');

        return redirect()->route('publications');
    }  

}