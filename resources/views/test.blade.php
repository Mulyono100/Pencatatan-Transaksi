<form action="/testhungkul" method="POST">

    {{csrf_field()}}
    <input type="text" name="id">
    <button type="submit">KIRIM</button>
</form>