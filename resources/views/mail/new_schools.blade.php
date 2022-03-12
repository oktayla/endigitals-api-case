<p>List of schools created in the last 24 hours</p>

<ul>
@foreach($schools as $school)
    <li>{{ $school->name }}</li>
@endforeach
</ul>