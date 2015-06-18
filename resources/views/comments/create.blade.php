{!! Form::model( $comment = new \App\Interacpedia\Comment, ['url' => 'comments','id'=>'comments-form'] ) !!}
@include('comments.form',['model'=>$model,'submitButtonText' => Lang::get('general/labels.add') . ' ' . Lang::get('general/labels.comment')])
{!! Form::close() !!}
