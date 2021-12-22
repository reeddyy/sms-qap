@extends('layouts.admin')
@section('content')
@can('course_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.courses.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.course.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'Course', 'route' => 'admin.courses.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.course.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Course">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.course.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.course.fields.course_title') }}
                        </th>
                        <th>
                            {{ trans('cruds.course.fields.course_abbr') }}
                        </th>
                        <th>
                            {{ trans('cruds.course.fields.duration_month') }}
                        </th>
                        <th>
                            {{ trans('cruds.course.fields.level') }}
                        </th>
                        <th>
                            {{ trans('cruds.course.fields.module_s') }}
                        </th>
                        <th>
                            {{ trans('cruds.course.fields.classes') }}
                        </th>
                        <th>
                            {{ trans('cruds.course.fields.member_rate') }}
                        </th>
                        <th>
                            {{ trans('cruds.course.fields.public_rate') }}
                        </th>
                        <th>
                            {{ trans('cruds.course.fields.course_fee') }}
                        </th>
                        <th>
                            {{ trans('cruds.course.fields.m_el_fee') }}
                        </th>
                        <th>
                            {{ trans('cruds.course.fields.examination_fee') }}
                        </th>
                        <th>
                            {{ trans('cruds.course.fields.registration_fee') }}
                        </th>
                        <th>
                            {{ trans('cruds.course.fields.no_of_instalment') }}
                        </th>
                        <th>
                            {{ trans('cruds.course.fields.instalment_fee_1st') }}
                        </th>
                        <th>
                            {{ trans('cruds.course.fields.due_day_s_1st') }}
                        </th>
                        <th>
                            {{ trans('cruds.course.fields.instalment_fee_2nd') }}
                        </th>
                        <th>
                            {{ trans('cruds.course.fields.due_day_s_2nd') }}
                        </th>
                        <th>
                            {{ trans('cruds.course.fields.instalment_fee_3rd') }}
                        </th>
                        <th>
                            {{ trans('cruds.course.fields.due_day_s_3rd') }}
                        </th>
                        <th>
                            {{ trans('cruds.course.fields.course_status') }}
                        </th>
                        <th>
                            {{ trans('cruds.course.fields.note') }}
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
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($levels as $key => $item)
                                    <option value="{{ $item->level_name }}">{{ $item->level_name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($modules as $key => $item)
                                    <option value="{{ $item->module_name }}">{{ $item->module_name }}</option>
                                @endforeach
                            </select>
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
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\Course::COURSE_STATUS_RADIO as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($courses as $key => $course)
                        <tr data-entry-id="{{ $course->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $course->id ?? '' }}
                            </td>
                            <td>
                                {{ $course->course_title ?? '' }}
                            </td>
                            <td>
                                {{ $course->course_abbr ?? '' }}
                            </td>
                            <td>
                                {{ $course->duration_month ?? '' }}
                            </td>
                            <td>
                                {{ $course->level->level_name ?? '' }}
                            </td>
                            <td>
                                @foreach($course->module_s as $key => $item)
                                    <span class="badge badge-info">{{ $item->module_name }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach($course->classes as $key => $item)
                                    <span class="badge badge-info">{{ $item->class_name }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $course->member_rate ?? '' }}
                            </td>
                            <td>
                                {{ $course->public_rate ?? '' }}
                            </td>
                            <td>
                                {{ $course->course_fee ?? '' }}
                            </td>
                            <td>
                                {{ $course->m_el_fee ?? '' }}
                            </td>
                            <td>
                                {{ $course->examination_fee ?? '' }}
                            </td>
                            <td>
                                {{ $course->registration_fee ?? '' }}
                            </td>
                            <td>
                                {{ $course->no_of_instalment ?? '' }}
                            </td>
                            <td>
                                {{ $course->instalment_fee_1st ?? '' }}
                            </td>
                            <td>
                                {{ $course->due_day_s_1st ?? '' }}
                            </td>
                            <td>
                                {{ $course->instalment_fee_2nd ?? '' }}
                            </td>
                            <td>
                                {{ $course->due_day_s_2nd ?? '' }}
                            </td>
                            <td>
                                {{ $course->instalment_fee_3rd ?? '' }}
                            </td>
                            <td>
                                {{ $course->due_day_s_3rd ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Course::COURSE_STATUS_RADIO[$course->course_status] ?? '' }}
                            </td>
                            <td>
                                {{ $course->note ?? '' }}
                            </td>
                            <td>
                                @can('course_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.courses.show', $course->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('course_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.courses.edit', $course->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('course_delete')
                                    <form action="{{ route('admin.courses.destroy', $course->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('course_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.courses.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
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

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Course:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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
})

</script>
@endsection