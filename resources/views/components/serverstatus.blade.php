<div class="box" style="width: 100%">
    <div class="columns">
        <div class="column">
            <div class="title-category">สถานะเซิร์ฟเวอร์
                <p class="text-category has-text-weight-medium">@if ($server != null)ผู้เล่นที่กำลังเล่นอยู่ {{$server->GetInfo()['Players'] . '/' . $server->GetInfo()['MaxPlayers']}} คน @endif</p>
                <p class="text-stats">{{ $settings->hostname }}</p>
            </div>

            @if ($server != null)
                <progress class="progress is-success" value={{$server->GetInfo()['Players'] . '/' . $server->GetInfo()['MaxPlayers']}}></progress>
                <p class="text-category has-text-dark">
                    @if(!empty($server->GetPlayers()))
                        กำลังเล่นอยู่บนเซิร์ฟเวอร์ตอนนี้..
                        <ul class="text-category has-text-weight-medium">
                            @foreach ($server->GetPlayers() as $key => $player)
                                {{$player}} @if(count($server->GetPlayers()) > 1), @elseif((count($server->GetPlayers())-1) == $key) @endif
                            @endforeach
                        </ul>
                    @else
                        ไม่มีผู้เล่นที่เล่นอยู่เลย
                    @endif

                </p>
            @else
                <p class="text-stats has-text-danger">เซิร์ฟเวอร์ไม่พร้อมใช้งาน</p>
                <progress class="progress is-danger"></progress>
            @endif

        </div>
    </div>
</div>
