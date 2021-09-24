<form action="{{route('test')}}"  method="POST" class="form-container">
    @csrf
    <input type="checkbox" name="feature[0]" value="1">
    <input type="checkbox" name="feature[1]" value="0">
    <button>Submit</button>
</form>