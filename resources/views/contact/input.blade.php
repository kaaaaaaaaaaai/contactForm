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
        <input name="gender" type="radio" value="men" <?php echo old('gender')=='men'?'checked="checked"':""; ?>><label for="men">男</label>
        <input name="gender" type="radio" value="women" <?php echo old('gender')=='women'?'checked="checked"':""; ?>><label for="women">女</label>
    </div>
    <div class="form-group">
        <label>コメント</label>
        <input type="text" name="comment" value="{{old('comment')}}">
    </div>
    <div class="form-group">
        <label>E-Mail</label>
        <input type="text" name="email" value="{{old('email')}}">
    </div>
    <input type="submit"  value="register" name='action'></input>
</form>