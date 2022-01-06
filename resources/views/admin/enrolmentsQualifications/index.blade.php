@extends('layouts.admin')
@section('content')
@can('enrolments_qualification_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.enrolments-qualifications.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.enrolmentsQualification.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.enrolmentsQualification.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-EnrolmentsQualification">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.enrolmentsQualification.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.enrolmentsQualification.fields.status') }}
                    </th>
                    <th>
                        {{ trans('cruds.enrolmentsQualification.fields.application_no') }}
                    </th>
                    <th>
                        {{ trans('cruds.enrolmentsQualification.fields.course_title') }}
                    </th>
                    <th>
                        {{ trans('cruds.enrolmentsQualification.fields.start_date') }}
                    </th>
                    <th>
                        {{ trans('cruds.enrolmentsQualification.fields.end_date') }}
                    </th>
                    <th>
                        {{ trans('cruds.enrolmentsQualification.fields.classes') }}
                    </th>
                    <th>
                        {{ trans('cruds.enrolmentsQualification.fields.enrolment_no') }}
                    </th>
                    <th>
                        {{ trans('cruds.enrolmentsQualification.fields.student_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.enrolmentsQualification.fields.company_sponsored') }}
                    </th>
                    <th>
                        {{ trans('cruds.enrolmentsQualification.fields.officer_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.enrolmentsQualification.fields.total_fees') }}
                    </th>
                    <th>
                        {{ trans('cruds.enrolmentsQualification.fields.amount_paid') }}
                    </th>
                    <th>
                        {{ trans('cruds.enrolmentsQualification.fields.outstanding_balance') }}
                    </th>
                    <th>
                        {{ trans('cruds.enrolmentsQualification.fields.instalment_fee_1') }}
                    </th>
                    <th>
                        {{ trans('cruds.enrolmentsQualification.fields.due_date_1') }}
                    </th>
                    <th>
                        {{ trans('cruds.enrolmentsQualification.fields.instalment_fee_2') }}
                    </th>
                    <th>
                        {{ trans('cruds.enrolmentsQualification.fields.due_date_2') }}
                    </th>
                    <th>
                        {{ trans('cruds.enrolmentsQualification.fields.instalment_fee_3') }}
                    </th>
                    <th>
                        {{ trans('cruds.enrolmentsQualification.fields.due_date_3') }}
                    </th>
                    <th>
                        {{ trans('cruds.enrolmentsQualification.fields.note') }}
                    </th>
                    <th>
                        &nbsp;
                    </th>
                </tr>
                <tr>
                    <td>
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <select class="search">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach($status_qualifications as $key => $item)
                                <option value="{{ $item->status_name }}">{{ $item->status_name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select class="search">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach($qualifications_apps as $key => $item)
                                <option value="{{ $item->application_no }}">{{ $item->application_no }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select class="search">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach($courses as $key => $item)
                                <option value="{{ $item->course_title }}">{{ $item->course_title }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                        <select class="search">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach($class_intakes as $key => $item)
                                <option value="{{ $item->class_name }}">{{ $item->class_name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <select class="search">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach($individuals as $key => $item)
                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select class="search" strict="true">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach(App\Models\EnrolmentsQualification::COMPANY_SPONSORED_RADIO as $key => $item)
                                <option value="{{ $key }}">{{ $item }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select class="search">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach($officers as $key => $item)
                                <option value="{{ $item->officer_name }}">{{ $item->officer_name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                    </td>
                </tr>
            </thead>
        </table>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('enrolments_qualification_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.enrolments-qualifications.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.enrolments-qualifications.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'status', name: 'statuses.status_name' },
{ data: 'application_no_application_no', name: 'application_no.application_no' },
{ data: 'course_title_course_title', name: 'course_title.course_title' },
{ data: 'start_date', name: 'start_date' },
{ data: 'end_date', name: 'end_date' },
{ data: 'classes', name: 'classes.class_name' },
{ data: 'enrolment_no', name: 'enrolment_no' },
{ data: 'student_name_name', name: 'student_name.name' },
{ data: 'company_sponsored', name: 'company_sponsored' },
{ data: 'officer_name_officer_name', name: 'officer_name.officer_name' },
{ data: 'total_fees', name: 'total_fees' },
{ data: 'amount_paid', name: 'amount_paid' },
{ data: 'outstanding_balance', name: 'outstanding_balance' },
{ data: 'instalment_fee_1', name: 'instalment_fee_1' },
{ data: 'due_date_1', name: 'due_date_1' },
{ data: 'instalment_fee_2', name: 'instalment_fee_2' },
{ data: 'due_date_2', name: 'due_date_2' },
{ data: 'instalment_fee_3', name: 'instalment_fee_3' },
{ data: 'due_date_3', name: 'due_date_3' },
{ data: 'note', name: 'note' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-EnrolmentsQualification').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
let visibleColumnsIndexes = null;
$('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value

      let index = $(this).parent().index()
      if (visibleColumnsIndexes !== null) {
        index = visibleColumnsIndexes[index]
      }

      table
        .column(index)
        .search(value, strict)
        .draw()
  });
table.on('column-visibility.dt', function(e, settings, column, state) {
      visibleColumnsIndexes = []
      table.columns(":visible").every(function(colIdx) {
          visibleColumnsIndexes.push(colIdx);
      });
  })
});

</script>
@endsection