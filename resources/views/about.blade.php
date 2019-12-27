<?php ?>

<h1>О блоге</h1>
<p>Эксперименты с Laravel на Хекслете</p>

<p><b>Our team</b></p>
@foreach ($team as $member)
    <p> Name: {{$member['name']}} </p>
    <p> Position: {{$member['position']}} </p>
    </br>
@endforeach
