@extends('layouts.tableLayout')

@section('title', $title)

@section('table')
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