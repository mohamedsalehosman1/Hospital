<?php
namespace App\Interfaces\Sections;

interface SectionRepositoryInterface
{
    public function index();
    public function store($request);//store take a$request
    public function update($id);
    public function destroy($id);

}
