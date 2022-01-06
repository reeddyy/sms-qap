<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyEnrolmentsQualificationRequest;
use App\Http\Requests\StoreEnrolmentsQualificationRequest;
use App\Http\Requests\UpdateEnrolmentsQualificationRequest;
use App\Models\ClassIntake;
use App\Models\Course;
use App\Models\EnrolmentsQualification;
use App\Models\Individual;
use App\Models\Officer;
use App\Models\QualificationsApp;
use App\Models\StatusQualification;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class EnrolmentsQualificationsController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('enrolments_qualification_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = EnrolmentsQualification::with(['statuses', 'application_no', 'course_title', 'classes', 'student_name', 'officer_name'])->select(sprintf('%s.*', (new EnrolmentsQualification())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'enrolments_qualification_show';
                $editGate = 'enrolments_qualification_edit';
                $deleteGate = 'enrolments_qualification_delete';
                $crudRoutePart = 'enrolments-qualifications';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('status', function ($row) {
                $labels = [];
                foreach ($row->statuses as $status) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $status->status_name);
                }

                return implode(' ', $labels);
            });
            $table->addColumn('application_no_application_no', function ($row) {
                return $row->application_no ? $row->application_no->application_no : '';
            });

            $table->addColumn('course_title_course_title', function ($row) {
                return $row->course_title ? $row->course_title->course_title : '';
            });

            $table->editColumn('classes', function ($row) {
                $labels = [];
                foreach ($row->classes as $class) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $class->class_name);
                }

                return implode(' ', $labels);
            });
            $table->editColumn('enrolment_no', function ($row) {
                return $row->enrolment_no ? $row->enrolment_no : '';
            });
            $table->addColumn('student_name_name', function ($row) {
                return $row->student_name ? $row->student_name->name : '';
            });

            $table->editColumn('company_sponsored', function ($row) {
                return $row->company_sponsored ? EnrolmentsQualification::COMPANY_SPONSORED_RADIO[$row->company_sponsored] : '';
            });
            $table->addColumn('officer_name_officer_name', function ($row) {
                return $row->officer_name ? $row->officer_name->officer_name : '';
            });

            $table->editColumn('total_fees', function ($row) {
                return $row->total_fees ? $row->total_fees : '';
            });
            $table->editColumn('amount_paid', function ($row) {
                return $row->amount_paid ? $row->amount_paid : '';
            });
            $table->editColumn('outstanding_balance', function ($row) {
                return $row->outstanding_balance ? $row->outstanding_balance : '';
            });
            $table->editColumn('instalment_fee_1', function ($row) {
                return $row->instalment_fee_1 ? $row->instalment_fee_1 : '';
            });

            $table->editColumn('instalment_fee_2', function ($row) {
                return $row->instalment_fee_2 ? $row->instalment_fee_2 : '';
            });

            $table->editColumn('instalment_fee_3', function ($row) {
                return $row->instalment_fee_3 ? $row->instalment_fee_3 : '';
            });

            $table->editColumn('note', function ($row) {
                return $row->note ? $row->note : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'status', 'application_no', 'course_title', 'classes', 'student_name', 'officer_name']);

            return $table->make(true);
        }

        $status_qualifications = StatusQualification::get();
        $qualifications_apps   = QualificationsApp::get();
        $courses               = Course::get();
        $class_intakes         = ClassIntake::get();
        $individuals           = Individual::get();
        $officers              = Officer::get();

        return view('admin.enrolmentsQualifications.index', compact('status_qualifications', 'qualifications_apps', 'courses', 'class_intakes', 'individuals', 'officers'));
    }

    public function create()
    {
        abort_if(Gate::denies('enrolments_qualification_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $statuses = StatusQualification::pluck('status_name', 'id');

        $application_nos = QualificationsApp::pluck('application_no', 'id')->prepend(trans('global.pleaseSelect'), '');

        $course_titles = Course::pluck('course_title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $classes = ClassIntake::pluck('class_name', 'id');

        $student_names = Individual::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $officer_names = Officer::pluck('officer_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.enrolmentsQualifications.create', compact('application_nos', 'classes', 'course_titles', 'officer_names', 'statuses', 'student_names'));
    }

    public function store(StoreEnrolmentsQualificationRequest $request)
    {
        $enrolmentsQualification = EnrolmentsQualification::create($request->all());
        $enrolmentsQualification->statuses()->sync($request->input('statuses', []));
        $enrolmentsQualification->classes()->sync($request->input('classes', []));

        return redirect()->route('admin.enrolments-qualifications.index');
    }

    public function edit(EnrolmentsQualification $enrolmentsQualification)
    {
        abort_if(Gate::denies('enrolments_qualification_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $statuses = StatusQualification::pluck('status_name', 'id');

        $application_nos = QualificationsApp::pluck('application_no', 'id')->prepend(trans('global.pleaseSelect'), '');

        $course_titles = Course::pluck('course_title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $classes = ClassIntake::pluck('class_name', 'id');

        $student_names = Individual::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $officer_names = Officer::pluck('officer_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $enrolmentsQualification->load('statuses', 'application_no', 'course_title', 'classes', 'student_name', 'officer_name');

        return view('admin.enrolmentsQualifications.edit', compact('application_nos', 'classes', 'course_titles', 'enrolmentsQualification', 'officer_names', 'statuses', 'student_names'));
    }

    public function update(UpdateEnrolmentsQualificationRequest $request, EnrolmentsQualification $enrolmentsQualification)
    {
        $enrolmentsQualification->update($request->all());
        $enrolmentsQualification->statuses()->sync($request->input('statuses', []));
        $enrolmentsQualification->classes()->sync($request->input('classes', []));

        return redirect()->route('admin.enrolments-qualifications.index');
    }

    public function show(EnrolmentsQualification $enrolmentsQualification)
    {
        abort_if(Gate::denies('enrolments_qualification_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $enrolmentsQualification->load('statuses', 'application_no', 'course_title', 'classes', 'student_name', 'officer_name', 'enrolmentNoPaymentsQualifications', 'enrolmentNoResultsModules');

        return view('admin.enrolmentsQualifications.show', compact('enrolmentsQualification'));
    }

    public function destroy(EnrolmentsQualification $enrolmentsQualification)
    {
        abort_if(Gate::denies('enrolments_qualification_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $enrolmentsQualification->delete();

        return back();
    }

    public function massDestroy(MassDestroyEnrolmentsQualificationRequest $request)
    {
        EnrolmentsQualification::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
