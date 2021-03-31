<table class="table table-striped table-sm" id="alumniTable">
    <thead class="thead-light">
        <tr>
            <th>Nama Admin</th>
            <th>Photo</th>
            <th>Email</th>
            <th>Nomor Induk</th>
            <th>Tahun Masuk</th>
            <th>Tahun Lulus</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($alumni as $data)
        <tr>
            <td>{{$data->name}}</td>
            <td><img src="{{asset('assets/img/foto-profil/'.$data->photo)}}" style="width: 80px;"> </td>
            <td>{{$data->email}}</td>
            <td>{{$data->student_number}}</td>
            <td>{{$data->entry_year}}</td>
            <td>{{$data->graduation_year}}</td>

            <td>
                <form action="{{route('alumni.destroy', $data->id)}}" method="POST">
                    @csrf
                    <a href="{{route('alumni.edit', $data->id)}}" class="btn btn-warning btn-xs"><i class="fa fa-pencil-alt"></i> Edit</a>
                    <button onclick="return confirm('Yakin akan dihapus?')" class="btn btn-danger btn-xs"><i class="fa fa-times"></i> Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>