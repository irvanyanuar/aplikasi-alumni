<table class="table" id="alumniTable">
    <thead class="thead-light">
        <tr>
            <th>Foto</th>
            <th>Nama</th>
            <th>Tahun Masuk</th>
            <th>Tahun Lulus</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($alumni as $data)
        <tr>
            @if($data->photo == null)
            <td><img src="{{asset('assets/img/foto-profil/alumni.png')}}" style="width: 60px;"></td>
            @else
            <td><img src="{{asset('assets/img/foto-profil/'.$data->photo)}}" style="width: 60px;"> </td>
            @endif
            <td><b>{{$data->name}}</b></td>
            <td>{{$data->entry_year}}</td>
            <td>{{$data->graduation_year}}</td>
            <td><a href="{{route('alumni.detail', $data->id)}}" class="btn btn-success btn-sm">Lihat Detail <i class="far fa-eye"></i></a></td>
        </tr>
        @endforeach
    </tbody>

</table>