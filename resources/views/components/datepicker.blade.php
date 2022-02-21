@props(['id'])
    <input {{$attributes}} type="text" value="{{@date_format($state->date, 'Y-m-d')}}" class="form-control datetimepicker-input @error('date') is-invalid @enderror" id="{{$id}}" data-toggle="datetimepicker" data-target="#{{$id}}" onchange="this.dispatchEvent(new InputEvent('input'))"/>

@push('js')
<script type="text/javascript">

        $('#{{$id}}').datetimepicker({
            format:'L'
        });
  
</script>
@endpush
