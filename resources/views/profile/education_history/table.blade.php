<table class="table table-striped table-sm">
    <thead>
        <th>No.</th>
        <th>Thn. Masuk</th>
        <th>Thn. Lulus</th>
        <th>Jurusan</th>
        <th>Nama Instansi</th>
        <th>Tempat</th>
        <th></th>
    </thead>
    <tbody>
        <?php $no = 0; ?>
        @foreach($education as $data)
        <tr>
            <td><?= ++$no; ?></td>
            <td>{{$data->entry_year}}</td>
            <td>{{$data->graduation_year}}</td>
            <td>{{$data->jurusan}}</td>
            <td>{{$data->college->name}}</td>
            <td>{{$data->college->regency->name}}</td>
            <td>
                <form action="{{route('profile.education.destroy', $data->id)}}" method="POST">
                    @csrf

                    <button onclick="return confirm('Yakin akan dihapus?')" class="btn btn-danger btn-xs"><i class="fa fa-trash-alt"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>