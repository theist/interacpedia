{!! Form::model( $group = new \App\Interacpedia\Group, ['url' => 'groups','id'=>'groups-form','class'=>'col-md-12 text-center'] ) !!}
@include('groups.form',['model'=>$model,'submitButtonText' => Lang::get('general/labels.add') . ' ' . trans_choice('general/labels.groups', 1 ) ])
{!! Form::close() !!}
