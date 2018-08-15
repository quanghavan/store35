@foreach($comments as $comment)
    <div class="display-comment">
        @if($comment->parent_id == 0)
        <strong>{{ $comment->user->name or "" }}</strong>
        <br>
        {{ $comment->content }}
        <br />
        <span><a class="reply" value="{{ $comment->id }}" href="" style="text-decoration: none;">Trả lời  </a></span>
        <span>{{ $comment->created_at->diffForHumans()}}<span>
        <br /></br>
        <div id="div-{{ $comment->id}}" class="display-comment div-reply">
            <div class="form-group">
                <input autocomplete="off" id="input-{{ $comment->id }}" type="text" name="comment_body" class="form-control" />
            </div>
            <div class="form-group">
                <input type="submit" comment="{{ $comment->id }}" post="{{ $product_id }}" class="btn btn-warning submit-reply" value="Reply" />
            </div>
        </div>
        @endif
        @if(count($comment->replies) > 0)
            @foreach($comment->replies as $row)
            <div class="display-comment">
                <strong>{{ $row->user->name or "" }}</strong>
                <br>
                {{ $row->content }}
                <br />
                <span>{{ $row->created_at->diffForHumans()}}<span>
                <br />
                <br />
            </div>
            @endforeach
        @endif
    </div>
@endforeach