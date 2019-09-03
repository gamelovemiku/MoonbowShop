<div class="box" style="width: 100%">
    <div class="columns">
        <div class="column">
            <div class="title-category">Server Status
                <p class="text-category">{{$server['players'] . '/' . $server['max_players']}} Players</p>
                <p class="text-stats">{{ $settings->hostname }}</p>
            </div>

            @if ($server != null)
                <progress class="progress is-success" value={{$server['players']}} max={{$server['max_players']}}></progress>
            @else
                <p class="text-stats has-text-danger">Server is unavailable</p>
                <progress class="progress is-danger"></progress>
            @endif
        </div>
    </div>
</div>
