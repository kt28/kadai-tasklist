<ul class="media-list">
    @foreach ($advances as $advance)
        <li class="media mb-3">
            <img class="media-object rounded" src="{{ Gravatar::src($user->email, 50) }}" alt="">
            <div class="media-body ml-3">
                <div>
                    {!! link_to_route('tasks.show', $advance->task->name, ['id' => $advance->task->id]) !!} <span class="text-muted">posted at {{ $advance->created_at }}</span>
                </div>
                <div>
                    <p>{!! nl2br(e($advance->progress)) !!}</p>
                </div>
                <div>
                    @if (Auth::id() == $advance->user_id)
                        {!! Form::open(['route' => ['advances.destroy', $advance->id], 'method' => 'delete']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                        {!! Form::close() !!}
                    @endif
                </div>
            </div>
        </li>
    @endforeach
</ul>
{{ $advances->render('pagination::bootstrap-4') }}