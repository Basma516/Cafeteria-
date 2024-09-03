<form action="{{ route('jobs.search') }}" method="GET">
    <input type="text" name="keyword" placeholder="Keyword">
    <input type="text" name="location" placeholder="Location">
    <select name="category">
        <option value="">All Categories</option>
        <option value="IT">IT</option>
        <option value="Marketing">Marketing</option>
        <!-- Add more categories as needed -->
    </select>
    <button type="submit">Search</button>
</form>
@if(isset($jobs) && $jobs->isNotEmpty())
    <h2>Filtered Jobs:</h2>
    <ul>
        @foreach($jobs as $job)
            <li>
                <h3>{{ $job->title }}</h3>
                <p>Location: {{ $job->location }}</p>
                <p>Category: {{ $job->category }}</p>
                <p>{{ $job->description }}</p>
            </li>
        @endforeach
    </ul>
@else
    <p>No jobs found.</p>
@endif

