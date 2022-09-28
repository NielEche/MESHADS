@foreach($payload as $key => $value)

    <div class="row">
        <label for="" class="col-4">
            {{\Illuminate\Support\Str::upper($key)}}
        </label>
        <div class="col-8">
            {{$value}}
        </div>
    </div>

@endforeach