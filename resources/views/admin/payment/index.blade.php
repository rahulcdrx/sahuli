@extends('layouts.admin')
@section('content')
@can('company_create')
<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">

    </div>
</div>
@endcan
<div class="card">
    <div class="card-header">
        Payment Details
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Company" style="margin:0px;">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>QRCode</th>
                        <th>GPAY</th>
                        <th>Bank_Acc</th>
                        <th>IFSC</th>
                        <th>Branch</th>
                        <th>Subscription Plan</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($payment as $key => $pay)
                    <tr>
                        <td> {{$pay->id}} </td>
                        <!--<td> {{$pay->QR_image}} </td>-->
                        <td><img src="{{ asset('uploads/'."$pay->QR_image") }}" width="250" height="250"></td>
                        <td> {{$pay->GPAY}} </td>
                        <td> {{$pay->bank_acc}} </td>
                        <td> {{$pay->ifsc}} </td>
                        <td> {{$pay->branch}} </td>
                        <td> {{ $pay->plan }}</td>
                        <td>
                            <!--<a class="btn btn-xs btn-primary" href="{{ route('admin.payment.show', $pay->id) }}">-->
                            <!--    View-->
                            <!--</a>-->
                             @can('user_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.payment.edit', $pay->id) }}" style="width: 50px; font-size: 9px;">
                                        {{ trans('global.edit') }}
                                    </a>
                            @endcan
                           <!--  <form action="{{ route('admin.payment.destroy', $pay->id) }}" method="POST"
                                onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                style="display: inline-block;">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                            </form> -->
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <h6>Only One Bank details Allowed</h6>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
// @can('company_delete')
//   let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
//   let deleteButton = {
//     text: deleteButtonTrans,
//     url: "{{ route('admin.companies.massDestroy') }}",
//     className: 'btn-danger',
//     action: function (e, dt, node, config) {
//       var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
//           return $(entry).data('entry-id')
//       });

//       if (ids.length === 0) {
//         alert('{{ trans('global.datatables.zero_selected') }}')

//         return
//       }

//       if (confirm('{{ trans('global.areYouSure') }}')) {
//         $.ajax({
//           headers: {'x-csrf-token': _token},
//           method: 'POST',
//           url: config.url,
//           data: { ids: ids, _method: 'DELETE' }})
//           .done(function () { location.reload() })
//       }
//     }
//   }
//   dtButtons.push(deleteButton)
// @endcan

  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable-Company:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection
