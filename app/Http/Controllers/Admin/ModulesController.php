<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyModuleRequest;
use App\Http\Requests\StoreModuleRequest;
use App\Http\Requests\UpdateModuleRequest;
use App\Models\Level;
use App\Models\Module;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ModulesController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('module_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $modules = Module::with(['module_level'])->get();

        $levels = Level::get();

        return view('admin.modules.index', compact('levels', 'modules'));
    }

    public function create()
    {
        abort_if(Gate::denies('module_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $module_levels = Level::pluck('level_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.modules.create', compact('module_levels'));
    }

    public function store(StoreModuleRequest $request)
    {
        $module = Module::create($request->all());

        return redirect()->route('admin.modules.index');
    }

    public function edit(Module $module)
    {
        abort_if(Gate::denies('module_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $module_levels = Level::pluck('level_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $module->load('module_level');

        return view('admin.modules.edit', compact('module', 'module_levels'));
    }

    public function update(UpdateModuleRequest $request, Module $module)
    {
        $module->update($request->all());

        return redirect()->route('admin.modules.index');
    }

    public function show(Module $module)
    {
        abort_if(Gate::denies('module_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $module->load('module_level', 'moduleSCourses');

        return view('admin.modules.show', compact('module'));
    }

    public function destroy(Module $module)
    {
        abort_if(Gate::denies('module_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $module->delete();

        return back();
    }

    public function massDestroy(MassDestroyModuleRequest $request)
    {
        Module::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
