@can('support_funds_corporate_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.support-funds-corporates.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.supportFundsCorporate.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.supportFundsCorporate.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-memberNoSupportFundsCorporates">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.supportFundsCorporate.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.supportFundsCorporate.fields.member_no') }}
                        </th>
                        <th>
                            {{ trans('cruds.supportFundsCorporate.fields.fund_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.supportFundsCorporate.fields.amount') }}
                        </th>
                        <th>
                            {{ trans('cruds.supportFundsCorporate.fields.date') }}
                        </th>
                        <th>
                            {{ trans('cruds.supportFundsCorporate.fields.invoice_no') }}
                        </th>
                        <th>
                            {{ trans('cruds.supportFundsCorporate.fields.purpose') }}
                        </th>
                        <th>
                            {{ trans('cruds.supportFundsCorporate.fields.note') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($supportFundsCorporates as $key => $supportFundsCorporate)
                        <tr data-entry-id="{{ $supportFundsCorporate->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $supportFundsCorporate->id ?? '' }}
                            </td>
                            <td>
                                {{ $supportFundsCorporate->member_no->member_no ?? '' }}
                            </td>
                            <td>
                                {{ $supportFundsCorporate->fund_name->fund_name ?? '' }}
                            </td>
                            <td>
                                {{ $supportFundsCorporate->amount ?? '' }}
                            </td>
                            <td>
                                {{ $supportFundsCorporate->date ?? '' }}
                            </td>
                            <td>
                                {{ $supportFundsCorporate->invoice_no ?? '' }}
                            </td>
                            <td>
                                {{ $supportFundsCorporate->purpose->purpose_name ?? '' }}
                            </td>
                            <td>
                                {{ $supportFundsCorporate->note ?? '' }}
                            </td>
                            <td>
                                @can('support_funds_corporate_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.support-funds-corporates.show', $supportFundsCorporate->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('support_funds_corporate_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.support-funds-corporates.edit', $supportFundsCorporate->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('support_funds_corporate_delete')
                                    <form action="{{ route('admin.support-funds-corporates.destroy', $supportFundsCorporate->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('support_funds_corporate_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.support-funds-corporates.massDestroy') }}",
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
  let table = $('.datatable-memberNoSupportFundsCorporates:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection