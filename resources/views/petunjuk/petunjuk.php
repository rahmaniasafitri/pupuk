{{ $datanya[0]['Column 2'] }}
<br>
{{ $datanya[1]['Column 2'] }}
<br>
<br>
@foreach ($datanya as $data)
  {{ $data['Column 2'] }}<br>
  @endforeach
