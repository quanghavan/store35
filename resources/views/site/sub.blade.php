<ul class="sub-menu">
    @foreach($sub as $row)
        <li>
            <a href="?page=category_product" title="">{{ $row->name }}</a>
        </li>
    @endforeach
</ul>
