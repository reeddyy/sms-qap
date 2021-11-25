<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyGradeRequest;
use App\Http\Requests\StoreGradeRequest;
use App\Http\Requests\UpdateGradeRequest;
use App\Models\Grade;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GradesController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('grade_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $grades = Grade::all();

        return view('admin.grades.index', compact('grades'));
    }

    public function create()
    {
        abort_if(Gate::denies('grade_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.grades.create');
    }

    public function store(StoreGradeRequest $request)
    {
        $grade = Grade::create($request->all());

        return redirect()->route('admin.grades.index');
    }

    public function edit(Grade $grade)
    {
        abort_if(Gate::denies('grade_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.grades.edit', compact('grade'));
    }

    public function update(UpdateGradeRequest $request, Grade $grade)
    {
        $grade->update($request->all());

        return redirect()->route('admin.grades.index');
    }

    public function show(Grade $grade)
    {
        abort_if(Gate::denies('grade_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.grades.show', compact('grade'));
    }

    public function destroy(Grade $grade)
    {
        abort_if(Gate::denies('grade_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $grade->delete();

        return back();
    }

    public function massDestroy(MassDestroyGradeRequest $request)
    {
        Grade::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
