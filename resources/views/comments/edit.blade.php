{!! Form::model($comment,['method' => 'PATCH', 'action' => ['CommentsController@update',$comment->id]]) !!}
@include('comments.form',['submitButtonText' => Lang::get('general/labels.edit')])
{!! Form::close() !!}
