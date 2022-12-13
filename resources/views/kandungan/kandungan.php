{{ $datanya[0]['Column 2'] }}
{{ $datanya[1]['Column 2'] }}
@foreach ($datanya as $data)
  {{ $data['Column 2'] }}<br>
  @endforeach