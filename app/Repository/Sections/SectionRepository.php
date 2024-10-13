<?php
namespace App\Repository\Sections;
use App\Interfaces\Sections\SectionRepositoryInterface;
use App\Models\Section;

class SectionRepository implements SectionRepositoryInterface
{

    public function index()
    {
        $sections = Section::all();
        return view("dashboard.sections.sections", get_defined_vars());
    }
    public function store($request)
    {


        // Store the section
        Section::create([
            "name" => $request->input('name'),
        ]);
        session()->flash("add");
        return redirect()->route('section.index')->with('success', 'Section added successfully.');
    }
    public function update($request)
    {



        $section = Section::findOrFail($request->id);


        $section->name = $request->input('name');
        $section->update([
            'name' => $request->input('name'),
        ]);
        session()->flash("edit");

        // إعادة توجيه مع رسالة نجاح
        return redirect()->route('section.index')->with('success', 'تم تحديث القسم بنجاح!');
    }
    public function destroy($request)
    {
        Section::findOrFail($request->id)->delete();
        session()->flash("delete");
        return redirect()->route('section.index');
    }
}
