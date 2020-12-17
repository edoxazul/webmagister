<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
{{-- <img src="https://laravel.com/img/notification-logo.png" class="logo" alt="Laravel Logo"> --}}
<img src="https://www.ucn.cl/wp-content/uploads/2018/05/Escudo-UCN-Full-Color.png" width="80" height="80">

@else
{{ $slot }}
@endif
</a>
</td>
</tr>
