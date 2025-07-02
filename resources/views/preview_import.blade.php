<h4>Preview Data Mahasiswa</h4>

<form action="{{ route('proses-import') }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-success">Import Sekarang</button>
</form>

<table class="table table-bordered mt-3">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Status Bekerja</th>
            <th>Umur</th>
            <th>Status Menikah</th>
            <th>IPS1</th>
            <th>IPS2</th>
            <th>IPS3</th>
            <th>IPS4</th>
            <th>IPK</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($preview_data as $row)
        <tr>
            <td>{{ $row['nama'] ?? '' }}</td>
            <td>{{ $row['jenis_kelamin'] ?? '' }}</td>
            <td>{{ $row['status_bekerja'] ?? '' }}</td>
            <td>{{ $row['umur'] ?? '' }}</td>
            <td>{{ $row['status_menikah'] ?? '' }}</td>
            <td>{{ $row['ips1'] ?? '' }}</td>
            <td>{{ $row['ips2'] ?? '' }}</td>
            <td>{{ $row['ips3'] ?? '' }}</td>
            <td>{{ $row['ips4'] ?? '' }}</td>
            <td>{{ $row['ipk'] ?? '' }}</td>
        </tr>
        @endforeach
    </tbody>
</table>