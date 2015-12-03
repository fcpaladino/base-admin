@if($errors->has() || is_array(session('custom_error')) )
<div class="callout callout-danger">
    <ol class="errorList">
    @if($errors->has())
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    @endif
    @if(is_array(session('custom_error')))
        @foreach (session('custom_error') as $error)
            <li>{{ $error }}</li>
        @endforeach
    @endif
</ol>
</div>
@endif
