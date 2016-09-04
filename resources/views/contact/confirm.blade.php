confirm

<form method="post" action="/contact/store">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <div class="form-group">
        <label>名前</label>
        {{$data['name']}}
    </div>
    <div class="form-group">
        <label>性別</label>
        {{$data['gender']}}
    </div>
    <div class="form-group">
        <label>コメント</label>
        {{$data['comment']}}
    </div>
    <div class="form-group">
        <label>E-Mail</label>
        {{$data['email']}}
    </div>
    <input type="submit" value="登録">
</form>