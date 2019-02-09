<ul class="media-list">
    @foreach ($advances as $advance)
        <li class="media mb-3">
            <div class="media-body ml-3">
                <div>
                    {!! link_to_route('tasks.show', $advance->task->name, ['id' => $advance->task->id]) !!}
                    <span class="text-muted">posted at {{ $advance->created_at }}</span>
                </div>
                <div>
                    <p>{!! nl2br(e($advance->content)) !!}</p>
                </div>
                <div>
                    @if (Auth::id() == $advance->task_id)
                        {!!Form::open(['route' => ['advances.destroy', $advance->id], 'method' => 'delete']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                        {!!Form::close() !!}
                    @endif
                </div>
            </div>
        </li>
    @endforeach
</ul>