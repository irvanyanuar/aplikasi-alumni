<table class="table table-striped table-sm">
    <thead>
        <th>No.</th>
        <th>Tahun</th>
        <th>Keterangan</th>
        <th></th>
    </thead>
    <tbody>
        <?php $no = 0; ?>
        @foreach($achievement as $data)
        <tr>
            <td><?= ++$no; ?></td>
            <td>{{$data->year}}</td>
            <td>{{$data->detail}}</td>
            <td>
                <form action="{{route('profile.achievement.destroy', $data->id)}}" method="POST">
                    @csrf

                    <button onclick="return confirm('Yakin akan dihapus?')" class="btn btn-danger btn-xs"><i class="fa fa-trash-alt"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>