@extends('layouts.admin')

@section('content')

<!-- @can('user_create')

    <div style="margin-bottom: 10px;" class="row">

        <div class="col-lg-12">

            <a class="btn btn-success" href="{{ route("admin.request.create") }}">

                {{ trans('global.add') }} {{ trans('cruds.user.title_singular') }}

            </a>

        </div>

    </div>

@endcan -->

<div class="card">

    <div class="card-header">

        Recommendation List

    </div>



    <div class="card-body">

        <div class="table-responsive">

            <table class=" table table-bordered table-striped table-hover datatable datatable-User" style="margin:0px;">

                <thead>

                    <tr>

                        <th width="10">



                        </th>

                        <th>

                            {{ trans('cruds.user.fields.id') }}

                        </th>

                        <th>

                            {{ trans('cruds.user.fields.name') }}

                        </th>

                        <th>

                            {{ trans('cruds.user.fields.email') }}

                        </th>

                      

                        <th>

                            {{ trans('cruds.user.fields.roles') }}

                        </th>

                        <th>

                           Action

                        </th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($recommendation as $key => $recommendations)

                        <tr data-entry-id="{{ $recommendations->id }}">

                            <td>



                            </td>

                            <td>

                                {{ $recommendations->id ?? '' }}

                            </td>

                            <td>

                                {{ $recommendations->name ?? '' }}

                            </td>

                            <td>

                                {{ $recommendations->email ?? '' }}

                            </td>

                           

                            <td>

                               {{ $recommendations->message ?? '' }}

                            </td>

                            <td>

                                @can('user_show')

                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.recommendation.show', $recommendations->id) }}">

                                        {{ trans('global.view') }}

                                    </a>

                                @endcan

                                @can('user_delete')

                                    <form action="{{ route('admin.recommendation.destroy', $recommendations->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">

                                        <input type="hidden" name="_method" value="DELETE">

                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                        <input type="submit" class="btn btn-xs btn-danger" value="Reject">

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

// @can('user_delete')

//   let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'

//   let deleteButton = {

//     text: deleteButtonTrans,

//     url: "{{ route('admin.users.massDestroy') }}",

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

  $('.datatable-User:not(.ajaxTable)').DataTable({ buttons: dtButtons })

    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){

        $($.fn.dataTable.tables(true)).DataTable()

            .columns.adjust();

    });

})



</script>

@endsection