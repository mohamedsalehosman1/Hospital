<?php
namespace App\Repository\Doctor;

use App\Interfaces\Doctors\DoctorRepositoryInterface;
use App\Models\Doctor;

class DoctorRepository implements DoctorRepositoryInterface
{

    public function index()
    {
        return Doctor::all();
    }
    public function create()
    {

    }
    public function store($data)
    {
        return Doctor::create($data);
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

