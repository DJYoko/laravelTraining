{
@php
$counter = 0;
@endphp
@foreach ($errors->getMessages() as $key => $error)
  @php
    $counter++;
  @endphp
  '{{ $key }}': '{{ $error[0] }}'
  @if ($counter < count($errors->getMessages()))
    ,
  @endif
@endforeach
}
