@if(Session::has('success'))
    <div class="alert alert-success float-right" style="width: 300px; z-index: 99" role="alert">
    <strong>Tebrikler:</strong>{{ Session::get('success') }}
</div>
@endif
@if(Session::has('error'))

    <div class="alert alert-danger float-right" style="width: 300px; z-index: 99" role="alert">
        <strong>Üzgünüz:</strong> {{ Session::get('error') }}
    </div>

@endif
@if(Session::has('warning'))

    <div class="alert alert-warning float-right" style="width: 300px; z-index: 99" role="alert">
        <strong>Dikkat!</strong> {{ Session::get('warning') }}
    </div>

@endif




@if(count($errors)>0)
    <div class="alert alert-danger" role="alert">
        <strong>Hata:</strong>
        <ul>
            @foreach($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach
        </ul>

    </div>

@endif
