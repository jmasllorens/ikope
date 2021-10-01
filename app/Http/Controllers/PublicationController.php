<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use App\Models\Publication;
use App\Repositories\PublicationRepository;

class PublicationController extends Controller
{   
    private $publicationRepository;


    public function __construct(PublicationRepository $publicationRepository)
    {
        $this->publicationRepository = $publicationRepository;
    }

    public function index()

    {   
        $publications = $this->publicationRepository->all();
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

    /* public function update(Request $request, Publication $publication)
    {
        $publication->fill($request->all());
        $publication = $this->userRepository->save($publication);
    }

    public function destroy(Publication $publication)
    {
        $publication = $this->publicationRepository->delete($publication);
        return response()->json($publication);   
    }  */

}