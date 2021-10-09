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

    {   
        $startTime = microtime(true);

        $publications = $this->publicationRepository->all();

        $sendTime = microtime(true);

        /* dump($sendTime-$startTime); */
        return response()->json($publications);
    }

    public function get(int $id)
    {
        $publication = $this->publicationRepository->get($id);
        return response()->json($publication); 
    }

    public function store(Request $request)
    {
        $publication = new Publication($request->all());
        $publication = $this->publicationRepository->save($publication);

        return response()->json($publication);
    }

     public function update(Request $request, Publication $publication)
    {
        $publication->fill($request->all());
        $publication = $this->publicationRepository->save($publication);
    }

    public function destroy(Publication $publication)
    {
        $publication = $this->publicationRepository->delete($publication);
        return response()->json($publication);   
    }  

}