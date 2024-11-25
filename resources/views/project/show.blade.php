@extends('layouts.app')

@section('content')
    <h2 class="content-heading d-flex justify-content-between align-items-center">
        <span>{{ $projectWithTasks->name }}</span>
        <div class="space-x-1">
            <button type="button" class="btn btn-sm btn-alt-primary" data-bs-toggle="modal" data-bs-target="#modal-compose">
                Yeni Görev
            </button>
        </div>
    </h2>
    <div class="row mb-4">
        <div class="col-md-6 mx-auto">
            <div class="input-group input-group-lg mb-2">
                <input type="text" class="form-control" placeholder="görev ara...">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mx-auto">
            @foreach ($projectWithTasks->tasks as $task)
                <div class="block border mb-2 rounded-3 block-mode-hidden w-100">
                    <div class="block-header p-1">
                        <h2 class="block-title align-items-center d-flex fs-sm">
                            {{-- <input type="checkbox" class="form-check-input me-1 m-0" style="width: 18px; height: 18px;"> --}}
                            {{-- sıralama için taşıma butonu --}}
                            <button type="button" class="btn-block-option px-0">
                                <i class="fs-lg far fa-fw fa-circle"></i>
                            </button>
                            <strong style="cursor: pointer;">{{ $task->title }}</strong>
                        </h2>
                        <div class="block-options">
                            {{-- task delete --}}
                            <button type="button" class="btn-block-option">
                                <i class="far fa-fw fa-trash-can"></i>
                            </button>
                            {{-- subtask add --}}
                            {{-- <button type="button" class="btn-block-option">
                                <i class="fa fa-fw fa-circle-plus"></i>
                            </button> --}}
                            {{-- subtask show --}}
                            <button type="button" class="btn-block-option">
                                <i class="far fa-fw fa-chart-bar"></i> <span class="fs-xs">(3/4)</span>
                            </button>
                            <button type="button" class="btn-block-option" data-toggle="block-option"
                                data-action="content_toggle"><i class="si si-arrow-down"></i></button>
                        </div>
                    </div>
                    <div class="block-content p-2 border-top fs-sm">
                        <div class="block-content-full">
                            lorem15
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
