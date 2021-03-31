<table class="table table-striped table-sm">
    <thead>
        <th>No.</th>
        <th>Thn. Mulai</th>
        <th>Thn. Akhir</th>
        <th>Keterangan</th>
        <th></th>
    </thead>
    <tbody>
        <?php $no = 0; ?>
        @foreach($job as $data)
        <tr>
            <td><?= ++$no; ?></td>
            <td>{{$data->start_date}}</td>
            <td>{{$data->end_date}}</td>
            <td>{{$data->detail}}</td>
            <td>
                <form action="{{route('profile.job.destroy', $data->id)}}" method="POST">
                    @csrf

                    <button onclick="return confirm('Yakin akan dihapus?')" class="btn btn-danger btn-xs"><i class="fa fa-trash-alt"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>