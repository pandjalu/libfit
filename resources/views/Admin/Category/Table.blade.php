@extends('layouts.adminlte.page-blank')

@section('title', $title)

@section('content')
    <div class="row justify-content-center">

        <div class="d-flex flex-row justify-content-end mb-3 px-3" style="width: 100%">
            <button class="btn btn-success" onclick="window.location.href = `{{ route('admin.category.create') }}`">Tambah Catgory</button>
        </div>
        <div class="col-md-12">
            <div class="card card-outline card-success">
                <div class="card-body">
                <table id="table_id" class="display">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Updated</th>
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $row)
                            <tr>
                                <td> {{ $row->id }} </td>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->updated_at }}</td>
                                <td>{{ $row->created_at }}</td>
                                <td>
                                <button type="button" class="btn btn-outline-success btn-sm btn-edit" onclick="window.location.href = `{{ url('admin/category/edit/' . $row->id) }}`"><i class="fas fa-pencil-alt"></i></button>
                                <button type="button" class="btn btn-outline-danger btn-sm btn-edit" onclick="window.location.href = `{{ url('admin/category/delete/' . $row->id) }}`"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script>
    $(document).ready( function () {
        $('#table_id').DataTable({
            "columnDefs": [
                { "width": "30%", "targets": 1 }
            ]
        });
    } );
</script>
@endsection