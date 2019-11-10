@extends('manage.profilecenter')

@section('breadcrumb')
<nav class="breadcrumb is-small" aria-label="breadcrumbs">
    <ul>
        <li><a href="/manage">{{ Auth::user()->name }}</a></li>
        <li><a href="/manage/profile">Player</a></li>
        <li class="is-active"><a href="/manage/user">กระเป๋าเก็บของ</a></li>
    </ul>
</nav>
@endsection

@section('content')

<div class="columns">
    <div class="column is-6">
        <h4 class="title is-size-4 has-text-weight-bold">กระเป๋าเก็บของ</h4>
        <p class="subtitle is-size-7">คลังเก็บของของคุณที่ได้ซื้อหรือรับมาจากระบบ<b class="force-bold"></b></p>
    </div>
</div>
<div id="pocket">
    <template>
        <section>
            <b-tabs type="is-toggle">
                <b-tab-item label="ร้านค้า" icon="store">
                    <b-tabs class="block">
                        <b-tab-item label="ยังไม่ได้รับ" icon="basket-fill">
                            <div class="columns is-multiline">
                                @forelse ($pockets as $key => $item)
                                <div class="column is-3">
                                    <div class="card box-fullheight">
                                        <div class="card-content">
                                            <div class="field is-grouped is-grouped-multiline">
                                                <div class="control">
                                                    <div class="tags has-addons">
                                                        <span class="tag is-black"><i class="fas fa-check" style="margin-right: 4px;"></i> ซื้อแล้ว</span>
                                                        <span class="tag is-warning">
                                                            <i class="fas fa-gifts" style="margin-right: 2px;"></i>
                                                            <i class="fas fa-exclamation" style="margin-right: 4px;"></i>
                                                            ยังไม่รับสินค้า
                                                        </span>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="title-product @if($key == 0) has-text-info @endif">{{ $item->item->item_name }}
                                                <p class="subtitle-product">#Odr{{ $item->pocket_id }}{{ "@" . Str::limit($item->user->name, 3) }}</p>

                                                <div class="field" style="margin-top: 0.75rem;">
                                                    <figure class="image container is-96x96">
                                                        <img loading="lazy" src="/storage/itemshop/cover/{{ $item->item->item_image_path}}" alt="product">
                                                    </figure>
                                                </div>

                                                <form action="{{ route('pocket.store') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $item->pocket_id }}">
                                                    <div class="buttons">
                                                        <button class="button is-fullwidth">
                                                            <span class="icon is-small">
                                                                <i class="fas fa-paper-plane"></i>
                                                            </span>
                                                            <span>รับสินค้า</span>
                                                        </button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <div class="column is-12">
                                    <p class="is-size-6 has-text-centered" style="margin: 10%">กระเป๋านี้ว่างเปล่า... ลองไปซื้อที่ <a href="{{route('store')}}">ร้านค้า</a> ดูสิ!</p>
                                </div>
                                @endforelse
                            </div>
                        </b-tab-item>
                        <b-tab-item label="รับแล้ว" icon="basket-unfill">
                            <div class="columns is-multiline">
                                @forelse ($claimed as $key => $item)
                                <div class="column is-3">
                                    <div class="card box-fullheight">
                                        <div class="card-content">
                                            <div class="field is-grouped is-grouped-multiline">
                                                <div class="control">
                                                    <div class="tags">
                                                        <span class="tag is-success has-text-dark">
                                                            <i class="fas fa-gifts" style="margin-right: 2px;"></i>
                                                            <i class="fas fa-check" style="margin-right: 4px;"></i>
                                                            รับเรียบร้อย
                                                        </span>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="title-product @if($key == 0) has-text-info @endif">{{ $item->item->item_name }}
                                                <p class="subtitle-product">{{ $item->updated_at }}</p>

                                                <div class="field" style="margin-top: 0.75rem;">
                                                    <figure class="image container is-96x96">
                                                        <img loading="lazy" src="/storage/itemshop/cover/{{ $item->item->item_image_path}}" alt="product">
                                                    </figure>
                                                </div>

                                                <p class="buttons">
                                                    <a class="button is-fullwidth is-black is-outlined" disabled>
                                                        <span class="icon is-small">
                                                            <i class="fas fa-check-circle"></i>
                                                        </span>
                                                        <span>รับไอเท็มแล้ว</span>
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <div class="column is-12">
                                    <p class="is-size-6 has-text-centered" style="margin: 10%">คุณยังไม่เคยรับไอเท็มใดๆ เลย</p>
                                </div>
                                @endforelse
                            </div>
                        </b-tab-item>
                    </b-tabs>
                </b-tab-item>
                <b-tab-item label="รหัสแลก" icon="cards-outline">
                    <b-tabs class="block">
                        <b-tab-item label="ได้รับจากการแลก" icon="inbox-arrow-down">
                            <div class="columns is-multiline">
                                @foreach ($pockets as $key => $item)
                                <div class="column is-3">
                                    <div class="card box-fullheight">
                                        <div class="card-content">
                                            <div class="field is-grouped is-grouped-multiline">
                                                <div class="control">
                                                    <div class="tags has-addons">
                                                        <span class="tag is-black"><i class="fas fa-check" style="margin-right: 4px;"></i> ซื้อแล้ว</span>
                                                        <span class="tag is-warning">
                                                            <i class="fas fa-gifts" style="margin-right: 2px;"></i>
                                                            <i class="fas fa-exclamation" style="margin-right: 4px;"></i>
                                                            ยังไม่รับสินค้า
                                                        </span>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="title-product @if($key == 0) has-text-info @endif">{{ $item->item->item_name }}
                                                <p class="subtitle-product">#Odr{{ $item->pocket_id }}{{ "@" . Str::limit($item->user->name, 3) }}</p>

                                                <div class="field" style="margin-top: 0.75rem;">
                                                    <figure class="image container is-96x96">
                                                        <img loading="lazy" src="/storage/itemshop/cover/{{ $item->item->item_image_path}}" alt="product">
                                                    </figure>
                                                </div>

                                                <p class="buttons">
                                                    <a class="button is-fullwidth">
                                                        <span class="icon is-small">
                                                            <i class="fas fa-paper-plane"></i>
                                                        </span>
                                                        <span>รับสินค้า</span>
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </b-tab-item>
                        <b-tab-item label="ที่แลกไปแล้ว" icon="checkbox-multiple-marked-outline">
                            <div class="columns is-multiline">
                                @foreach ($pockets as $key => $item)
                                <div class="column is-3">
                                    <div class="card box-fullheight">
                                        <div class="card-content">
                                            <div class="field is-grouped is-grouped-multiline">
                                                <div class="control">
                                                    <div class="tags has-addons">
                                                        <span class="tag is-black"><i class="fas fa-check" style="margin-right: 4px;"></i> ซื้อแล้ว</span>
                                                        <span class="tag is-warning">
                                                            <i class="fas fa-gifts" style="margin-right: 2px;"></i>
                                                            <i class="fas fa-exclamation" style="margin-right: 4px;"></i>
                                                            ยังไม่รับสินค้า
                                                        </span>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="title-product @if($key == 0) has-text-info @endif">{{ $item->item->item_name }}
                                                <p class="subtitle-product">#Odr{{ $item->pocket_id }}{{ "@" . Str::limit($item->user->name, 3) }}</p>

                                                <div class="field" style="margin-top: 0.75rem;">
                                                    <figure class="image container is-96x96">
                                                        <img loading="lazy" src="/storage/itemshop/cover/{{ $item->item->item_image_path}}" alt="product">
                                                    </figure>
                                                </div>

                                                <p class="buttons">
                                                    <a class="button is-fullwidth">
                                                        <span class="icon is-small">
                                                            <i class="fas fa-paper-plane"></i>
                                                        </span>
                                                        <span>รับสินค้า</span>
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </b-tab-item>
                    </b-tabs>
                </b-tab-item>
            </b-tabs>
        </section>
    </template>
</div>


<script src="https://unpkg.com/vue"></script>
<script src="https://unpkg.com/buefy/dist/buefy.min.js"></script>

<script>

    new Vue({
        el: '#pocket',

        data: {
            activeTab: 0,
        },
    })

</script>
@endsection
