@can('module_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.modules.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.module.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.module.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-moduleLevelModules">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.module.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.module.fields.module_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.module.fields.module_abbr') }}
                        </th>
                        <th>
                            {{ trans('cruds.module.fields.module_code') }}
                        </th>
                        <th>
                            {{ trans('cruds.module.fields.module_level') }}
                        </th>
                        <th>
                            {{ trans('cruds.module.fields.module_status') }}
                        </th>
                        <th>
                            {{ trans('cruds.module.fields.note') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($modules as $key => $module)
                        <tr data-entry-id="{{ $module->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $module->id ?? '' }}
                            </td>
                            <td>
                                {{ $module->module_name ?? '' }}
                            </td>
                            <td>
                                {{ $module->module_abbr ?? '' }}
                            </td>
                            <td>
                                {{ $module->module_code ?? '' }}
                            </td>
                            <td>
                                {{ $module->module_level->level_name ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Module::MODULE_STATUS_RADIO[$module->module_status] ?? '' }}
                            </td>
                            <td>
                                {{ $module->note ?? '' }}
                            </td>
                            <td>
                                @can('module_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.modules.show', $module->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('module_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.modules.edit', $module->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('module_delete')
                                    <form action="{{ route('admin.modules.destroy', $module->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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

@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('module_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.modules.massDestroy') }}",
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
  let table = $('.datatable-moduleLevelModules:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection