<?php
namespace App\Repository\Sections;

use App\Interfaces\Sections\SectionRepositoryInterface;
use App\Models\Section;

class SectionRepository implements SectionRepositoryInterface
{
    public function index()
    {
        return Section::all();
    }

    public function store($data)
    {
        return Section::create($data);
    }

    public function update($data, $model)
    {
        return $model->update($data);
    }

    public function destroy($model)
    {
        return $model->delete();
    }

}
