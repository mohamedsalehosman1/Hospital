<?php
namespace App\Interfaces\Sections;

interface SectionRepositoryInterface
{
    public function index();
    public function store($data);
    public function update($data, $model);
    public function destroy($model);
}
