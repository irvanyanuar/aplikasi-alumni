<table class="table table-striped" id="adminTable">
    <thead class="thead-light">
        <tr>
            <th>Nama Admin</th>
            <th>Photo</th>
            <th>Email</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($admin as $data)
        <tr>
            <td>{{$data->name}}</td>
            <td><img src="{{asset('assets/img/foto-profil/'.$data->photo)}}" style="width: 100px;"> </td>
            <td>{{$data->email}}</td>
            <td>
                <form action="{{route('user.admin.destroy', $data->id)}}" method="POST">
                    @csrf
                    <a href="{{route('user.admin.edit', $data->id)}}" class="btn btn-warning btn-xs"><i class="fa fa-pencil-alt"></i> Edit</a>
                    <button onclick="return confirm('Yakin akan dihapus?')" class="btn btn-danger btn-xs"><i class="fa fa-times"></i> Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>