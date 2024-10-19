<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Validation\StoreDoctorRequest;
use App\Models\Doctor;
use App\Models\Section;
use Illuminate\Http\Request;
use App\Repository\Doctor\DoctorRepository;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;

class DoctorController extends Controller
{

    private $reposatry;
    public function __construct(DoctorRepository $reposatry)
    {
        $this->reposatry = $reposatry;

    }

    public function index()
    {
        //

        $sections = Section::all();

        $doctor = $this->reposatry->index();
        // $doctor = Doctor::find(8)->getMedia('media');
        //get media collection

        // $doctor =Doctor::find(8)->getFirstMedia('media')->getUrl();
        //get url "http://hospital_project.test/media/3/Screenshot-2024-09-04-123817.png"

        return view("dashboard.doctors.doctors", get_defined_vars());

    }
    public function create()
    {
        $sections = Section::all();
        return view("dashboard.doctors.add", get_defined_vars());

    }

    public function store(StoreDoctorRequest $request)
    {
        DB::beginTransaction(); // بدء المعاملة

        try {
            // تحقق من صحة البيانات
            $validatedData = $request->validated();

            // إنشاء طبيب جديد
            $doctor = $this->reposatry->store($validatedData);

            // إضافة صورة الطبيب إلى مكتبة الوسائط
            $doctor->addMediaFromRequest('photo')->toMediaCollection('media');

            // تأكيد المعاملة
            DB::commit();

            // إعداد رسالة النجاح
            session()->flash("edit");
            return redirect()->route('doctor.index')->with('success', 'تم تحديث القسم بنجاح!');
        } catch (\Exception $e) {
            // التراجع عن المعاملة في حالة حدوث خطأ
            DB::rollBack();

            // يمكنك تسجيل الخطأ أو إظهار رسالة مناسبة
            return redirect()->route('doctor.index')->with('error', 'حدث خطأ أثناء إضافة الطبيب.');
        }
    }

    public function update(Request $request, Doctor $doctor)
    {



        $doctor = $this->reposatry->update($request->all(), $doctor);
        session()->flash("edit");

        return redirect()->route('doctor.index')->with('success', 'تم تحديث القسم بنجاح!');
        //
    }
    public function destroy(Doctor $doctor)
    {
        $this->reposatry->destroy($doctor);
        session()->flash("delete");
        return redirect()->route('doctor.index');
    }
}
