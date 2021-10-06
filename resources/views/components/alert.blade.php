<div>
    @if(session()->has('message'))
        <div class="alert alert-success">
            <p>{{session()->get('message')}}</p>
        </div>
    @elseif(session()->has('error'))
        <div class="alert alert-danger">
            <p>{{session()->get('message')}}</p>
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
@endif
    <!-- It is not the man who has too little, but the man who craves more, that is poor. - Seneca -->
</div>
