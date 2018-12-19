<table>
    <thead>
    <tr>
        <th>Lab</th>
        <th>Glassware Type</th>
        <th>Size or Volume</th>
        <th>Counted</th>
        <th>Counted by</th>
    </tr>
    </thead>
    <tbody>
    @foreach($glasswares as $glassware)
        <tr>
            <td>{{ $glassware->lab->name }}</td>
            <td>{{ $glassware->type }}</td>
            <td>{{ $glassware->name }}</td>
            <td>{{ $glassware->amount }}</td>
            <td>{{ $glassware->user ? $glassware->user->name : '' }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
