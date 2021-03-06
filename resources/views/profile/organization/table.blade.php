<table class="table table-striped table-sm">
    <thead>
        <th>No.</th>
        <th>Tahun</th>
        <th>Keterangan</th>
        <th></th>
    </thead>
    <tbody>
        <?php $no = 0; ?>
        @foreach($organization as $data)
        <tr>
            <td><?= ++$no; ?></td>
            <td>{{$data->year}}</td>
            <td>{{$data->detail}}</td>

            @if(Auth::check())
            @if(Auth::user()->id == $profile->id)
            <td>
                <form action="{{route('profile.organization.destroy', $data->id)}}" method="POST">
                    @csrf

                    <button onclick="return confirm('Yakin akan dihapus?')" class="btn btn-danger btn-xs"><i class="fa fa-trash-alt"></i></button>
                </form>
            </td>
            @endif
            @endif

        </tr>
        @endforeach
    </tbody>
</table>