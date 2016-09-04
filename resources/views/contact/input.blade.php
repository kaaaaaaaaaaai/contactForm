input
@foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
@endforeach
<form method="post" action="/contact/confirm">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <div class="form-group">
        <label>名前</label>
        <input type="text" name="name" value="{{old('name')}}">
    </div>
    <div class="form-group">
        <input id="men" name="gender" type="radio" value="男"><label for="men">男</label>
        <input id="women" name="gender" type="radio" value="女"><label for="women">女</label>
    </div>
    <div class="form-group">
        <label>コメント</label>
        <input type="text" name="comment" value="{{old('comment')}}">
    </div>
    <div class="form-group">
        <label>E-Mail</label>
        <input type="text" name="email" value="{{old('email')}}">
    </div>
    <input type="submit" value="登録">
</form>