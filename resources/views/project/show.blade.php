@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Görevler ve Alt Görevler</h1>
            
            <ul>
                @foreach ($projectWithTasks->tasks as $task)
                    <li>
                        <strong>{{ $task->title }}</strong> - {{ ucfirst($task->status) }}
                        
                        @if ($task->children->count())
                            <ul>
                                @foreach ($task->children as $childTask)
                                    <li>
                                        {{ $childTask->title }} - {{ ucfirst($childTask->status) }}
                                        
                                        @if ($childTask->children->count())
                                            <ul>
                                                @foreach ($childTask->children as $subChildTask)
                                                    <li>
                                                        {{ $subChildTask->title }} - {{ ucfirst($subChildTask->status) }}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
