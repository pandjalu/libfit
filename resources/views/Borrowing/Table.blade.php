@extends('layouts.tableLayout')

@section('title', $title)

@section('table')
    <table id="table_id" class="display">
        <thead>
            <tr>
                <th>Nama Buku</th>
                <th>Image</th>
                <th>Status</th>
                <th>Kapan Meminjam</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $row)
                <tr>
                    <td>{{ $row->book_name }}</td>
                    <td>{{ $row->image }}</td>
                    <td>{{ $row->done ? "sudah dikembalikan" : "belum dikembalikan" }}</td>
                    <td>{{ $row->created_at }}</td>
                    <td class="text-center">
                    @if(!$row->done)
                        <button type="button" class="btn btn-outline-info btn-sm" onclick="kembalikan(`{{ $row->id }}`)"><i class="far fa-check-circle"></i></button>
                    @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('js')
<script>
    const kembalikan = id => {
        if(window.confirm('ingin mengembalikan buku?')) {
            window.location.href = `{{ url('admin/borrowing') . '/' }}${id}`
        }
    }
    $(document).ready( function () {
        $('#table_id').DataTable({
            "columnDefs" : [{
                "targets" : 1 ,
                "data": "img",
                "render" : function ( url, type, full) {
                    return `<img height="100" width="75" src="${url}"/>`
                }
            }]
        });
    } );
</script>
@endsection