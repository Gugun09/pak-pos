<form action="{{ route('masuk.store') }}" method="post">
    @csrf
    @if (Session::has('status'))
        <div class="alert alert-success alert-block" id="pesan">
            <strong>{{ Session::get('status') }}</strong>
        </div>
    @endif
    <input type="text" name="no" id="no" autofocus>
    <a href="/keluar">Keluar</a>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        setTimeout(function() {
            $("#pesan").fadeIn('slow');
        }, 500);
    });
    setTimeout(function() {
        $("#pesan").fadeOut('slow');
    }, 1000);
</script>
