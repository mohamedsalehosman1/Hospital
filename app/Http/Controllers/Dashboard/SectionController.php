<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Interfaces\Sections\SectionRepositoryInterface;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $Sections;

    public function __construct(SectionRepositoryInterface $Sections)
    {
        $this->Sections = $Sections;
    }
    public function index()
    {

        return $this->Sections->index();
    }

    public function store(Request $request)
    {
        //
        return $this->Sections->store($request);

    }
    public function update(Request $request, string $id)
    {
        return $this->Sections->update($request);
        //
    }
      public function destroy(Request  $request)
    {
        return $this->Sections->destroy($request);
        //
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }


}
