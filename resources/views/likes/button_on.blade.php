{!! Form::open(array('route' => array('likes.destroy', $like->id),'id'=>'delete-like'.$formid_suffix, 'method' => 'delete'))!!}
<a class="btn btn-fixed-blue active submit"><i class="fa fa-thumbs-o-up"></i> @lang('general/labels.you_like')</a>
{!! Form::close() !!}

