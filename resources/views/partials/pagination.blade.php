@if ($paginator->hasPages())

    <div class="store-filter clearfix">
    <span class="store-qty">
        Showing {{$paginator->currentPage() * $paginator->perPage()}}-{{$paginator->total()}} products</span>

        <ul class="store-pagination">
            @foreach($elements[0] as $pageNumber => $link)
                <li @class(['active'=> $paginator->currentPage() == $pageNumber])>
                    <a href="{{$link}}">{{$pageNumber}}</a>
                </li>
            @endforeach
            <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
        </ul>
    </div>
@endif