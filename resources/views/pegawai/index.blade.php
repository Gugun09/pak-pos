<form action="{{ route('store') }}" method="post">
    @csrf
    <input type="text" name="nama" id="nama">
    <input type="text" name="alamat" id="alamat">
    <input type="text" name="no_hp" id="no_hp">
    <button type="submit">Kirim</button>
</form>
