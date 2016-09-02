input

<form method="post" action="/contact/confirm">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <div class="form-group">
        <label>名前</label>
        <input type="text" name="name" value="">
    </div>
    <div class="form-group">
        <label>性別</label>
        <input type="text" name="gender" value="">
    </div>
    <div class="form-group">
        <label>コメント</label>
        <input type="text" name="comment" value="">
    </div>
    <div class="form-group">
        <label>E-Mail</label>
        <input type="text" name="email" value="">
    </div>
    <input type="submit" value="登録">
</form>