@extends('layouts.tableLayout')

@section('title', $title)

@section('table')
<table id="table_id" class="display">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $row)
        <tr>
            <td>{{ $row->name }}</td>
            <td>{{ $row->email }}</td>
            <td>{{ $row->created_at }}</td>
            <td>{{ $row->updated_at }}</td>
            <td class="text-center">
                <button type="button" class="btn btn-outline-success btn-sm btn-edit" onclick="window.location.href = `{{ url('admin/member/edit/' . $row->id) }}`"><i class="fas fa-pencil-alt"></i></button>
                <button type="button" class="btn btn-outline-danger btn-sm btn-edit" onclick="window.location.href = `{{ url('admin/member/delete/' . $row->id) }}`"><i class="fas fa-trash"></i></button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

@section('js')
<script>
    $(document).ready( function () {
        $('#table_id').DataTable({});
    });
</script>
@endsection