<div class="list-group">
    @foreach(App\Models\category::orderBy('name','asc')->where('parent_id',NULL)->get() as $parentCat)
    <a href="#main-{{ $parentCat->id }}" class="list-group-item list-group-item-action" data-toggle="collapse" data-target="#main-{{ $parentCat->id }}">
        <img src="{{ asset('public/images/categories/'. $parentCat->image) }}" width="50px">
        {{ $parentCat->name }}<span style="float:right;font-style:bold;">>></span>
    </a>
    <div class="collapse
        @if(Route::is('categories.show'))
            @if(App\Models\category::ParentOrNotCategory($parentCat->id,$category->id))
                show
                @endif
            @endif
    
    " id="main-{{ $parentCat->id }}">
        <div class="child-rows" style="padding-left: 20px;border-left: 1px solid #dfdfdf;background: #ffffff;">
            @foreach(App\Models\category::orderBy('name','asc')->where('parent_id',$parentCat->id)->get() as $childCat)
            <a href="{{ route('categories.show',$childCat->id) }}" style="border-left: 0px!important;" class="list-group-item list-group-item-action
            @if(Route::is('categories.show'))
                @if($childCat->id == $category->id)
                    active
                @endif
            @endif
            
            ">
                <img src="{{ asset('public/images/categories/'.$childCat->image) }}" width="30px">
                {{ $childCat->name }}
            </a>
            @endforeach
        </div>
    </div>
    @endforeach
</div>