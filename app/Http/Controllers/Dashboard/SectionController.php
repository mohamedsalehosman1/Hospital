<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\SectionRequest;
use App\Models\Section;
use App\Repository\Sections\SectionRepository;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $reposatry;

    public function __construct(SectionRepository $reposatry)
    {
        $this->reposatry = $reposatry;
    }
    public function index()
    {
        $sections = $this->reposatry->index();
        return view("dashboard.sections.sections", get_defined_vars());
    }

    public function store(SectionRequest $request)
    {
        $ection = $this->reposatry->store($request->validated());
        session()->flash("add");
        return redirect()->route('section.index')->with('success', 'Section added successfully.');
    }
    public function update(SectionRequest $request, Section $section)
    {
        $section = $this->reposatry->update($request->validated(), $section);
        session()->flash("edit");
        return redirect()->route('section.index')->with('success', 'تم تحديث القسم بنجاح!');
    }

    public function destroy(Section $section)
    {
        $this->reposatry->destroy($section);
        session()->flash("delete");
        return redirect()->route('section.index');
    }
}
