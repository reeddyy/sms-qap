@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.enrolmentsQualification.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.enrolments-qualifications.update", [$enrolmentsQualification->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="statuses">{{ trans('cruds.enrolmentsQualification.fields.status') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('statuses') ? 'is-invalid' : '' }}" name="statuses[]" id="statuses" multiple>
                    @foreach($statuses as $id => $status)
                        <option value="{{ $id }}" {{ (in_array($id, old('statuses', [])) || $enrolmentsQualification->statuses->contains($id)) ? 'selected' : '' }}>{{ $status }}</option>
                    @endforeach
                </select>
                @if($errors->has('statuses'))
                    <div class="invalid-feedback">
                        {{ $errors->first('statuses') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.enrolmentsQualification.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="application_no_id">{{ trans('cruds.enrolmentsQualification.fields.application_no') }}</label>
                <select class="form-control select2 {{ $errors->has('application_no') ? 'is-invalid' : '' }}" name="application_no_id" id="application_no_id" required>
                    @foreach($application_nos as $id => $entry)
                        <option value="{{ $id }}" {{ (old('application_no_id') ? old('application_no_id') : $enrolmentsQualification->application_no->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('application_no'))
                    <div class="invalid-feedback">
                        {{ $errors->first('application_no') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.enrolmentsQualification.fields.application_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="course_title_id">{{ trans('cruds.enrolmentsQualification.fields.course_title') }}</label>
                <select class="form-control select2 {{ $errors->has('course_title') ? 'is-invalid' : '' }}" name="course_title_id" id="course_title_id" required>
                    @foreach($course_titles as $id => $entry)
                        <option value="{{ $id }}" {{ (old('course_title_id') ? old('course_title_id') : $enrolmentsQualification->course_title->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('course_title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('course_title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.enrolmentsQualification.fields.course_title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="start_date">{{ trans('cruds.enrolmentsQualification.fields.start_date') }}</label>
                <input class="form-control date {{ $errors->has('start_date') ? 'is-invalid' : '' }}" type="text" name="start_date" id="start_date" value="{{ old('start_date', $enrolmentsQualification->start_date) }}">
                @if($errors->has('start_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('start_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.enrolmentsQualification.fields.start_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="end_date">{{ trans('cruds.enrolmentsQualification.fields.end_date') }}</label>
                <input class="form-control date {{ $errors->has('end_date') ? 'is-invalid' : '' }}" type="text" name="end_date" id="end_date" value="{{ old('end_date', $enrolmentsQualification->end_date) }}">
                @if($errors->has('end_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('end_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.enrolmentsQualification.fields.end_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="classes">{{ trans('cruds.enrolmentsQualification.fields.classes') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('classes') ? 'is-invalid' : '' }}" name="classes[]" id="classes" multiple>
                    @foreach($classes as $id => $class)
                        <option value="{{ $id }}" {{ (in_array($id, old('classes', [])) || $enrolmentsQualification->classes->contains($id)) ? 'selected' : '' }}>{{ $class }}</option>
                    @endforeach
                </select>
                @if($errors->has('classes'))
                    <div class="invalid-feedback">
                        {{ $errors->first('classes') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.enrolmentsQualification.fields.classes_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="enrolment_no">{{ trans('cruds.enrolmentsQualification.fields.enrolment_no') }}</label>
                <input class="form-control {{ $errors->has('enrolment_no') ? 'is-invalid' : '' }}" type="text" name="enrolment_no" id="enrolment_no" value="{{ old('enrolment_no', $enrolmentsQualification->enrolment_no) }}" required>
                @if($errors->has('enrolment_no'))
                    <div class="invalid-feedback">
                        {{ $errors->first('enrolment_no') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.enrolmentsQualification.fields.enrolment_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="student_name_id">{{ trans('cruds.enrolmentsQualification.fields.student_name') }}</label>
                <select class="form-control select2 {{ $errors->has('student_name') ? 'is-invalid' : '' }}" name="student_name_id" id="student_name_id" required>
                    @foreach($student_names as $id => $entry)
                        <option value="{{ $id }}" {{ (old('student_name_id') ? old('student_name_id') : $enrolmentsQualification->student_name->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('student_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('student_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.enrolmentsQualification.fields.student_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.enrolmentsQualification.fields.company_sponsored') }}</label>
                @foreach(App\Models\EnrolmentsQualification::COMPANY_SPONSORED_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('company_sponsored') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="company_sponsored_{{ $key }}" name="company_sponsored" value="{{ $key }}" {{ old('company_sponsored', $enrolmentsQualification->company_sponsored) === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="company_sponsored_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('company_sponsored'))
                    <div class="invalid-feedback">
                        {{ $errors->first('company_sponsored') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.enrolmentsQualification.fields.company_sponsored_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="officer_name_id">{{ trans('cruds.enrolmentsQualification.fields.officer_name') }}</label>
                <select class="form-control select2 {{ $errors->has('officer_name') ? 'is-invalid' : '' }}" name="officer_name_id" id="officer_name_id">
                    @foreach($officer_names as $id => $entry)
                        <option value="{{ $id }}" {{ (old('officer_name_id') ? old('officer_name_id') : $enrolmentsQualification->officer_name->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('officer_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('officer_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.enrolmentsQualification.fields.officer_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="total_fees">{{ trans('cruds.enrolmentsQualification.fields.total_fees') }}</label>
                <input class="form-control {{ $errors->has('total_fees') ? 'is-invalid' : '' }}" type="number" name="total_fees" id="total_fees" value="{{ old('total_fees', $enrolmentsQualification->total_fees) }}" step="0.01">
                @if($errors->has('total_fees'))
                    <div class="invalid-feedback">
                        {{ $errors->first('total_fees') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.enrolmentsQualification.fields.total_fees_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="amount_paid">{{ trans('cruds.enrolmentsQualification.fields.amount_paid') }}</label>
                <input class="form-control {{ $errors->has('amount_paid') ? 'is-invalid' : '' }}" type="number" name="amount_paid" id="amount_paid" value="{{ old('amount_paid', $enrolmentsQualification->amount_paid) }}" step="0.01">
                @if($errors->has('amount_paid'))
                    <div class="invalid-feedback">
                        {{ $errors->first('amount_paid') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.enrolmentsQualification.fields.amount_paid_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="outstanding_balance">{{ trans('cruds.enrolmentsQualification.fields.outstanding_balance') }}</label>
                <input class="form-control {{ $errors->has('outstanding_balance') ? 'is-invalid' : '' }}" type="number" name="outstanding_balance" id="outstanding_balance" value="{{ old('outstanding_balance', $enrolmentsQualification->outstanding_balance) }}" step="0.01">
                @if($errors->has('outstanding_balance'))
                    <div class="invalid-feedback">
                        {{ $errors->first('outstanding_balance') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.enrolmentsQualification.fields.outstanding_balance_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="instalment_fee_1">{{ trans('cruds.enrolmentsQualification.fields.instalment_fee_1') }}</label>
                <input class="form-control {{ $errors->has('instalment_fee_1') ? 'is-invalid' : '' }}" type="number" name="instalment_fee_1" id="instalment_fee_1" value="{{ old('instalment_fee_1', $enrolmentsQualification->instalment_fee_1) }}" step="0.01">
                @if($errors->has('instalment_fee_1'))
                    <div class="invalid-feedback">
                        {{ $errors->first('instalment_fee_1') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.enrolmentsQualification.fields.instalment_fee_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="due_date_1">{{ trans('cruds.enrolmentsQualification.fields.due_date_1') }}</label>
                <input class="form-control date {{ $errors->has('due_date_1') ? 'is-invalid' : '' }}" type="text" name="due_date_1" id="due_date_1" value="{{ old('due_date_1', $enrolmentsQualification->due_date_1) }}">
                @if($errors->has('due_date_1'))
                    <div class="invalid-feedback">
                        {{ $errors->first('due_date_1') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.enrolmentsQualification.fields.due_date_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="instalment_fee_2">{{ trans('cruds.enrolmentsQualification.fields.instalment_fee_2') }}</label>
                <input class="form-control {{ $errors->has('instalment_fee_2') ? 'is-invalid' : '' }}" type="number" name="instalment_fee_2" id="instalment_fee_2" value="{{ old('instalment_fee_2', $enrolmentsQualification->instalment_fee_2) }}" step="0.01">
                @if($errors->has('instalment_fee_2'))
                    <div class="invalid-feedback">
                        {{ $errors->first('instalment_fee_2') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.enrolmentsQualification.fields.instalment_fee_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="due_date_2">{{ trans('cruds.enrolmentsQualification.fields.due_date_2') }}</label>
                <input class="form-control date {{ $errors->has('due_date_2') ? 'is-invalid' : '' }}" type="text" name="due_date_2" id="due_date_2" value="{{ old('due_date_2', $enrolmentsQualification->due_date_2) }}">
                @if($errors->has('due_date_2'))
                    <div class="invalid-feedback">
                        {{ $errors->first('due_date_2') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.enrolmentsQualification.fields.due_date_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="instalment_fee_3">{{ trans('cruds.enrolmentsQualification.fields.instalment_fee_3') }}</label>
                <input class="form-control {{ $errors->has('instalment_fee_3') ? 'is-invalid' : '' }}" type="number" name="instalment_fee_3" id="instalment_fee_3" value="{{ old('instalment_fee_3', $enrolmentsQualification->instalment_fee_3) }}" step="0.01">
                @if($errors->has('instalment_fee_3'))
                    <div class="invalid-feedback">
                        {{ $errors->first('instalment_fee_3') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.enrolmentsQualification.fields.instalment_fee_3_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="due_date_3">{{ trans('cruds.enrolmentsQualification.fields.due_date_3') }}</label>
                <input class="form-control date {{ $errors->has('due_date_3') ? 'is-invalid' : '' }}" type="text" name="due_date_3" id="due_date_3" value="{{ old('due_date_3', $enrolmentsQualification->due_date_3) }}">
                @if($errors->has('due_date_3'))
                    <div class="invalid-feedback">
                        {{ $errors->first('due_date_3') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.enrolmentsQualification.fields.due_date_3_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="note">{{ trans('cruds.enrolmentsQualification.fields.note') }}</label>
                <textarea class="form-control {{ $errors->has('note') ? 'is-invalid' : '' }}" name="note" id="note">{{ old('note', $enrolmentsQualification->note) }}</textarea>
                @if($errors->has('note'))
                    <div class="invalid-feedback">
                        {{ $errors->first('note') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.enrolmentsQualification.fields.note_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection