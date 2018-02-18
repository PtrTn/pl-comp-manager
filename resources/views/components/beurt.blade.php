@php
$class = '';
$gewicht = '';
if (isset($beurt)) {
    $gewicht = $beurt->gewicht;
    if ($beurt->gehaald === true) {
        $class = 'success';
    }
    if ($beurt->gehaald === false) {
        $class = 'danger';
    }
}
@endphp

<td class="{{ $class }}"><a class="editable" href="#" data-name="squat1">{{$gewicht}}</a></td>