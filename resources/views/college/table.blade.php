<table class="table" id="collegeTable">
    <thead class="thead-light">
        <tr>
            <th>Nama Perguruan Tinggi</th>
            <th>Kabupaten/Kota</th>
            @if (Auth::user()->level == 'admin')
            <th>Aksi</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach ($colleges as $data)
        <tr>
            <td>{{$data->name}}</td>
            <td>{{$data->regency->name}}</td>
            @if (Auth::user()->level == 'admin')
            <td>
                <form action="{{route('college.destroy', $data->id)}}" method="POST">
                    @csrf
                    <a href="{{route('college.edit', $data->id)}}" class="btn btn-warning btn-xs"><i class="fa fa-pencil-alt"></i> Edit</a>
                    <button onclick="return confirm('Yakin akan dihapus?')" class="btn btn-danger btn-xs"><i class="fa fa-times"></i> Hapus</button>
                </form>
            </td>
            @endif
        </tr>
        @endforeach
    </tbody>      
    
</table>