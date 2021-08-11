@extends('layouts.tableLayout')

@section('title', $title)

@section('table')
<table id="table_id" class="display">
    <thead>
        <tr>
            <th>Judul</th>
            <th>Category</th>
            <th>Image</th>
            <th>Creator</th>
            <th>Update</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $row)
            <tr>
                <td>{{ $row->name }}</td>
                <td>{{ isset($categories[$row->category]) ? $categories[$row->category] : '' }}</td>
                <td>{{ $row->image }}</td>
                <td>{{ $row->creator }}</td>
                <td>{{ $row->updated_at }}</td>
                <td class="text-center">
                <button  type="button" class="btn btn-outline-info btn-sm" onclick="window.location.href = `{{ url('admin/book/' . $row->id) }}`"><i class="fa fa-eye"></i></button>
                <button type="button" class="btn btn-outline-success btn-sm btn-edit" onclick="window.location.href = `{{ url('admin/book/edit/' . $row->id) }}`"><i class="fas fa-pencil-alt"></i></button>
                <button type="button" class="btn btn-outline-danger btn-sm btn-edit" onclick="window.location.href = `{{ url('admin/book/delete/' . $row->id) }}`"><i class="fas fa-trash"></i></button>
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
            "columnDefs" : [{
                "targets" : 2 ,
                "data": "img",
                "render" : function ( url, type, full) {
                    return `<img height="100" width="75" src="${url}"/>`
                }
            }]
        });
    } );
</script>
@endsection