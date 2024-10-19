<?php
namespace App\Interfaces\Doctors;

interface DoctorRepositoryInterface
{

    public function index();
    // public function create();
    public function store( $data);
    public function update($data, $model);
    public function destroy($model);

}
