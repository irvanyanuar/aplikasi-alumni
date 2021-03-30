<table class="table table-sm" id="regencyTable">
    <thead class="thead-light">
        <tr>
            <th>Kabupaten/Kota</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($regencies as $data)
        <tr>
            <td>{{$data->name}}</td>
        </tr>
        @endforeach
    </tbody>
</table>