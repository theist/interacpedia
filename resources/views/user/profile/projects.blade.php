<div class="subtitle">
    <img src="/images/icons/40x40/process.png" alt="@lang('general/labels.projects_in_process')"/>
    @lang('general/labels.projects_in_process')
</div>

<div class="row challenges">
    @foreach($user->projects as $project)
        <div class="project summary col-md-3">
            @include('projects.summary')
        </div>
    @endforeach
</div>
<div class="subtitle">
    <img src="/images/icons/40x40/ended.png" alt="@lang('general/labels.projects_ended')"/>
    @lang('general/labels.projects_ended')
</div>
<div class="row challenges">
    @foreach($user->projects as $project)
        <div class="project summary col-md-3">
            @include('projects.summary')
        </div>
    @endforeach
</div>
<a class="btn btn-blue2" href="/projects">Ver más proyectos</a>
<a class="btn btn-purple  btn-capital form-control" href="/projects/create">Crear un nuevo proyecto</a>
