<table class="table" id="collegeTable">
    <thead class="thead-light">
        <tr>
            <th>Nama Sekolah/Perguruan Tinggi</th>
            <th>Jenis</th>
            <th>Kabupaten/Kota</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($colleges as $data)
        <tr>
            <td><b>{{$data->name}}</b></td>
            <td>{{$data->jenis}}</td>
            <td>{{$data->regency->name}}</td>

            <td>
            <a href="{{route('college.alumni', $data->id)}}" class="btn btn-success btn-xs"><i class="far fa-eye"></i> Lihat Alumni</a>
                @if(Auth::check())
                <a href="{{route('college.edit', $data->id)}}" class="btn btn-warning btn-xs"><i class="fa fa-pencil-alt"></i> Edit</a>
                @if (Auth::user()->level == 'admin')
                <form action="{{route('college.destroy', $data->id)}}" method="POST">
                    @csrf

                    <button onclick="return confirm('Yakin akan dihapus?')" class="btn btn-danger btn-xs"><i class="fa fa-times"></i> Hapus</button>
                </form>
                @endif
                @endif
            </td>

        </tr>
        @endforeach
    </tbody>

</table>